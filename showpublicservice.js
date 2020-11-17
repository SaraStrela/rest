$(document).ready(function() {
    $.ajax({
        url: "http://www.boredapi.com/api/activity/"
    }).then(function(data) {
       $('.activity').append(data.activity);
       $('.accessibility').append(data.accessibility);
       $('.type').append(data.type);
       $('.participants').append(data.participants);
       $('.price').append(data.price);
       $('.link').append(data.link);
       $('.key').append(data.key);
    });
});