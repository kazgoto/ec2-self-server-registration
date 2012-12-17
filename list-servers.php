#!/usr/bin/php
<?php
require_once("sdk/sdk.class.php");
require_once("config.php");

$sdb = new AmazonSDB(array(
    "key"    => AWSAccessKeyId,
    "secret" => AWSSecretKey
));
$sdb->set_region(REGION);

if ($argc == 1 ) {
   $sql = 'SELECT * FROM `' . DOMAIN .'`';
   print("sql = $sql\n");
}
else {
   $sql = 'SELECT * FROM `' . DOMAIN . "` WHERE $argv[1]";
   print("sql = $sql\n");
}
$next_token = null;

do {
    if ($next_token) {
        $res = $sdb->select($sql, array( 'NextToken' => $next_token ));
    }
    else {
        $res = $sdb->select($sql);
    }

    if($res->isOK()){
        print_r($res->body->SelectResult);
    }
    else{
        var_dump($res);
        print("Failed.\n");
    }
    $next_token = isset($res->body->SelectResult->NextToken)
        ? (string) $res->body->SelectResult->NextToken
        : null;
} while ($next_token);

?>
