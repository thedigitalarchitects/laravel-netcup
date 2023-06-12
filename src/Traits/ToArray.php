<?php

namespace Tda\LaravelNetcup\Traits;

use ReflectionObject;
use ReflectionProperty;

trait ToArray
{
    public function toArray(): array
    {
        $array = [];
        $attributes = (new ReflectionObject($this))->getProperties(ReflectionProperty::IS_PUBLIC);
        foreach($attributes as $attribute) {
            if(isset($this->{$attribute->name})) {
                $array[$attribute->name] = $this->{$attribute->name};
            }
        }

        return $array;
    }
}
