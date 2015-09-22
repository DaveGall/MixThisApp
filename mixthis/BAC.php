
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/style.css" rel="stylesheet"/>
    <script src="js/main.js" type="javascript"></script>
    <title>BAC Calculator Page</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <form>
                <label for="weight">Weight</label>
                <input id="weight" type="number" placeholder="weight"/>
                <label for="gender">Gender</label>
                <input id="gender" type="text" placeholder="M/F"/>
                <label for="liqueur">1.5 oz Shots</label>
                <input id="liqueur" type="number" placeholder="1"/>
                <label for="beer">12 oz. Beers</label>
                <input id="beer" type="number" placeholder="1"/>
                <label for="wine">5 oz. Glasses of Wine</label>
                <input id="wine" type="number" placeholder="1"/>
                <label for="hours">Hours Drinking</label>
                <input id="hours" type="number" placeholder="1"/>
                <button type="button" id="calcBAC" onclick="calculate()">Submit</button>
            </form>
            <h3>Your BAC is</h3>
            <p id="bacAnswer"></p>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
    </div>
</div>
<script>
    function calculate(){
        var weight = document.getElementById('weight').value;
        var weightGrams = Number(weight)* 454;
        var gender = document.getElementById('gender').value;
        var liqueur = document.getElementById('liqueur').value;
        var liqueurGrams = Number(liqueur)*14;
        var beer = document.getElementById('beer').value;
        var beerGrams = Number(beer)*14;
        var wine = document.getElementById('wine').value;
        var wineGrams = Number(wine)*14;
        var hours = document.getElementById('hours').value;
        var hoursTimes = Number(hours)*.015;
        var total = Number(wine) * Number(hours);
        if((gender === 'm' || gender === 'M') && (beer !== '' && liqueur !== '' && wine !== '')) {
            gender = .68;
            var answer = ((parseInt(liqueurGrams)+parseInt(beerGrams)+parseInt(wineGrams))/(Number(weightGrams)*Number(gender))*100)- (Number(hoursTimes));
            return document.getElementById('bacAnswer').innerHTML = parseFloat(answer).toFixed(2);
        }else if(gender === 'm' || gender === 'M' && liqueur !== ''){
            gender = Number(.68);
            var answer = ((Number(liqueurGrams))/(Number(weightGrams)*Number(gender))*100)- (Number(hoursTimes));
            return document.getElementById('bacAnswer').innerHTML = parseFloat(answer).toFixed(2);
        }else if(gender === 'm' || gender === 'M' && beer !== ''){
            gender = Number(.68);
            var answer = ((Number(beerGrams))/(Number(weightGrams)*Number(gender))*100)- (Number(hoursTimes));
            return document.getElementById('bacAnswer').innerHTML = parseFloat(answer).toFixed(2);
        }else if(gender === 'm' || gender === 'M' && wine !== ''){
            gender = .68;
            var answer = ((Number(wineGrams))/(Number(weightGrams)*Number(gender))*100)- (Number(hoursTimes));
            return document.getElementById('bacAnswer').innerHTML = parseFloat(answer).toFixed(2);
        }else if((gender === 'f' || gender === 'F') && (beer !== '' && liqueur !== '')){
            gender = .55;
            var answer = ((parseInt(liqueurGrams)+parseInt(beerGrams))/(Number(weightGrams)*Number(gender))*100)- (Number(hoursTimes));
            return document.getElementById('bacAnswer').innerHTML = parseFloat(answer).toFixed(2);
        }else if(gender === 'f' || gender === "F"){
            gender = Number(.55);
            return alert(gender);
        }else{
            return alert('Please input m or f.');
        }
        //document.getElementById('bacAnswer').innerHTML = total;
        console.log("Weight: "+weightGrams+" Gender: "+gender+" Liqueur: "+liqueurGrams+" Beer: "+beerGrams+" Wine: "+wineGrams+" Hours: "+hoursTimes);
        if(gender === 'm' || gender === 'M' && liqueur !== ''){
            gender += .68;
            var answer = (Number(liqueur)*14)/(Number(weightGrams)*Number(gender))*100;
            return document.getElementById('bacAnswer').innerHTML = answer

        }else{
            gender = .55;
            return gender
        }

    }
    //(Alcohol in grams / (weight in grams * M/F))*100--- M = .68, F = .55.
</script>
</body>
</html>