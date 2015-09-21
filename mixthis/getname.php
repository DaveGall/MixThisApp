<?php

$user = "root";
$pass = "root";
$dbh = new PDO("mysql:host=localhost;dbname=mix_this;port=8888",$user,$pass);


$stmnt = $dbh->prepare("select id, username, email from users order by rand() limit 1");
$stmnt->execute();
$result = $stmnt->fetchAll(PDO::FETCH_ASSOC);
$result = array("users"=>$result);

header("Content-type:application/json");
$jsonfile = json_encode($result);
echo $jsonfile;

?>
