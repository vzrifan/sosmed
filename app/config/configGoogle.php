<?php
include_once("src/Google_Client.php");
include_once("src/contrib/Google_Oauth2Service.php");
######### edit details ##########
$clientId = '33616300529-gf74fkivchabbohpag28forvielcdbjp.apps.googleusercontent.com'; //Google CLIENT ID
$clientSecret = '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'; //Google CLIENT SECRET
$redirectUrl = 'http://localhost/sosmed/public';  //return url (url to script)
$homeUrl = 'http://localhost';  //return to home

##################################

$gClient = new Google_Client();
$gClient->setApplicationName('Login to siakad');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectUrl);

$google_oauthV2 = new Google_Oauth2Service($gClient);