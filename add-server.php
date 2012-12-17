#!/usr/bin/php
<?php
require_once("sdk/sdk.class.php");
require_once("config.php");

if ($argc < 6) { print("Usage: $argv[0] <instance-id> <instance-type> <availability-zone> <public-hostname> <local-ipv4> <status>\n"); exit(1); }

$sdb = new AmazonSDB(array(
    "key"    => AWSAccessKeyId,
    "secret" => AWSSecretKey
));
$sdb->set_region(REGION);

$res = $sdb->put_attributes(DOMAIN, $argv[1], array(
    'instance-type'     => $argv[2],
    'availability-zone' => $argv[3],
    'public-hostname'   => $argv[4],
    'local-ipv4'        => $argv[5],
    'status'            => $argv[6]
), true);

if($res->isOK()){
#    print_r($res);
}
else{
#    print_r($res);
    print("Failed.\n");
    exit(1);
}
?>
