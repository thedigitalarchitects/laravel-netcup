<?php

namespace Tda\LaravelNetcup\Client;

use Tda\LaravelNetcup\Params\DomainParam;
use Tda\LaravelNetcup\Params\HandleParam;
use Tda\LaravelNetcup\Params\DnsParam;
use Tda\LaravelNetcup\Params\PollParam;

class ClientSoap implements ClientInterface
{

    protected string $_WsdlUri = 'https://ccp.netcup.net/run/webservice/servers/endpoint.php?WSDL';
    protected mixed $_Server;

    public function __construct()
    {
        if (empty($this->_Server)) {
            $this->_Server = new \SoapClient($this->_WsdlUri);
        }
    }

    public function call(string $method, array $param): mixed
    {
        if($method !== 'login' && $method !== 'logout') {
            $param = $this->orderParams($method, $param);
        }
        try {
            return $this->_Server->__soapCall($method, $param);
        } catch (\Exception $exception) {
            //dd($exception->getMessage());
            throw new \SoapFault($exception->faultstring, $exception->faultcode, $exception);
        }

    }

    protected function orderParams(string $method, array $param): array
    {
        if(stristr($method, 'Domain')) {
            $orderParam = DomainParam::getParam($method);
        }
        if(stristr($method, 'Handle')) {
            $orderParam = HandleParam::getParam($method);
        }
        if(stristr($method, 'Dns')) {
            $orderParam = DnsParam::getParam($method);
        }
        if(stristr($method, 'Poll')) {
            $orderParam = PollParam::getParam($method);
        }
        foreach($orderParam as $k=>$name)
        {
            $orderParam[$k] = $param[$name] ?? null;
        }

        return $orderParam;
    }

}
