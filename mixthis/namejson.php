<?php


header("Content-type:application/json");
$user="root";
$pass="root";
$dbh = new PDO('mysql:host=localhost;dbname=mix_this;port=8889', $user, $pass);

$stmt = $dbh->prepare('SELECT id, username, email FROM users;');

$stmt->execute();
$result = $stmt->fetchall(PDO::FETCH_ASSOC);

var_dump($result);

foreach($result as $value){
    $myjson = array("users"=>array(array("id"=>$value['id'], "username"=>$value['username'], "email"=>$value['email'])));
    $jsonfile = json_encode($myjson);
    echo $jsonfile;
    file_put_contents('myjson.json' ,$jsonfile);
}