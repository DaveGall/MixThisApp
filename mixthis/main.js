/**
 * Created by davegall on 9/23/15.
 */

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
