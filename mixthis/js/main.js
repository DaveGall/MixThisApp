/**
 * Created by davegall on 9/3/15.
 */

$.getJSON('data.json', function(data){
    var output = '<ul class="searchResults">';
    $.each(data, function(key, val){
        output += '<li>';
        output += '<h3>'+val.drink+'</h3>';
        output += '</li>';
    });
    output += '</ul>';
    $('#placeholder').html(output);
});//gets the JSON from the file
