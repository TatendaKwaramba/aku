$(function () {

    $.ajax({
        type: 'GET',
        url: 'scripts/clients/get_clients.php',
        dataType: 'json',
        success: function(data){
            console.log(data);
        },
        error:function(error){
            console.log(error);
        },
        async: true

    });


});