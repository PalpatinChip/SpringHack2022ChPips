<?php
declare(strict_types=1);
require 'vendor/autoload.php';

$secret = 'XVQ2UIGO75XRUKJO';
$code = '846474';

$g = new GoogleAuthenticator();

echo 'Current Code is: ';
echo $g->getCode($secret);

echo "\n";

echo "Check if $code is valid: ";

if ($g->checkCode($secret, $code)) {
    echo "YES \n";
} else {
    echo "NO \n";
}

$secret = $g->generateSecret();
echo "Get a new Secret: $secret \n";
echo "The QR Code for this secret (to scan with the Google Authenticator App: \n";

echo \Sonata\GoogleAuthenticator\GoogleQrUrl::generate('chregu', $secret, 'GoogleAuthenticatorExample');
echo "\n";
