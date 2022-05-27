IP_CurrentARecord=$(cat ./LatestFetchedIPAddress.txt)
IP_FromInternet=$(curl -4 https://domains.google.com/checkip)

if [ $IP_FromInternet = $IP_CurrentARecord ]; then
    echo "The fetched IP Address is the same as the current A Record."
  else
    echo "The fetched IP Address is different from the current A Record. Updating the A Record..."
fi

echo $IP_FromInternet > "./LatestFetchedIPAddress.txt"
