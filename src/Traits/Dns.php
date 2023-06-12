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

    public function infoDnsRecords(mixed $domain): ?Collection
    {
        if($domain instanceof NetcupDomain) {
            $param = ['domainname' => $domain->domainname];
        } else {
            $param = ['domainname' => $domain];
        }

        $response = $this->_Call('infoDnsRecords', $param );

        if(!empty($response->responsedata)) {
            return $this->loadCollectionDnsRecords($response->responsedata->dnsrecords);
        }
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



}
