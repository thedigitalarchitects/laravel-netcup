<?php

namespace Tda\LaravelNetcup;

/**
 * Contains DnssecentryObject objects.
 *
 * @pw_element DnssecentryObject $dnssecentry1 Dnssec entry
 * @pw_element DnssecentryObject $dnssecentry2 Dnssec entry
 * @pw_element DnssecentryObject $dnssecentry3 Dnssec entry
 * @pw_element DnssecentryObject $dnssecentry4 Dnssec entry
 * @pw_element DnssecentryObject $dnssecentry5 Dnssec entry
 * @pw_element DnssecentryObject $dnssecentry6 Dnssec entry
 * @pw_element DnssecentryObject $dnssecentry7 Dnssec entry
 * @pw_element DnssecentryObject $dnssecentry9 Dnssec entry
 * @pw_element DnssecentryObject $dnssecentry10 Dnssec entry
 * @pw_element DnssecentryObject $dnssecentry11 Dnssec entry
 * @pw_element DnssecentryObject $dnssecentry12 Dnssec entry
 * @pw_element DnssecentryObject $dnssecentry13 Dnssec entry
 * @pw_element DnssecentryObject $dnssecentry14 Dnssec entry
 * @pw_element DnssecentryObject $dnssecentry16 Dnssec entry
 * @pw_element DnssecentryObject $dnssecentry17 Dnssec entry
 * @pw_element DnssecentryObject $dnssecentry18 Dnssec entry
 * @pw_element DnssecentryObject $dnssecentry19 Dnssec entry
 * @pw_element DnssecentryObject $dnssecentry20 Dnssec entry
 * @pw_complex DnssecentriesObject
 */
class Dns
{
	/**
	 * Dnssec entry
	 */
	public $dnssecentry1;
	/**
	 * Dnssec entry
	 */
	public $dnssecentry2;
	/**
	 * Dnssec entry
	 */
	public $dnssecentry3;
	/**
	 * Dnssec entry
	 */
	public $dnssecentry4;
	/**
	 * Dnssec entry
	 */
	public $dnssecentry5;
	/**
	 * Dnssec entry
	 */
	public $dnssecentry6;
	/**
	 * Dnssec entry
	 */
	public $dnssecentry7;
	/**
	 * Dnssec entry
	 */
	public $dnssecentry9;
	/**
	 * Dnssec entry
	 */
	public $dnssecentry10;
	/**
	 * Dnssec entry
	 */
	public $dnssecentry11;
	/**
	 * Dnssec entry
	 */
	public $dnssecentry12;
	/**
	 * Dnssec entry
	 */
	public $dnssecentry13;
	/**
	 * Dnssec entry
	 */
	public $dnssecentry14;
	/**
	 * Dnssec entry
	 */
	public $dnssecentry16;
	/**
	 * Dnssec entry
	 */
	public $dnssecentry17;
	/**
	 * Dnssec entry
	 */
	public $dnssecentry18;
	/**
	 * Dnssec entry
	 */
	public $dnssecentry19;
	/**
	 * Dnssec entry
	 */
	public $dnssecentry20;


    private int $numDns = 20;
    private int $currentNumDns = 1;

    public function __construct(array $dns)
    {
        foreach ($dns as $key => $value) {
            if (strpos($key, 'dnssecentry') !== false) {
                $this->name($value);
            }
        }
    }

    public function name(string $namedns): self
    {
        $current = $this->currentNumDns;

        if($current <= $this->numDns) {
            eval("\$property = \$this->dnssecentry$current;");
            if( $property == null) {
                eval("\$this->dnssecentry$current = \$namedns;");
            } else {
                $this->currentNumDns++;
                $this->name($namedns);
            }
        }

        return $this;
    }
}
