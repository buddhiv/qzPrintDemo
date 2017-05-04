<?php
// #########################################################
// #                     PHP Signing                       #
// #########################################################
// Sample key.  Replace with one used for CSR generation
$KEY = 'key.pem';
$PASS = 'lpdsneo'; //Comment out/delete if the private key is not password protected

echo 'right';

$req = $_GET['request']; //GET method
//$req = $_POST['request']; //POST method
$privateKey = openssl_get_privatekey(file_get_contents($KEY), $PASS); //use syntax below if file is not password protected
//$privateKey = openssl_get_privatekey(file_get_contents($KEY));

$signature = null;
openssl_sign($req, $signature, $privateKey);

if ($signature) {
  header("Content-type: text/plain");
  echo base64_encode($signature);
  exit(0);
}

echo '<h1>Error signing message</h1>';
exit(1);
?>
