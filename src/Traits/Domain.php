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
    }

    public function updateDomain(string $domainname, Contactentries $contacts, Nameserverentries $nameservers, bool $keepdnssecrecords, DnssecentriesObject $dnssecentries)
    {
        return $this->_Call('updateDomain', get_defined_vars() );

    }

    public function cancelDomain(string $domainname)
    {
        return $this->_Call('cancelDomain', get_defined_vars() );
    }

    public function transferDomain(string $domainname, Contactentries $contacts, Nameserverentries $nameservers, string $authcode)
    {
        return $this->_Call('transferDomain', get_defined_vars() );
    }

    public function changeOwnerDomain(int $newHandleId, string $domainname)
    {
        return $this->_Call('changeOwnerDomain', get_defined_vars() );
    }

    public function getAuthCodeDomain(mixed $domain): ?NetcupDomain
    {
        if($domain instanceof NetcupDomain) {
            $param = ['domainname' => $domain->domainname];
        } else {
            $param = ['domainname' => $domain];
        }
        $response = $this->_Call('getAuthcodeDomain', $param );

        if(!empty($response->responsedata)) {
            return new NetcupDomain($response->responsedata);
        }
    }

    public function infoDomain(string $domainname): ?NetcupDomain
    {
        $param['domainname'] = $domainname;
        $param['registryinformationflag'] = false;
        $response = $this->_Call('infoDomain', $param );

        if(!empty($response->responsedata)) {
            return new NetcupDomain($response->responsedata);
        }
    }

    public function searchDomain(string $domainname): mixed
    {
        $param['domainname'] = $domainname;
        $param['registryinformationflag'] = true;
        $response = $this->_Call('infoDomain', $param );

        if(!empty($response->responsedata)) {
            return new NetcupDomain($response->responsedata);
        } else {
            return $response->longmessage;
        }
    }

    public function listAllDomains(): mixed
    {
        $response = $this->_Call('listallDomains');
        if(!empty($response->responsedata))
        {
            return $this->loadCollectionDomains($response->responsedata);
        } else {
            return $response->longmessage;
        }
    }

    public function priceTopLevelDomain(string $topleveldomain): mixed
    {
        $param['topleveldomain'] = $topleveldomain;
        $response = $this->_Call('priceTopleveldomain', $param );

        if(!empty($response->responsedata)) {
            return $response->responsedata;
        } else {
            return $response->longmessage;
        }
    }

    protected function loadCollectionDomains(array $data): Collection
    {
        $domains = new Collection();
        foreach($data as $domain)
        {
            $domains[] = new NetcupDomain($domain);
        }

        return $domains;
    }

    protected function setNameserver(array $nameservers): object|array
    {
        $array = [];
        foreach($nameservers as $k=>$nameserver) {
            $array['nameserver'.++$k] = $nameserver;
        }

        return $array;
    }

}
