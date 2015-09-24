
$.getJSON("data.json", function(json) {
    console.log(json); // this will show the info it in firebug console
});

$.each('data.json', function(item) {
    if (item.drink == item) {
        // found it...
        console.log(item[0]);
        return false; // stops the loop
    }
});

/*(function($) {
    function ingredientsFunction() {
        window.open('details.html');
        var x = document.getElementById('ingredients').value;
        document.getElementById('drinkTitle').innerHTML = x;
        console.log("Inside Function: " + x);

    }

});
*/