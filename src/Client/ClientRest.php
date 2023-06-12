<?php

namespace Tda\LaravelNetcup\Client;


class ClientRest implements ClientInterface
{

    protected string $_Uri = 'https://ccp.netcup.net/run/webservice/servers/endpoint.php?JSON';
    protected mixed $_Server;

    public function __construct()
    {
    }

    public function call(string $method, array $param): mixed
    {
        $payload = [ "action" => $method, "param" => $param ];

        try {
            $response = \Http::post($this->_Uri, $payload);
            $response->throw();
            return \json_decode($response->getBody()->getContents(), false);
        } catch(\Exception $exception) {
            return $exception->getMessage();
        }
    }

}
