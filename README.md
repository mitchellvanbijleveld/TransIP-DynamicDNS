# TransIP-DynamicDNS
Custom Dynamic DNS implementation with help of the TransIP API.

## Usage
Run the following command in a terminal to execute the script:

`php UpdateSingleRecordDNS.php`

## What are the files used for?

### UpdateSingleRecordDNS.php
Main php file that uses the other files if needed. Running this file will check the current IP, fetches the new external IP and checks if the old IP differs from the new IP. If the new external IP differs from the current IP, authenticate with the TransIP API and update the specified DNS Record.

### GetExternalIP.sh
Uses [Google Domains](https://domains.google.com/checkip) to get the current external IP. This could be done by a php function as well. Shell script saves the output to 'LatestFetchedIPAddress'.

### LatestFetchedIPAddress.txt
File stat stores the latest fetched IP from 'GetExternalIP.sh'.

### TransIP-Authenticate-API.php
In case the main file finds a new IP address, this file is used to authenticate with the TransIP API.
