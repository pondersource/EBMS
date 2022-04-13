<?php

require __DIR__ . '/vendor/autoload.php';

use PonderSource\EBMS\{Messaging, UserMessage, Service, PayloadInfo, PartInfo, Property, MessageInfo, Party, PartyId, PartyInfo, CollaborationInfo};

$messageInfo = new MessageInfo();
$messageInfo->setTimestamp(new DateTime('2022-02-28T10:11:47.68+01:00'))
            ->setMessageId("f28599a0-e0cc-4335-8049-dee97debf1ed@phase4");
$from = new Party(new PartyId('POP000306', 'urn:fdc:peppol.eu:2017:identifiers:ap'), 'http://docs.oasis-open.org/ebxml-msg/ebms/v3.0/ns/core/200704/initiator');
$to = new Party(new PartyId('POP000306', 'urn:fdc:peppol.eu:2017:identifiers:ap'), 'http://docs.oasis-open.org/ebxml-msg/ebms/v3.0/ns/core/200704/responder');
$partyInfo = new PartyInfo($from, $to);
$collaborationInfo = new CollaborationInfo(
    'urn:fdc:peppol.eu:2017:agreements:tia:ap_provider', 
    new Service($value='urn:fdc:peppol.eu:2017:poacc:billing:01:1.0', $serviceType='cenbii-procid-ubl'),
    'busdox-docid-qns::urn:oasis:names:specification:ubl:schema:xsd:Invoice-2::Invoice##urn:cen.eu:en16931:2017#compliant#urn:fdc:peppol.eu:2017:poacc:billing:3.0::2.1',
    'phase4@Conv-3221508681736967991');
$messageProperties = [ 
    new Property('9915:phase4-test-sender', ['name'=>'originalSender','type'=>'iso6523-actorid-upis']),
    new Property('9915:helger', ['name'=>'finalRecipient','type'=>'iso6523-actorid-upis'])];
$partInfo = new PartInfo($reference = 'cid:phase4-att-e80847af-d1ca-4143-9c99-117edd1e0e11@cid');
$partInfo->addPartProperty(new Property('application/xml',['name'=>'MimeType']));
$partInfo->addPartProperty(new Property('application/gzip',['name'=>'CompressionType']));
$payloadInfo = new PayloadInfo($partInfo);
$userMessage = new UserMessage();
$userMessage->setMessageInfo($messageInfo)
            ->setPartyInfo($partyInfo)
            ->setCollaborationInfo($collaborationInfo)
            ->setMessageProperties($messageProperties)
            ->setPayloadInfo($payloadInfo);
$messaging = new Messaging($userMessage, 'phase4-msg-47adeea1-a8c9-421e-85fd-1dec8cd2cd84');

$serializer = \JMS\Serializer\SerializerBuilder::create()->build();
$xmlContent1 = $serializer->serialize($messaging, 'xml');
$xmlContent2 = file_get_contents('messaging-phase4.xml');
$dom1 = new DOMDocument();
$dom1->loadXML($xmlContent1);
$dom2 = new DOMDocument();
$dom2->loadXML($xmlContent2);
$obj1 = $serializer->deserialize($xmlContent1,'PonderSource\EBMS\Messaging::class', 'xml');
$obj2 = $serializer->deserialize($xmlContent2,'PonderSource\EBMS\Messaging::class', 'xml');
$xmlContent3 = $serializer->serialize($obj1, 'xml');
$dom3 = new DOMDocument();
$dom3->loadXML($xmlContent3);

file_put_contents('serialized.xml', $dom1->C14N($exclusive=true));
file_put_contents('read.xml', $dom2->C14N($exclusive=true));
file_put_contents('reserialized.xml', $dom1->C14N($exclusive=true));
/*$obj = $serializer->deserialize($xmlContent, 'PonderSource\EBMS\Messaging::class', 'xml');
var_dump($obj);*/