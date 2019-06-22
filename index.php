<?php 
//Url to shorten
$longUrl = 'http://'; 
$apiKey = 'AIzaSyCCetTRd5A_CnT1IX2ERJHKmmdqGHMVXk4'; 
// You can get API key here : Login to google and 
// go to http://code.google.com/apis/console/ 
// Find API key under credentials under APIs & auth. 
// You will need to do necessary things to get key there. :)
// Watch video below. 

// *** No need to modify any of the code line below. *** 
$postData = array('longUrl' => $longUrl, 'key' => $apiKey);
$jsonData = json_encode($postData);
$curlObj = curl_init();
curl_setopt($curlObj, CURLOPT_URL, 'https://www.googleapis.com/urlshortener/v1/url?key='.$apiKey);
curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curlObj, CURLOPT_HEADER, 0);
curl_setopt($curlObj, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
curl_setopt($curlObj, CURLOPT_POST, 1);
curl_setopt($curlObj, CURLOPT_POSTFIELDS, $jsonData);
$response = curl_exec($curlObj);
$json = json_decode($response);

curl_close($curlObj);
echo 'Shortened URL ->'.$json->id;
?>
