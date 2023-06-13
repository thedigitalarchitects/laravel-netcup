<?php

namespace Tda\LaravelNetcup\Traits;

use \Illuminate\Support\Collection;
use Tda\LaravelNetcup\Contactentries;
use Tda\LaravelNetcup\Nameserverentries;
use Tda\LaravelNetcup\DnssecentriesObject;
use Tda\LaravelNetcup\NetcupDomain;

trait Domain
{

    public function createDomain(string $domainname, Contactentries $contact, array $nameservers)
    {
        $param['domainname'] = $domainname;
        $param['contacts'] = $contact;
        if($nameservers = $this->setNameserver($nameservers)) {
            $param['nameservers'] = $nameservers;
        }

        $response = $this->_Call('createDomain', $param );
        dd($response);
        return $this->return_encode($response, 'callbackDomain');
    }

    public function updateDomain(string $domainname, Contactentries $contacts, Nameserverentries $nameservers, bool $keepdnssecrecords, DnssecentriesObject $dnssecentries)
    {
        return $this->_Call('updateDomain', get_defined_vars() );

        //return $this->return_encode($response, 'callbackDomain');

    }

    public function cancelDomain(string $domainname)
    {
        return $this->_Call('cancelDomain', get_defined_vars() );

        //return $this->return_encode($response, 'callbackSuccessDomain');
    }

    public function transferDomain(string $domainname, Contactentries $contacts, Nameserverentries $nameservers, string $authcode)
    {
        return $this->_Call('transferDomain', get_defined_vars() );

        //return $this->return_encode($response, 'callbackDomain');
    }

    public function changeOwnerDomain(int $newDomainId, string $domainname)
    {
        return $this->_Call('changeOwnerDomain', get_defined_vars() );

        //return $this->return_encode($response, 'callbackDomain');
    }

    public function getAuthCodeDomain(mixed $domain): object
    {
        if($domain instanceof NetcupDomain) {
            $param = ['domainname' => $domain->domainname];
        } else {
            $param = ['domainname' => $domain];
        }
        $response = $this->_Call('getAuthcodeDomain', $param );

        return $this->return_encode($response, 'callbackDomain');
    }

    public function infoDomain(string $domainname): object
    {
        $param['domainname'] = $domainname;
        $param['registryinformationflag'] = false;
        $response = $this->_Call('infoDomain', $param );

        return $this->return_encode($response, 'callbackDomain');
    }

    public function searchDomain(string $domainname): object
    {
        $param['domainname'] = $domainname;
        $param['registryinformationflag'] = true;
        $response = $this->_Call('infoDomain', $param );

        return $this->return_encode($response, 'callbackDomain');
    }

    public function listAllDomains(): mixed
    {
        $response = $this->_Call('listallDomains');

        return $this->return_encode($response, 'callbackCollectionDomain');
    }

    public function priceTopLevelDomain(string $topleveldomain): object
    {
        $param['topleveldomain'] = $topleveldomain;
        $response = $this->_Call('priceTopleveldomain', $param );

        return $this->return_encode($response, 'callbackDataDomain');
    }

    protected function setNameserver(array $nameservers): object|array
    {
        $array = [];
        foreach($nameservers as $k=>$nameserver) {
            $array['nameserver'.++$k] = $nameserver;
        }

        return $array;
    }

    protected function callbackDomain(object $data): NetcupDomain
    {
        return new NetcupDomain($data);
    }

    protected function callbackCollectionDomain(array $data): Collection
    {
        $domains = new Collection();
        foreach($data as $domain)
        {
            $domains[] = new NetcupDomain($domain);
        }

        return $domains;
    }

    protected function callbackSuccessDomain(mixed $data): bool
    {
        return true;
    }

    protected function callbackDataDomain(object $data): object
    {
        return $data;
    }

}
