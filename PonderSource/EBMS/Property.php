<?php

namespace PonderSource\EBMS;

use JMS\Serializer\Annotation\{XmlAttributeMap, XmlValue};

class Property {
    /**
     * @XmlAttributeMap
     */
    private $attributes;

    /**
     * @XmlValue(cdata=false)
     */
    private $value;

    function __construct($value, $attributes=[]){
        $this->value = $value;
        $this->attributes = $attributes;
    }

    function setAttributes($attributes){
        $this->attributes = $attributes;
        return $this;
    }
    function getAttributes(){
        return $this->attributes;
    }
    function addAttribute($key, $value, $overwrite=false){
        if($overwrite){
            $this->attributes[$key] = $value;
        } else {
            if(!isset($this->attributes[$key])){
                $this->attributes[$key] = $value;
            } else {
                throw new Exception('Attribute is already set');
            }
        }
        return $this;
    }
    function removeAttribute($key) {
        unset($this->attributes[$key]);
        return $this;
    }
    function setValue($value){
        $this->value = $value;
        return $this;
    }
    function getValue(){
        return $this->value;
    }
}