$(document).ready(function() {
    $.ajax({
        url: "http://localhost/rest/novosti"
    }).then(function(data) {
       $('.id').append(data.id);
       $('.naslov').append(data.naslov);
       $('.tekst').append(data.tekst);
       $('.datumvreme').append(data.datumvreme);
       $('.kategorija_id').append(data.kategorija_id);
       $('.kategorija').append(data.kategorija);
       
    });
});