<?php

namespace Tda\LaravelNetcup\Traits;


trait Poll
{

    public function poll(int $messagecount = 50): mixed
    {
        $param['messagecount'] = $messagecount;
        $response = $this->_Call('poll', $param );

        return $this->returnPoll($response);
    }

    public function ackpoll(int $apiLogId)
    {
        $param['apilogid'] = $apiLogId;
        $response = $this->_Call('ackpoll', $param );

        return $this->returnPoll($response);
    }

    protected function returnPoll(object $response): object
    {
        $return = array();

        if($response->statuscode == 2000) {
            $return['success'] = true;
            if(!empty($response->responsedata)) {
                $return['data'] = $response->responsedata;
            }
        } else {
            $return['success'] = false;
        }
        unset($response->responsedata);
        $return['payload'] = $response;

        return (object) $return;
    }
}
