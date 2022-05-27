<?php

use Transip\Api\Library\Entity\Domain\DnsEntry;

// Get Latest Saved IP.
$CurrentIPRecord = "LatestFetchedIPAddress.txt";
//The "x" parameter can be "r","w" or "a"
$HandleCurrentIPRecord = fopen($CurrentIPRecord, "r");
$IP_Old = fread($HandleCurrentIPRecord, filesize($CurrentIPRecord));
echo $IP_Old;

//Run Script to Get Updated IP.
shell_exec('sh GetIP.sh');

// Get Latest Fetched And Saved IP.
$FetchedExternalIPRecord = "LatestFetchedIPAddress.txt";
//The "x" parameter can be "r","w" or "a"
$HandleFetchedIPRecord = fopen($FetchedExternalIPRecord, "r");
$IP_New = fread($HandleFetchedIPRecord, filesize($FetchedExternalIPRecord));
echo $IP_New;

if ($IP_New <> $IP_Old) {
	echo 'difference';

require_once (__DIR__ . '/Authenticate.php');

$domainName = 'DOMAIN.TLD';

// Create a DNS entry object
$dnsEntry = new DnsEntry();
$dnsEntry->setName('NAME_OF_RECORD');
$dnsEntry->setExpire('300');
$dnsEntry->setType('A');
$dnsEntry->setContent(trim($IP_New));

// Apply entry
$api->domainDns()->updateEntry($domainName, $dnsEntry);
  	
} else {
	echo 'no difference';
}
