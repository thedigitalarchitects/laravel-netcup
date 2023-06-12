<?php
namespace Tda\LaravelNetcup\Params;


/* SOAP: set the order of param to be sent to Netcup API */
class HandleParam
{
    static public function getParam($method): array
    {
        $method = ucfirst($method);
        eval("\$param = self::get{$method}Param();");
        return $param;
    }

    static public function getCreateHandleParam(): array
    {
        return [
            'customernumber',
            'apikey',
            'apisessionid',
            'type',
            'name',
            'organisation',
            'street',
            'postalcode',
            'city',
            'countrycode',
            'telephone',
            'email',
            'clientrequestid',
            'optionalhandleattributes'
        ];
    }

    static public function getUpdateHandleParam(): array
    {
        return [
            'customernumber',
            'apikey',
            'apisessionid',
            'handle_id',
            'type',
            'name',
            'organisation',
            'street',
            'postalcode',
            'city',
            'countrycode',
            'telephone',
            'email',
            'clientrequestid',
            'optionalhandleattributes'
        ];
    }

    static public function getDeleteHandleParam(): array
    {
        return [
            'handle_id',
            'customernumber',
            'apikey',
            'apisessionid',
            'clientrequestid'
        ];
    }

    static public function getinfoHandleParam(): array
    {
        return [
            'handle_id',
            'customernumber',
            'apikey',
            'apisessionid',
            'clientrequestid'
        ];
    }

    static public function getListallHandleParam(): array
    {
        return [
            'customernumber',
            'apikey',
            'apisessionid',
            'clientrequestid'
        ];
    }


}
