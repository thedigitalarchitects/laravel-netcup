<?php

namespace Tda\LaravelNetcup\Traits;

use Illuminate\Support\Collection;
use Tda\LaravelNetcup\NetcupHandle;

trait Handle
{

    public function createHandle(NetcupHandle $handle): object
    {
        $response = $this->_Call('createHandle', $handle->toArray() );

        return $this->return_encode($response, 'callbackHandle');
    }

    public function updateHandle(NetcupHandle $handle): object
    {
        $response = $this->_Call('updateHandle', $handle->toArray() );

        return $this->return_encode($response, 'callbackHandle');
    }

    public function deleteHandle(NetcupHandle $handle): object
    {
        $param['handle_id'] = $handle->id;
        $response = $this->_Call('deleteHandle', $param );

        return $this->return_encode($response, 'callbackSuccessHandle');
    }

    public function infoHandle(int $handle_id): ?NetcupHandle
    {
        $param['handle_id'] = $handle_id;
        $response = $this->_Call('infoHandle', $param );

        return $this->return_encode($response, 'callbackHandle');
    }

    public function listAllHandle(): Collection
    {
        $response = $this->_Call('listallHandle');

        return $this->return_encode($response, 'callbackCollectionHandle');
    }

    protected function callbackHandle(object $data): NetcupHandle
    {
        return new NetcupHandle($data);
    }

    protected function callbackCollectionHandle(array $data): Collection
    {
        $handles = new Collection();
        foreach($data as $handle)
        {
            $handles[] = new NetcupHandle($handle);
        }

        return $handles;
    }

    protected function callbackSuccessHandle(mixed $data): bool
    {
        return true;
    }

}
