$(document).ready(function () {
    $('#addProffesorsToCourse').submit(function (e) {
        var chekovi = $('.profNames');
        var result = [];
        for (var i = 0; i < chekovi.length; i++) {
            if ($(chekovi[i]).prop('checked')) {
                var currId = $(chekovi[i]).data('id');
                result.push(currId);
            }
        }
        var str=result.join();
        if(str.length<=0){
            e.preventDefault();
            return false;
        }
        $('#selected_professors').prop('value', result.join());
    });
});