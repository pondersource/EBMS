<?php

namespace PonderSource\EBMS;

use JMS\Serializer\Annotation\{XmlValue, SerializedName, XmlAttribute};

class PartyId {
    /**
     * @SerializedName("PartyId");
     * @XmlValue(cdata=false);
     */
    private $value;

    /**
     * @XmlAttribute
     */
    private $type = '';

    public function __construct($value, $type=''){
        $this->value = $value;
        $this->type = $type;
        return $this;
    }

    public function getValue(){
        return $this->value;
    }
    
    public function setValue($value){
        $this->value = $value;
        return $this;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
        return $this;
    }
}