<?php

namespace PonderSource\EBMS;

use JMS\Serializer\Annotation\{SerializedName, XmlList};

class UserMessage {
    /**
     * @SerializedName("eb:MessageInfo");
     */
    private $messageInfo;

    /**
     * @SerializedName("eb:PartyInfo");
     */
    private $partyInfo;

    /**
     * @SerializedName("eb:CollaborationInfo");
     */
    private $collaborationInfo;

    /**
     * @SerializedName("eb:MessageProperties");
     * @XmlList(inline=true, entry="eb:Property")
     */
    private $messageProperties;

    /**
     * @SerializedName("eb:PayloadInfo")
     */
    private $payloadInfo;

    public function __construct(
            $messageInfo = null, 
            $partyInfo = null, 
            $collaborationInfo = null, 
            $messageProperties = null, 
            $payloadInfo = null)
    {
        $this->messageInfo = $messageInfo;
        $this->partyInfo = $partyInfo;
        $this->collaborationInfo = $collaborationInfo;
        $this->messageProperties = $messageProperties;
        $this->payloadInfo = $payloadInfo;
        return $this;
    }

    public function getMessageInfo(){
        return $this->messageInfo;
    }
    public function setMessageInfo($messageInfo){
        $this->messageInfo = $messageInfo;
        return $this;
    }
    public function getPartyInfo(){
        return $this->partyInfo;
    }
    public function setPartyInfo($partyInfo){
        $this->partyInfo = $partyInfo;
        return $this;
    }
    public function getCollaborationInfo(){
        return $this->collaborationInfo;
    }
    public function setCollaborationInfo($collaborationInfo){
        $this->collaborationInfo = $collaborationInfo;
        return $this;
    }
    public function getMessageProperties(){
        return $this->messageProperties;
    }
    public function setMessageProperties($messageProperties){
        $this->messageProperties = $messageProperties;
        return $this;
    }
    public function getPayloadInfo(){
        return $this->payloadInfo;
    }
    public function setPayloadInfo($payloadInfo){
        $this->payloadInfo = $payloadInfo;
        return $this;
    }
    public function addMessageProperty($property){
        if(get_class($property) !== 'PonderSource\EBMS\Property'){
            throw new Exception('Failed to add Message Property as it is not of type Property');
        }    
        array_push($this->messageProperties, $property);
        return $this;
    }
    public function removeMessageProperty($property){
        array_filter($this->messageProperties, function($p) { return $p != $property; }, ARRAY_FILTER_USE_KEY);
        return $this;
    }
}