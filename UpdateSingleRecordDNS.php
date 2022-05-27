<?php

/**
 * This is an example on how to update a single existing DNS entry for a specific domain
 */

use Transip\Api\Library\Entity\Domain\DnsEntry;

require_once (__DIR__ . '/../Authenticate.php');

$domainName = 'example.com';

// Create a DNS entry object
$dnsEntry = new DnsEntry();
$dnsEntry->setName('apidemo');
$dnsEntry->setExpire('300');
$dnsEntry->setType('TXT');
$dnsEntry->setContent('transip demo');

// Apply entry
$api->domainDns()->updateEntry($domainName, $dnsEntry);
