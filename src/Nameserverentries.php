<?php

namespace Tda\LaravelNetcup;

/**
 * Handle Ids of contacts.
 *
 * @pw_element string $ownerc Id of contact handle.
 * @pw_element string $adminc Id of contact handle.
 * @pw_element string $techc Id of contact handle.
 * @pw_element string $zonec Id of contact handle.
 * @pw_element string $billingc Id of contact handle.
 * @pw_element string $onsitec Id of contact handle.
 * @pw_element string $generalrequest Id of contact handle.
 * @pw_element string $abusecontact Id of contact handle.
 * @pw_complex Contactentries
 */
class Nameserverentries
{
	/**
	 * Object with information about nameserver.
	 */
	public ?string $nameserver1 = null;
	/**
	 * Object with information about nameserver.
	 */
	public ?string $nameserver2 = null;
	/**
	 * Object with information about nameserver.
	 */
	public ?string $nameserver3 = null;
	/**
	 * Object with information about nameserver.
	 */
	public ?string $nameserver4 = null;
	/**
	 * Object with information about nameserver.
	 */
	public ?string $nameserver5 = null;
	/**
	 * Object with information about nameserver.
	 */
	public ?string $nameserver6 = null;
	/**
	 * Object with information about nameserver.
	 */
	public ?string $nameserver7 = null;
	/**
	 * Object with information about nameserver.
	 */
	public ?string $nameserver8 = null;

    private int $numServers = 8;
    private int $currentNumServer = 1;

    public function nameserver(string $nameserver): Nameserverentries
    {
        $current = $this->currentNumServer;

        if($current <= $this->numServers) {
            eval("\$property = \$this->nameserver$current;");
            if( $property == null) {
                eval("\$this->nameserver$current = \$nameserver;");
            } else {
                $this->currentNumServer++;
                $this->nameserver($nameserver);
            }
        }

        return $this;
    }
}
