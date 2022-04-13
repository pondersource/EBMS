<?php

namespace PonderSource\EBMS;

use PonderSource\EBMS\Namespaces;
use JMS\Serializer\Annotation\{Type,XmlAttribute,XmlNamespace,SerializedName,XmlRoot,XmlElement};

/**
 * @XmlNamespace(uri=Namespaces::DS, prefix="ds")
 * @XmlNamespace(uri=Namespaces::EB, prefix="eb")
 * @XmlNamespace(uri=Namespaces::WSU, prefix="wsu")
 * @XmlNamespace(uri=Namespaces::S12, prefix="S12")
 * @XmlRoot("eb:Messaging")
 */
class Messaging 
{
    /**
     * @XmlAttribute(namespace=Namespaces::S12)
     * @SerializedName("mustUnderstand")
     * @Type("boolean")
     */
    private $s12MustUnderstand = true;

    /**
     * @XmlAttribute(namespace=Namespaces::WSU)
     * @SerializedName("Id")
     * @Type("string")
     */
    private $id;

    /**
     * @SerializedName("UserMessage")
     * @XmlElement(namespace=Namespaces::EB)
     * @Type("PonderSource\EBMS\UserMessage")
     */
    private $userMessage;

    public function __construct($userMessage = null, $id = null){
        $this->userMessage = $userMessage;
        $this->id = $id;
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
        $this->id = $id;
        return $this;
    }

    public function getId(){
        return $this->id;
    }
}