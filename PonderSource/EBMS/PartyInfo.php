<?php

namespace PonderSource\EBMS;

use PonderSource\EBMS\Party;
use JMS\Serializer\Annotation\{XmlNamespace, SerializedName};

class PartyInfo {
    /**
     * @SerializedName("eb:From")
     */
    private $from;

    /**
     * @SerializedName("eb:To")
     */
    private $to;

    public function __construct($from, $to){
        $this->from = $from;
        $this->to = $to;
    }

    public function setFrom($from){
        $this->from = $from;
        return $this;
    }

    public function getFrom(){
        return $this->from;
    }

    public function setTo($to){
        $this->to = to;
        return $this;
    }
    
    public function getTo(){
        return $this->to;
    }
}