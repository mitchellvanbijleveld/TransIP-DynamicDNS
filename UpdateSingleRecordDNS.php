<?php

use Transip\Api\Library\Entity\Domain\DnsEntry;

// Get Latest Saved IP.
$IP_Old = file_get_contents"LatestFetchedIPAddress.txt";
echo $IP_Old;

//Run Script to Get Updated IP.
shell_exec('sh GetIP.sh');

// Get Latest Fetched And Saved IP.
$IP_New = file_get_contents"LatestFetchedIPAddress.txt";
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
