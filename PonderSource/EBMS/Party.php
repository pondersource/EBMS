<?php

namespace PonderSource\EBMS;

use JMS\Serializer\Annotation\{XmlElement, SerializedName};

class Party {
    /**
     * @SerializedName("eb:PartyId");
     */
    private $partyId;

    /**
     * @SerializedName("eb:Role");
     * @XmlElement(cdata=false);
     */
    private $role;

    public function __construct($partyId, $role){
        $this->partyId = $partyId;
        $this->role = $role;
        return $this;
    }

    public function getPartyId(){
        return $this->partyId;
    }

    public function setPartyId($partyId){
        $this->partyId = $partyId;
        return $this;
    }

    public function getRole() {
        return $this->role;
    }

    public function setRole($role){
        $this->role = $role;
        return $this;
    }
}