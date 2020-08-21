$(function(){
    $('.scrollspy').scrollSpy();

        Materialize.updateTextFields();
    $('.datepicker').pickadate({
        selectMonths: true,
        selectYears: 150,
        format:'yyyy-mm-dd'
    });

    $('#gender.autocomplete').autocomplete({
        data: {
            "Male": null,
            "Female": null
        }
    });

    $('.select2-select').select2({
        allowClear: true,
        placeholder: 'Select An Option'
    });

    function removeSpaces(string){
        return string.split(' ').join('');
    }
/*
    window.addEventListener("beforeunload", function (e) {
        $.ajax({
            type: "POST",
            url: '/logout',
            async: false
        });

    });
*/

});


