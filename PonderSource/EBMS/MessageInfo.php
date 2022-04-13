<?php

namespace PonderSource\EBMS;

use PonderSource\EBMS\Namespaces;
use JMS\Serializer\Annotation\{Type, XmlElement, SerializedName, Exclude};

class MessageInfo {
    /**
     * @SerializedName("Timestamp");
     * @XmlElement(cdata=false,namespace=Namespaces::EB);
     * @Type("DateTime<'Y-m-d\TH:i:s.vP'>")
     */
    private $timestamp;

    /**
     * @SerializedName("MessageId");
     * @XmlElement(cdata=false,namespace=Namespaces::EB);
     * @Type("string")
     */
    private $messageId;

    public function __construct($timestamp = null, $messageId = null){
        $this->timestamp = $timestamp;
        $this->messageId = $messageId;
        return $this;
    }

    public function getTimestamp(){
        return $this->timestamp;
    }

    public function setTimestamp($timestamp){
        $this->timestamp = $timestamp;
        return $this;
    }

    public function getMessageId(){
        return $this->messageId;
    }

    public function setMessageId($messageId){
        $this->messageId = $messageId;
        return $this;
    }
}