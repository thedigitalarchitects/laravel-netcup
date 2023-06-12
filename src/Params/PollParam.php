<?php
namespace Tda\LaravelNetcup\Params;


/* SOAP: set the order of param to be sent to Netcup API */
class PollParam
{
    static public function getParam($method): array
    {
        $method = ucfirst($method);
        eval("\$param = self::get{$method}Param();");
        return $param;
    }

    static public function getAckpollParam(): array
    {
        return [
            'domainname',
            'customernumber',
            'apikey',
            'apisessionid',
            'clientrequestid'
        ];
    }
    static public function getPollParam(): array
    {
        return [
            'messagecount',
            'customernumber',
            'apikey',
            'apisessionid',
            'clientrequestid'
        ];
    }

}
