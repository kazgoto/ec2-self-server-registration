#!/usr/bin/php
<?php
require_once("sdk/sdk.class.php");
require_once("config.php");

$sdb = new AmazonSDB(array(
    "key"    => AWSAccessKeyId,
    "secret" => AWSSecretKey
));
$sdb->set_region(REGION);

$res = $sdb->listDomains();
if($res->isOK()){
    print_r($res);
}
else{
    print_r("Failed.");
}
?>
