<?php

namespace Tda\LaravelNetcup;

use Tda\LaravelNetcup\Contactentries;
use Tda\LaravelNetcup\Dns;
use Tda\LaravelNetcup\Nameserver;
use Tda\LaravelNetcup\Traits\ToArray;

class NetcupDomain
{
    use ToArray;

    public string $domainname;
    public Nameserver $nameserverentry;
    public int $customernumber;
    public Contactentries $assignedcontacts;
    public bool $ownerchangerunning;
    public bool $cancellationrunning;
    public string $nextbilling;
    public int $runtimemonths;
    public string $lastupdate;
    public string $domaincreated;
    public string $deletiondate;
    public string $authcode;
    public string $state;
    public Contactentries $registrycontacts;
    public ?float $priceperruntime;
    public string $dnssectype;
    public Dns $dnssecentries;
    public string $status;


    public function __construct(?object $data)
    {
        if(!empty($data)) {
            $this->domainname = $data->domainname;
            //$this->nameserverentry = new Nameserver($data->nameserverentry);
            $this->customernumber = $data->customernumber;
            $this->assignedcontacts = new Contactentries($data->assignedcontacts);
            $this->ownerchangerunning = $data->ownerchangerunning;
            $this->cancellationrunning = $data->cancellationrunning;
            $this->nextbilling = $data->nextbilling;
            $this->runtimemonths = $data->runtimemonths;
            $this->lastupdate = $data->lastupdate;
            $this->domaincreated = $data->domaincreated;
            $this->deletiondate = $data->deletiondate;
            $this->authcode = $data->authcode;
            $this->state = $data->state;
            $this->registrycontacts = new Contactentries($data->registrycontacts);
            $this->priceperruntime = is_float($data->priceperruntime) ?? null;;
            $this->dnssectype = $data->dnssectype;
            $this->dnssecentries = new Dns($data->dnssecentries);
            $this->status = $data->status;
        }

    }

    public function topLevel(): string
    {
        $aux = explode('.', $this->domainname);
        return end($aux);
    }
}
