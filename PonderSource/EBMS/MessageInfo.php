<?php

namespace PonderSource\EBMS;

use JMS\Serializer\Annotation\{XmlElement, SerializedName, Exclude};

class MessageInfo {
    /**
     * @SerializedName("eb:Timestamp");
     * @XmlElement(cdata=false);
     */
    private $timestampString;

    /**
     * @Exclude
     */
    private $timestamp;

    /**
     * @SerializedName("eb:MessageId");
     * @XmlElement(cdata=false);
     */
    private $messageId;

    public function __construct($timestamp = null, $messageId = null){
        $this->timestamp = $timestamp;
        $this->messageId = $messageId;
        if($timestamp && get_class($timestamp) === "DateTime"){
            $this->timestampString = $timestamp->format(\DateTimeInterface::RFC3339_EXTENDED);
        }
        return $this;
    }

    public function getTimestamp(){
        return $this->timestamp;
    }

    public function setTimestamp($timestamp){
        if(get_class($timestamp) === "DateTime"){
            $this->timestamp = $timestamp;
            $this->timestampString = $timestamp->format(\DateTimeInterface::RFC3339_EXTENDED);
            return $this;
        } else {
            throw new Exception("Timestamp has to be of class DateTime");
        }
    }

    public function getMessageId(){
        return $this->messageId;
    }

    public function setMessageId($messageId){
        $this->messageId = $messageId;
        return $this;
    }
}