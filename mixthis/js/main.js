
/*$.getJSON("data.json", function(json) {
    console.log(json); // this will show the info it in firebug console
});

$.each('data.json', function(item) {
    if (item.drink == item) {
        // found it...
        console.log(item[0]);
        return false; // stops the loop
    }
});
*/

function ingredientsFunction(){
    window.open('details.html');
    var x = document.getElementById('ingredients').value;
    document.getElementById('drinkTitle').innerHTML = x;
    console.log("Inside Function: "+ x);

}
function calculate(){
    var weight = document.getElementById('weight').value;
    var gender = document.getElementById('gender').value;
    var liqueur = document.getElementById('liqueur').value;
    var beer = document.getElementById('beer').value;
    var wine = document.getElementById('wine').value;
    var hours = document.getElementById('hours').value;
    var total = Number(wine) * Number(hours);
    document.getElementById('bacAnswer').innerHTML = total;
    console.log("Weight: "+weight+"Gender: "+gender+"Liqueur: "+liqueur+"Beer: "+beer+"Wine: "+wine+"Hours: "+hours);
}

