<?php

namespace Tda\LaravelNetcup;

use Tda\LaravelNetcup\Traits\ToArray;
use ReflectionObject;
use ReflectionProperty;

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
class Contactentries
{
    use ToArray;

	/**
	 * Id of contact handle.
	 */
	public string $ownerc; //obligatory
	/**
	 * Id of contact handle.
	 */
	public string $adminc;
	/**
	 * Id of contact handle.
	 */
	public string $techc;
	/**
	 * Id of contact handle.
	 */
	public string $zonec;
	/**
	 * Id of contact handle.
	 */
	public string $billingc;
	/**
	 * Id of contact handle.
	 */
	public string $onsitec;
	/**
	 * Id of contact handle.
	 */
	public string $generalrequest; //obligatory
	/**
	 * Id of contact handle.
	 */
	public string $abusecontact; //obligatory


    public function __construct(mixed $contact)
    {
        if(!empty($contact)) {
            if(is_array($contact)) {
                $contact = (object) $contact;
            }
            $attributes = (new ReflectionObject($this))->getProperties(ReflectionProperty::IS_PUBLIC);
            foreach($attributes as $attribute) {
                if (!empty($contact->{$attribute->name})) {
                    $this->{$attribute->name} = $contact->{$attribute->name};
                }
            }
        }
    }

}
