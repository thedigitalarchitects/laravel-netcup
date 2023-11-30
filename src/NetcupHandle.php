<?php

namespace Tda\LaravelNetcup;

use Tda\LaravelNetcup\Traits\ToArray;
use ReflectionObject;
use ReflectionProperty;

class NetcupHandle
{
    use ToArray;

    public int $id;
    public int $handle_id;
    public string $type;
    public string $name;
    public string $organisation;
    public string $street;
    public string $postalcode;
    public string $city;
    public string $countrycode;
    public string $telephone;
    public string $email;
    public array $optionalhandleattributes = [];
    public bool $assignedtodomain = false;


    public function __construct(?object $handle = null)
    {
        if(!empty($handle)) {
            if(is_array($handle)) {
                $handle = (object) $handle;
            }
            $attributes = (new ReflectionObject($this))->getProperties(ReflectionProperty::IS_PUBLIC);
            foreach($attributes as $attribute) {
                if(isset($handle->{$attribute->name})) {
                    $this->{$attribute->name} = $handle->{$attribute->name};
                }
            }
            // It comes as 'id' from Netcup, but to send back they require as 'handle_id'
            if(isset($handle->id)) {
                $this->handle_id = $handle->id;
            }
        }
    }
}
