<?php

namespace Tda\LaravelNetcup\Client;


interface ClientInterface
{
    public function call(string $method, array $param): mixed;

}
