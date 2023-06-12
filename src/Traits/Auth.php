<?php

namespace Tda\LaravelNetcup\Traits;


trait Auth
{

    public function login(): void
    {
        $response = $this->_Call('login', []);
        $this->apisessionid = $response->responsedata->apisessionid;
        $this->serverrequestid = $response->serverrequestid;
    }


    public function logout(): void
    {
        $this->_Call('logout', [] );
        unset($this->apisessionid);
        unset($this->serverrequestid);
    }

}
