<?php

namespace Tda\LaravelNetcup\Traits;

use Illuminate\Support\Collection;
use Tda\LaravelNetcup\NetcupDomain;
use Tda\LaravelNetcup\NetcupDnsRecord;
use Tda\LaravelNetcup\NetcupDnsZone;


trait Dns
{


    public function infoDnsZone(mixed $domain): object
    {
        if($domain instanceof NetcupDomain) {
            $param = ['domainname' => $domain->domainname];
        } else {
            $param = ['domainname' => $domain];
        }
        $response = $this->_Call('infoDnsZone', $param );

        return $this->return_encode($response, 'callbackDnsZone');
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

        return $this->return_encode($response, 'callbackDnsRecords');
    }

    public function updateDnsRecords()
    {

    }

    protected function callbackDnsRecords(object $data): Collection
    {
        $records = new Collection();
        foreach($data->dnsrecords as $record)
        {
            $records[] = new NetcupDnsRecord($record);
        }

        return $records;
    }

    protected function callbackDnsZone(object $data): NetcupDnsZone
    {
        return new NetcupDnsZone($data);
    }



}
