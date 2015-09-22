<?php



$user="root";//Sets a variable for the name of the user
$pass="root";//Sets a variable for the password of that user
$dbh = new PDO('mysql:host=localhost;dbname=mix_this;port=8889', $user, $pass);//Sets a variable for the address to the specific database, port, username and password to allow access.
if ($_SERVER['REQUEST_METHOD']=='POST') {//This checks to see if anything was submitted
    $email=$_POST['email']; //Sets a variable to grab the data entered into the input with the name email
    $username=$_POST['username'];//Sets a variable to grab the data entered into the input with the name firstname
    $stmt=$dbh->prepare("INSERT INTO users (email, username) VALUES (:email, :username);");//Creates a variable that will insert the fruit name and fruit color values into their respective columns
    $stmt->bindParam(':email', $email);//This passes the entered value for $fruitname into the fruitname column of the database
    $stmt->bindParam(':username', $username);//Places the entered value from $color into its place in the database.
    $stmt->execute();//Executes the whole statement the data transfer process.

}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta  http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" >
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <link href="css/style.css" rel="stylesheet"/>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
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
<div id="fb-root"></div>
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


<div class="container-fluid image">
    <header class="nav nav-tabs">
        <ul class="headerNav">
            <li><a href="search.php">Search</a> </li>
            <li><a href="BAC.php">BAC</a> </li>
            <li><a href="details.html">Details</a> </li>
        </ul>
    </header>
    <div class="row">
        <div class="col-md-4 left">
            <h3>Sign in with Facebook</h3>
            <hr>
            <div class="facebookDiv">
                <!-- Facebook login button -->
                <div class="fb-login-button" data-max-rows="1" data-size="large" data-show-faces="false" data-auto-logout-link="true" scope="public_profile,email" onlogin="checkLoginState();"></div>
                <div id="status"></div>

            </div>
            <div class="normalLogin">
                <h3>Login or Sign Up</h3>
                <hr>
                <form class="form-group" action="index.php" method="post">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email"/>
                    <label for="userName">UserName</label>
                    <input type="text" id="userName" name="username"/>

                    <button id="submitButton" type="submit" name="submit" class="btn-primary submit">Submit</button>
                </form>
            </div>
        </div>
        <div class="col-md-4 middle">



        </div>
        <div class="col-md-4 right">

        </div>


            <!--
            $stmt = $dbh->prepare('SELECT id, username FROM users;');//This statement selects the id, fruitname and fruitcolor that was just passed through the databse.
            $stmt->execute();//This will execute the variable above.
            $result = $stmt->fetchall(PDO::FETCH_ASSOC);//Places all the values into this variable
            foreach ($result as $key=>$value) {//Begins the loop that will go through the associative array and grab all the values.

                echo '<ul><li>'.$key['username'].'</li><li>'.$key['email'].'</li></ul>'.'<a href="search.php?id='.$key['id'].'">Delete</a><br />';//Places the values in the selected section for display in the table.
            }-->

        </div>


    <footer class="navbar-fixed-bottom">
        <div class="fb-like" data-href="https://sosmashed.com" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
    </footer>

</div>

</body>
</html>