<?php
use PayPal\Api\Payment;

require 'vendor/autoload.php';
define('SITE_URL', 'http://localhost/fav');
$paypal = new \PayPal\Rest\ApiContext(

 new \PayPal\Auth\OAuthTokenCredential(


 	'AVsFjux7PIGI0uNHcRaV3MsrFFlINYVVNL5EOOwnkRN5DQEjOTsnmPRR4UJmy8bJLih_DNCdgQ0zzJkz',
 	'EPm78_lXAWDfHtRblRok2-Yn7vdZL0ET1cd7MifF8hJXRnxUZSOidaI2CR_xF7gsK7k9eSGbVcLiSMX8'

 		)
	);


?>