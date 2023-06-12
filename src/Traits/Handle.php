<?php

namespace Tda\LaravelNetcup\Traits;

use Illuminate\Support\Collection;
use Tda\LaravelNetcup\NetcupHandle;

trait Handle
{

    public function createHandle(NetcupHandle $handle): object
    {
        $response = $this->_Call('createHandle', $handle->toArray() );

        return $this->returnHandle($response);
    }

    public function updateHandle(NetcupHandle $handle): object
    {
        $response = $this->_Call('updateHandle', $handle->toArray() );

        return $this->returnHandle($response);
    }

    public function deleteHandle(NetcupHandle $handle): object
    {
        $param['handle_id'] = $handle->id;
        $response = $this->_Call('deleteHandle', $param );

        return $this->returnHandle($response);
    }

    public function infoHandle(int $handle_id): ?NetcupHandle
    {
        $param['handle_id'] = $handle_id;
        $response = $this->_Call('infoHandle', $param );

        if(!empty($response->responsedata)) {
            return new NetcupHandle($response->responsedata);
        }
    }

    public function listAllHandle(): Collection
    {
        $response = $this->_Call('listallHandle');
        if(!empty($response->responsedata))
        {
            return $this->loadCollectionHandle($response->responsedata);
        }

        return new Collection();
    }

    protected function loadCollectionHandle(array $data): Collection
    {
        $handles = new Collection();
        foreach($data as $handle)
        {
            $handles[] = new NetcupHandle($handle);
        }

        return $handles;
    }

    protected function returnHandle(object $response): object
    {
        $return = array();

        if($response->statuscode == 2000) {
            $return['success'] = true;
            if(!empty($response->responsedata)) {
                $return['data'] = new NetcupHandle($response->responsedata);
            }
        } else {
            $return['success'] = false;
        }
        unset($response->responsedata);
        $return['payload'] = $response;

        return (object) $return;
    }

}
