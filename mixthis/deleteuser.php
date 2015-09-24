<?php

$user="root";//Grabs the username of the database in a variable
$pass="root";//Grabs the password of the user and places it into a variable
$dbh = new PDO('mysql:host=localhost;dbname=mix_this;port=8889', $user, $pass);//Sets a variable for the address to the specific database, port, username and password to allow access.
$userId=$_GET['id'];//Grabs the id of the row that has been clicked
$stmt=$dbh->prepare("Delete from users where id in (:id)");//Deletes the record from the database using the id as the identifier.
$stmt->bindParam(':id',$userId);//This grabs the entered value for $fruitid into the id column of the database
$stmt->execute();//Executes the process of deleting the record selected
header('Location: index.php');//Returns the user to the fruits.php page.
die();//Exits the php script.