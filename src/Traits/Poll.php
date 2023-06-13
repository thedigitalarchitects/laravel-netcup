<?php

namespace Tda\LaravelNetcup\Traits;

use \Illuminate\Support\Collection;

trait Poll
{

    public function poll(int $messagecount = 50): mixed
    {
        $param['messagecount'] = $messagecount;
        $response = $this->_Call('poll', $param );

        return $this->return_encode($response, 'callbackPoll');
    }

    public function ackpoll(int $apiLogId)
    {
        $param['apilogid'] = $apiLogId;
        $response = $this->_Call('ackpoll', $param );

        return $this->return_encode($response, 'callbackSuccessPoll');
    }

    protected function callbackPoll(array $data): array
    {
        return $data;
    }

    protected function callbackSuccessPoll(string $data): bool
    {
        return true;
    }
}
