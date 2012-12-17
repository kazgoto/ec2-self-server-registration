#!/usr/bin/php
<?php
require_once("sdk/sdk.class.php");
require_once("config.php");

$sdb = new AmazonSDB(array(
    "key"    => AWSAccessKeyId,
    "secret" => AWSSecretKey
));
$sdb->set_region(REGION);

$res = $sdb->delete_domain($argv[1]);
if($res->isOK()){
    print_r($res);
}
else{
    print_r("Failed.");
}
?>
