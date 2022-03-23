<?php

namespace PonderSource\EBMS;

require __DIR__ . '/../../vendor/autoload.php';

use PonderSource\EBMS\Property;
use JMS\Serializer\Annotation\{XmlNamespace, XmlRoot, XmlList, XmlAttributeMap};

/**
 * @XmlNamespace(uri="http://docs.oasis-open.org/ebxml-msg/ebms/v3.0/core/ebms-header-3_0-200704.xsd", prefix="eb")
 */
class PartInfo {
    /**
     * @XmlList(inline=true, entry="eb:Property")
     */
    private $partProperties = [];
    
    /**
     * @XmlAttributeMap
     */
    private $partReference = ['href' => ''];

    public function __construct($reference = '', $partProperties = []){
        $this->partReference['href'] = $reference;
        $this->partProperties = $partProperties;
    }

    function setReference($ref){
        $this->partReference['href'] = $ref;
        return $this;
    }

    function getReference(){
        return $this->partReference['href'];
    }

    function addPartProperty($property){
        if(get_class($property) !== 'PonderSource\EBMS\Property'){
            throw new Exception('Failed to add property as it is not of class Property');
        }
        array_push($this->partProperties, $property);
        return $this;
    }

    function removePartProperty($property){
        array_filter($this->partProperties, function($p) { return $p != $property; }, ARRAY_FILTER_USE_KEY);
        return $this;
    }
}
