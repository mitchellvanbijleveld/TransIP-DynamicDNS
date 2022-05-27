<?php

use Transip\Api\Library\Entity\Domain\DnsEntry;

// Get Latest Saved IP.
$IP_Old = file_get_contents("LatestFetchedIPAddress.txt");
echo $IP_Old;
echo "\n";

//Run Script to Get Updated IP.
shell_exec('sh GetExternalIP.sh');

// Get Latest Fetched And Saved IP.
$IP_New = file_get_contents("LatestFetchedIPAddress.txt");
echo $IP_New;
echo "\n";

if ($IP_New <> $IP_Old) {
  echo 'IP is different. Updating the A Record...';
  echo "\n";

require_once (__DIR__ . '/TransIP-Authenticate-API.php');

$domainName = 'DOMAIN_TLD';

// Create a DNS entry object
$dnsEntry = new DnsEntry();
$dnsEntry->setName('NAME_OF_RECORD');
$dnsEntry->setExpire('300');
$dnsEntry->setType('A');
$dnsEntry->setContent(trim($IP_New));

// Apply entry
$api->domainDns()->updateEntry($domainName, $dnsEntry);

} else {
	echo "IP is the same as current A Record.";
  echo "\n";
}
