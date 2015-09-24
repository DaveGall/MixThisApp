<?php
session_start();
if(isset($_SESSION['success'])){
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}


$user="root";//Sets a variable for the name of the user
$pass="root";//Sets a variable for the password of that user
$dbh = new PDO('mysql:host=localhost;dbname=mix_this;port=8888', $user, $pass);//Sets a variable for the address to the specific database, port, username and password to allow access.
if ($_SERVER['REQUEST_METHOD']=='POST') {//This checks to see if anything was submitted
    $email=$_POST['email']; //Sets a variable to grab the data entered into the input with the name email
    $uName=$_POST['userName'];//Sets a variable to grab the data entered into the input with the name firstname
    $stmt=$dbh->prepare("INSERT INTO users (email, username) VALUES (:email, :username);");//Creates a variable that will insert the fruit name and fruit color values into their respective columns
    $stmt->bindParam(':email', $email);//This passes the entered value for $fruitname into the fruitname column of the database
    $stmt->bindParam(':username', $uName);//Places the entered value from $color into its place in the database.
    $stmt->execute();//Executes the whole statement the data transfer process.

}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta  http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" >
    <link href='http://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/style.css" rel="stylesheet"/>
    <script src="js/jquery.js" type="javascript"></script>
    <script src="js/bootstrap.min.js" type="javascript"></script>
    <script src="js/main.js" type="javascript"></script>
    <title>Landing Page</title>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({ cache: true });
            $.getScript('//connect.facebook.net/en_US/sdk.js', function(){
                FB.init({
                    appId: '{1685493761670460}',
                    version: 'v2.3' // or v2.0, v2.1, v2.0
                });
                $('#loginbutton,#feedbutton').removeAttr('disabled');
                FB.getLoginStatus(updateStatusCallback);
            });
        });
    </script>

</head>
<body>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=1685493761670460";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<script>

    function statusChangeCallback(response) {
        console.log('statusChangeCallback');
        console.log(response);

        if (response.status === 'connected') {

            testAPI();
        } else if (response.status === 'not_authorized') {

            document.getElementById('status').innerHTML = 'Please log ' +
            'into this app.';
        } else {

            document.getElementById('status').innerHTML = 'Please log ' +
            'into Facebook.';
        }
    }


    function checkLoginState() {
        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });
    }

    window.fbAsyncInit = function() {
        FB.init({
            appId      : '{1685493761670460}',
            cookie     : true,

            xfbml      : true,
            version    : 'v2.2'
        });



        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });

    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    function testAPI() {
        console.log('Welcome!  Fetching your information.... ');
        FB.api('/me', function(response) {
            console.log('Successful login for: ' + response.name);
            document.getElementById('status').innerHTML =
                'Welcome to Mix This, ' + response.name + '!';
        });
    }
</script>

<header class="nav nav-tabs">
    <ul class="headerNav">
        <li><a href="search.php">Search</a> </li>
        <li><a href="BAC.php">BAC</a> </li>
        <li><a href="details.html">Details</a> </li>
    </ul>
</header>

<div class="container-fluid bacPage">
    <h1 class="title">Mix This</h1>

    <p class="titleText">Your own personal bartender.</p>

    <div class="row">
        <div class="col-md-4 left">
            <div id="fb-root"></div>
            <h3 class="normalText">Sign in with Facebook</h3>
            <hr>
            <div class="facebookDiv">
                <!-- Facebook login button -->
                <div class="fb-login-button" data-max-rows="1" data-size="large" data-show-faces="false" data-auto-logout-link="true" scope="public_profile,email" onlogin="checkLoginState();"></div>
                <div id="status"></div>

            </div>

        </div>
        <div class="col-md-4 middle">
            <h4 class="normalText">Drink Responsibly</h4>
            <hr>
            <p>Remember all the little golden rules about drinking. Don't drink and drive, don't drink while pregnant
            and make sure you are 21 before you start drinking. </p>



        </div>
        <div class="col-md-4 right">
            <div class="normalLogin">

                <h3 class="normalText">Login/Sign Up</h3>
                <hr>
                <form class="form-group" action="index.php" method="POST">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email"/>
                    <label for="userName">UserName</label>
                    <input type="text" id="userName" name="userName"/>

                    <button id="calcBAC" type="submit" name="submit" class="submit">Submit</button>
                    <h4>Welcome:</h4>
                    <p id="user"></p>
                </form>

                <?php
                function userData(){//function to catch all the data and return an array
                    $uName = $_POST['userName'];//Grabs the data from the input for username
                    $email = $_POST['email'];//grabs the data from the input for password

                    return array("UserName " => $uName, "Email " => $email);//Returns all the data collected in an array.
                }



                if(isset($_POST['submit'])){//This if statement will check to see if the submit button was clicked
                    $info = userData();//This stores the data collected from the userData function and places it into a variable.
                    echo "<div class='left'>";//Div that will begin the form results that will display for the user.
                    foreach($info as $attribute => $info){//This will run through the data in the array.
                        echo "<p>{$attribute}:<span style='color:#1C2DB2'><strong> {$info}</strong></span></p>";//This will output each item in the array on a separate line.
                    }
                    echo "</div>";//This div ends the form results display.
                }
                ?>

            </div>
        </div>

<!--Select * From users Where username=$username and email=$email-->


        </div>


    <footer class="navbar-fixed-bottom">
        <div class="fb-like" data-href="https://sosmashed.com" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
    </footer>

</div>

</body>
</html>