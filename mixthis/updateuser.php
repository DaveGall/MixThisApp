<?php

session_start();
$_SESSION["success"] = "<div class='success'><h2>Your update was successful</h2></div>";
$user = 'root';
$pass='root';
$dbh = new PDO("mysql:host=localhost;dbname=mix_this;port=8888",$user,$pass);

$users=$_GET['id'];
$stmt=$dbh->prepare("select * from users where id = :id");
$stmt->bindParam(':id', $users);
$stmt->execute();
$result=$stmt->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['submit'])){
    /*if(!filter_var($_POST['website'], FILTER_VALIDATE_URL)){
        echo "<p>Please input a valid URL.</p>";
    }else{*/
    $users=$_GET['id'];
    $name=$_POST['userName'];
    $email=$_POST['email'];
    $stmt=$dbh->prepare("update users set username='".$name."', email='".$email."'where id='".$users."'");
    $stmt->execute();
    header('Location: index.php');
    die();

    /*}*/
}

?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Update Client</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/style.css" rel="stylesheet"/>
</head>

<body>

<form class="col-md-6 formDisplay" action="" method="POST"><!--This will post back to the same page. post will also set the input to load into the database.-->
    <label for="userName">UserName: </label>
    <input type="text" id="userName" name="userName" value='<?php echo $result['username']; ?>' required><!--Fields are required so I placed required on each input-->

    <label for="email">Email Address: </label>
    <input type="email" id="email" name="email" value='<?php echo $result['email']; ?>' required/>

    <input type="submit" name="submit" value="Update User" class="btn-primary button">
</form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
    (function ($){

        $('.success').fadeIn().delay(1000).fadeOut();
    })(jQuery);
</script>
</body>
</html>