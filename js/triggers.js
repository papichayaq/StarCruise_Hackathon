$(function() {
    $(".tablesearch").hide();
    function search() {
        $.ajax({
            type: "POST",
            url: "restaurants-search.php",
            data: {
                query: $('input#searchbox').val(),
                filter1: $('#filter1').serialize(),
                filter2: $('#filter2').serialize()
            },
            cache: false,
            success: function(html) {
                $(".tablesearch").html(html);
            }
        });
    }

    $('#filter1').on('change', function() {
        search();
        useSearchTable(true, search);
    });

    $('#filter2').on('change', function() {
        search();
        useSearchTable(true, search);
    });

    $('body').on('keyup', 'input#searchbox', function(e) {
        search();
        useSearchTable(true, search);
    });

});
