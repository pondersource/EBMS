<?php

namespace PonderSource\EBMS;

use PonderSource\EBMS\Service;
use JMS\Serializer\Annotation\{SerializedName, XmlElement};

class CollaborationInfo {
    /**
     * @SerializedName("eb:AgreementRef"); 
     * @XmlElement(cdata=false);
     */
    private $agreementRef;

    /**
     * @SerializedName("eb:Service");
     * @XmlElement(cdata=false);
     */
    private $service;

    /**
     * @SerializedName("eb:Action");
     * @XmlElement(cdata=false);
     */
    private $action;

    /**
     * @SerializedName("eb:ConversationId");
     * @XmlElement(cdata=false);
     */
    private $conversationId;

    public function __construct($agreementRef, $service, $action, $conversationId){
        $this->agreementRef = $agreementRef;
        $this->service = $service;
        $this->action = $action;
        $this->conversationId = $conversationId;
        return $this;
    }

    public function getAgreementRef(){
        return $this->agreementRef;
    }

    public function setAgreementRef($agreementRef){
        $this->agreementRef = $agreementRef;
        return $this;
    }

    public function getService(){
        return $this->service;
    }
    
    public function setService($service){
        $this->service = $service;
        return $this;
    }
    
    public function getAction(){
        return $this->action;
    }
    public function setAction($action){
        $this->action = $action;
        return $this;
    }
    public function getConversationId() {
        return $this->conversationId;
    } 
    public function setConversationId($conversationId){
        $this->conversationId = $conversationId;
        return $this;
    }
}