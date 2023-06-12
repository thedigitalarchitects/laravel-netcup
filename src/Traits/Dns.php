<?php

namespace Tda\LaravelNetcup\Traits;

use Illuminate\Support\Collection;
use Tda\LaravelNetcup\NetcupDomain;
use Tda\LaravelNetcup\NetcupDnsRecord;
use Tda\LaravelNetcup\NetcupDnsZone;


trait Dns
{


    public function infoDnsZone(mixed $domain): ?NetcupDnsZone
    {
        if($domain instanceof NetcupDomain) {
            $param = ['domainname' => $domain->domainname];
        } else {
            $param = ['domainname' => $domain];
        }
        $response = $this->_Call('infoDnsZone', $param );

        if(!empty($response->responsedata)) {
            return new NetcupDnsZone($response->responsedata);
        }
    }

    public function updateDnsZone()
    {

    }

    public function infoDnsRecords(mixed $domain): object
    {
        if($domain instanceof NetcupDomain) {
            $param = ['domainname' => $domain->domainname];
        } else {
            $param = ['domainname' => $domain];
        }

        $response = $this->_Call('infoDnsRecords', $param );

        return $this->returnDns($response);
    }

    public function updateDnsRecords()
    {

    }

    protected function loadCollectionDnsRecords(array $data): Collection
    {
        $records = new Collection();
        foreach($data as $record)
        {
            $records[] = new NetcupDnsRecord($record);
        }

        return $records;
    }

    protected function returnDns(object $response): object
    {
        $return = array();

        if($response->statuscode == 2000) {
            $return['success'] = true;
            if(!empty($response->responsedata)) {
                $return['data'] = $this->loadCollectionDnsRecords($response->responsedata->dnsrecords);
            }
        } else {
            $return['success'] = false;
        }
        unset($response->responsedata);
        $return['payload'] = $response;

        return (object) $return;
    }



}
