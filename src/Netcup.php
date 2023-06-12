<?php

namespace Tda\LaravelNetcup;

use Tda\LaravelNetcup\Traits\Dns;
use Tda\LaravelNetcup\Traits\Domain;
use Tda\LaravelNetcup\Traits\Handle;
use Tda\LaravelNetcup\Traits\Poll;
use Tda\LaravelNetcup\Traits\Auth;
use Tda\LaravelNetcup\Client\ClientSoap;
use Tda\LaravelNetcup\Client\ClientRest;
use Tda\LaravelNetcup\Client\ClientInterface;

/*
https://ccp.netcup.net/run/webservice/servers/endpoint.php
*/
class Netcup
{

    use Auth, Domain, Dns, Handle, Poll;

    protected string $apikey;
    protected string $apipassword;
    protected string $apisessionid;
    protected string $serverrequestid;
    protected ?string $clientrequestid;
    protected int $customernumber;
    protected ClientInterface $client;


    public function __construct(?string $clientrequestid = null)
    {
        $this->clientrequestid = $clientrequestid;
        $this->setConfig();
        $this->useRest();
    }

    public function setConfig(string $location = 'services.netcup'): self
    {
        $this->apikey = config($location.'.api_key');
        $this->apipassword =  config($location.'.api_password');
        $this->customernumber = config($location.'.customer_number');

        return $this;
    }

    public function useSoap(): self
    {
        $this->client = new ClientSoap();
        return $this;
    }

    public function useRest(): self
    {
        $this->client = new ClientRest();
        return $this;
    }

    protected function _Call(string $method, array $param = []): object
    {
        try {
            if ($method != 'login') {
                $this->login();
            }
            $param = $this->setKeysParam($param);
            return $this->client->call($method, $param);
        } catch (\Exception $e) {
            $this->logout();
            throw $e;
        }
	}

    protected function setKeysParam(array $param): array
    {
        $param['customernumber'] = $this->customernumber;
        $param['apikey'] = $this->apikey;
        $param['apipassword'] = $this->apipassword;
        $param['clientrequestid'] = $this->clientrequestid;
        $param['apisessionid'] = $this->apisessionid ?? null;

        return $param;
    }

    public function __destruct() {
        $this->logout();
    }

}
