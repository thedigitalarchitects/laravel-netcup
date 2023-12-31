<?php

namespace Tda\LaravelNetcup;


class NetcupDnsRecord
{
    public int $id;
    public string $hostname;
    public string $type;
    public int $priority;
    public string $destination;
    public bool $deleterecord;
    public string $state;


    public function __construct(object $data)
    {
        if($data) {
            $this->id = $data->id;
            $this->hostname = $data->hostname;
            $this->type = $data->type;
            $this->priority = $data->priority;
            $this->destination = $data->destination;
            $this->deleterecord = $data->deleterecord;
            $this->state = $data->state;
        }

    }
}
