#!/usr/bin/php
<?php
require_once("sdk/sdk.class.php");
require_once("config.php");
if ($argc <= 1) { print("Usage: $argv[0] <instance-id>\n"); exit(1); }

$sdb = new AmazonSDB(array(
    "key"    => AWSAccessKeyId,
    "secret" => AWSSecretKey
));
$sdb->set_region(REGION);

$res = $sdb->delete_attributes(DOMAIN, $argv[1]); 
if($res->isOK()){
#    print_r($res);
}
else{
#    print_r($res);
    print("Failed.\n");
    exit(1);
}
?>
