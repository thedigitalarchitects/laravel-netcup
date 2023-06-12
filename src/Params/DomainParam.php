<?php
namespace Tda\LaravelNetcup\Params;


/* SOAP: set the order of param to be sent to Netcup API */
class DomainParam
{
    static public function getParam($method): array
    {
        $method = ucfirst($method);
        eval("\$param = self::get{$method}Param();");
        return $param;
    }

    static public function getCreateDomainParam(): array
    {
        return [
            'domainname',
            'customernumber',
            'contacts',
            'nameservers',
            'apikey',
            'apisessionid',
            'clientrequestid'
        ];
    }

    static public function getUpdateDomainParam(): array
    {
        return [
            'domainname',
            'customernumber',
            'contacts',
            'nameservers',
            'apikey',
            'apisessionid',
            'clientrequestid',
            'keepdnssecrecords',
            'dnssecentries',
        ];
    }

    static public function getCancelDomainParam(): array
    {
        return [
            'domainname',
            'customernumber',
            'apikey',
            'apisessionid',
            'clientrequestid'
        ];
    }

    static public function getTransferDomainParam(): array
    {
        return [
            'domainname',
            'customernumber',
            'contacts',
            'nameservers',
            'apikey',
            'apisessionid',
            'authcode',
            'clientrequestid'
        ];
    }

    static public function getChangeOwnerDomainParam(): array
    {
        return [
            'new_handle_id',
            'domainname',
            'customernumber',
            'apikey',
            'apisessionid',
            'clientrequestid'
        ];
    }

    static public function getGetAuthCodeDomainParam(): array
    {
        return [
            'domainname',
            'customernumber',
            'apikey',
            'apisessionid',
            'clientrequestid'
        ];
    }

    static public function getinfoDomainParam(): array
    {
        return [
            'domainname',
            'customernumber',
            'apikey',
            'apisessionid',
            'clientrequestid',
            'registryinformationflag'
        ];
    }

    static public function getListallDomainsParam(): array
    {
        return [
            'customernumber',
            'apikey',
            'apisessionid',
            'clientrequestid'
        ];
    }

    static public function getPriceTopLevelDomainParam(): array
    {
        return [
            'customernumber',
            'apikey',
            'apisessionid',
            'topleveldomain',
            'clientrequestid'
        ];
    }

}
