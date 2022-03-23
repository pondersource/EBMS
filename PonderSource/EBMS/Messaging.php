<?php

namespace PonderSource\EBMS;

use JMS\Serializer\Annotation\{XmlAttributeMap,XmlNamespace,SerializedName,XmlRoot};

/**
 * @XmlNamespace(uri = "http://www.w3.org/2000/09/xmldsig#", prefix="ds")
 * @XmlNamespace(uri = "http://docs.oasis-open.org/ebxml-msg/ebms/v3.0/core/ebms-header-3_0-200704.xsd", prefix="eb")
 * @XmlNamespace(uri = "http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd", prefix="wsu")
 * 
 * @XmlRoot("eb:Messaging")
 */
class Messaging 
{
    /**
     * @XmlAttributeMap
     */
    private $attributes = ['S12:MustUnderstand' => 'true'];

    /**
     * @SerializedName("eb:UserMessage")
     */
    private $userMessage;

    public function __construct($userMessage = null, $id = null){
        $this->userMessage = $userMessage;
        $this->attributes['wsu:Id'] = $id;
        return $this;
    }

    public function setUserMessage($userMessage){
        $this->userMessage = $userMessage;
        return $this;
    }

    public function getUserMessage(){
        return $this->userMessage;
    }

    public function setId($id){
        $this->attributes['wsu:Id'] = $id;
        return $this;
    }

    public function getId(){
        return $this->attributes['wsu:Id'];
    }
}