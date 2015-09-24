



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href='http://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" datatype="jsonp"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/style.css" rel="stylesheet"/>
    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>
    <title>Search Page</title>
</head>
<body>

<header class="nav nav-tabs">
    <ul class="headerNav">
        <li><a href="#">Search</a> </li>
        <li><a href="BAC.php">BAC</a> </li>
        <li><a href="details.html">Details</a> </li>
    </ul>
</header>

<div class="container-fluid bacPage">
    <h1 class="title">Mix This</h1>

    <div class="row"><!--Start the first row-->
        <div class="col-md-4"><!--Form div/column-->
        <form>
            <div>
                <h4>Search by drink</h4>
                <hr>
                <label for="drink">Drink</label>
                <select id="drink" onchange="myFunction()">
                    <option value="Pomegranate Martini" id="pomegranateMartini">Pomegranate Martini</option>
                    <option value="Blue Lagoon" id="blueLagoon">Blue Lagoon</option>
                    <option value="Woo Woo" id="wooWoo">Woo Woo</option>
                    <option value="Malibu Paradise">Malibu Paradise</option>
                    <option value="Bermuda Mai Tai">Bermuda Mai Tai</option>
                    <option value="Cabo Wabo">Cabo Wabo</option>
                    <option value="Cosmopolitan">Cosmopolitan</option>
                    <option value="Mojito">Mojito</option>
                    <option value="Vodka and Coke">Vodka and Coke</option>
                    <option value="Fox Poison">Fox Poison</option>
                    <option value="Seventeen Twist">17 Twist</option>
                </select>



                <script>
                function myFunction(){
                    var item = document.getElementById("drink").value;
                    document.getElementById('drinkDisplay').innerHTML = item;
                    console.log("Inside Function: "+item);

                }

               </script>
            </div>
        </form>

        </div><!--End the form column/div-->

        <div class="col-md-4">
            <form>
                <h4>Search by ingredients</h4>
                <hr>
                <label for="ingredients">Ingredients</label>
                <select id="ingredients" onchange="ingredientsFunction()">
                    <option value="vodka">Vodka</option>
                    <option value="raspberry Vodka">Raspberry Vodka</option>
                    <option value="peach Schnapps">Peach Schnapps</option>
                    <option value="blue Curacao">Blue Curacao</option>
                    <option value="rum">Rum</option>
                    <option value="light Rum">Light Rum</option>
                    <option value="dark Rum">Dark Rum</option>
                    <option value="orange Liqueur">Orange Liqueur</option>
                    <option value="tequila">Tequila</option>
                    <option value="grenadine">Grenadine</option>
                    <option value="lime Juice">Lime Juice</option>
                    <option value="lemonade">Lemonade</option>
                    <option value="cranberry Juice">Cranberry Juice</option>
                    <option value="pineapple Juice">Pineapple Juice</option>
                    <option value="pomegranate">Pomegranate Juice</option>
                    <option value="coke">Coke</option>
                    <option value="citrus Soda">Citrus Soda</option>
                    <option value="sprite">Sprite</option>
                    <option value="club Soda">Club Soda</option>
                    <option value="sweet and SourMix">Sweet and Sour Mix</option>
                </select>
                <!-- <button id="submitButton" value="Submit" onclick="searchIngredients()">Submit</button>-->
            </form>

        </div>
        <div class="col-md-4 results">
            <h3>Results</h3>
            <h3 id="drinkDisplay"></h3>
            <h4 id="drinkTitle"></h4>
        </div>
        <script>
            $.getJSON('data.json', function(data){
                var output= "";
                $.each(data, function(key, val){
                    output+= "<h4><b>"+val.drink+"</b></h4><hr>";
                    output+="Ingredients: "+"<ul><li>"+val.ingredients.in1+"</li><li>"+val.ingredients.in2+"</li><li>"+val.ingredients.in3+"</li><li>"+val.ingredients.in4+"</li><li>"+val.ingredients.in5+"</li><li>"+val.ingredients.in6+"</li></ul>";
                    output+="Instructions: "+val.instructions+"<hr>";
                });

                $('#placeholder').html(output);
            });

            $.getJSON('data.json', function(data){
                console.log(data);


            });

        </script>

    </div><!--End the first row-->
 </div>
 </body>
 </html>