<?php

namespace Tda\LaravelNetcup;


class NetcupDnsZone
{
    public string $name;
    public int $ttl;
    public int $serial;
    public int $refresh;
    public int $retry;
    public int $expire;
    public bool $dnssecstatus;


    public function __construct(object $data)
    {
        if($data) {
            $this->name = $data->name;
            $this->ttl = $data->ttl;
            $this->serial = $data->serial;
            $this->refresh = $data->refresh;
            $this->retry = $data->retry;
            $this->expire = $data->expire;
            $this->dnssecstatus = $data->dnssecstatus;
        }
    }
}
