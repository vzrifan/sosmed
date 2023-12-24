<?php
include_once("src/Google_Client.php");
include_once("src/contrib/Google_Oauth2Service.php");
######### edit details ##########
$clientId = '793251624425-p6bugrmle1qklqudca7nsok6nli1v49s.apps.googleusercontent.com'; //Google CLIENT ID
$clientSecret = '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'; //Google CLIENT SECRET
$redirectUrl = 'http://localhost/sosmed';  //return url (url to script)
$homeUrl = 'http://localhost';  //return to home

##################################

$gClient = new Google_Client();
$gClient->setApplicationName('Login to siakad');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectUrl);

$google_oauthV2 = new Google_Oauth2Service($gClient);
