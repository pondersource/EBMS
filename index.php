<?php

require __DIR__ . '/vendor/autoload.php';

use PonderSource\EBMS\{Messaging, UserMessage, Service, PayloadInfo, PartInfo, Property, MessageInfo, Party, PartyId, PartyInfo, CollaborationInfo};

$messageInfo = new MessageInfo();
$messageInfo->setTimestamp(new DateTime('2022-02-28T10:11:47.68+01:00'))
            ->setMessageId("f28599a0-e0cc-4335-8049-dee97debf1ed@phase4");
$from = new Party(new PartyId('urn:fdc:peppol.eu:2017:identifiers:ap', 'POP000306'), 'http://docs.oasis-open.org/ebxml-msg/ebms/v3.0/ns/core/200704/initiator');
$to = new Party(new PartyId('urn:fdc:peppol.eu:2017:identifiers:ap', 'POP000306'), 'http://docs.oasis-open.org/ebxml-msg/ebms/v3.0/ns/core/200704/responder');
$partyInfo = new PartyInfo($from, $to);
$collaborationInfo = new CollaborationInfo(
    'urn:fdc:peppol.eu:2017:agreements:tia:ap_provider', 
    new Service($value='urn:fdc:peppol.eu:2017:poacc:billing:01:1.0', $serviceType='cenbii-procid-ubl'),
    'busdox-docid-qns::urn:oasis:names:specification:ubl:schema:xsd:Invoice-2::Invoice##urn:cen.eu:en16931:2017#compliant#urn:fdc:peppol.eu:2017:poacc:billing:3.0::2.1',
    'phase4@Conv-3221508681736967991');
$messageProperties = [ 
    new Property('9915:phase4-test-sender', ['name'=>'originalSender','type'=>'iso6523-actorid-upis']),
    new Property('9915:helger', ['name'=>'finalRecipient','type'=>'iso6523-actorid-upis'])];
$partInfo = new PartInfo($reference = 'cid:blablabla');
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
$xmlContent = $serializer->serialize($messaging, 'xml');
var_dump($xmlContent);