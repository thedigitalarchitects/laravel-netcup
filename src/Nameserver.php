<?php

namespace Tda\LaravelNetcup;

use Tda\LaravelNetcup\Traits\ToArray;

/**
 * Contains Server objects.
 *
 */
class Nameserver
{

    use ToArray;
	/**
	 * Hostname entry
	 */
	public string $hostname;
	/**
	 * IPV4
	 */
	public string $ipv4;
	/**
	 * IPV6
	 */
	public ?string $ipv6;


    public function __construct(string $hostname, string $ipv4, ?string $ipv6 = null)
    {
        $this->hostname = $hostname;
        $this->ipv4 = $ipv4;
        $this->ipv6 = $ipv6;
    }
}
