<?php
namespace Tda\LaravelNetcup\Params;


/* SOAP: set the order of param to be sent to Netcup API */
class DnsParam
{
    static public function getParam($method): array
    {
        $method = ucfirst($method);
        eval("\$param = self::get{$method}Param();");
        return $param;
    }

    static public function getInfoDnsZoneParam(): array
    {
        return [
            'domainname',
            'customernumber',
            'apikey',
            'apisessionid',
            'clientrequestid'
        ];
    }
    static public function getInfoDnsRecordsParam(): array
    {
        return [
            'domainname',
            'customernumber',
            'apikey',
            'apisessionid',
            'clientrequestid'
        ];
    }
    static public function getUpdateDnsRecordsParam(): array
    {
        return [
            'domainname',
            'customernumber',
            'apikey',
            'apisessionid',
            'clientrequestid',
            'dnsrecordset'
        ];
    }
    static public function getUpdateDnsZoneParam(): array
    {
        return [
            'domainname',
            'customernumber',
            'apikey',
            'apisessionid',
            'clientrequestid',
            'dnszone'
        ];
    }



}
