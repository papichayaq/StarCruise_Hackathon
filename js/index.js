$(function() {
    var modal = document.getElementById('recommend');
    $('#bottombar-wrapper').mousewheel(function(event, delta) {
        this.scrollLeft -= (delta * 80);
        this.scrollRight -= (delta * 80);
        event.preventDefault();
    });

    function bringback() {
        $('.random_eat_button').animate({
            opacity: 1
        });
    }

    $('.random_eat_button').click(function() {
        $(this).animate({
            opacity: 0
        });
        $.ajax({
            type: "POST",
            url: "recommend.php",
            cache: false,
            success: function(html) {
                $('#recommend').html(html);
                $('#recommend').modal('show');
                var span = document.getElementsByClassName("close")[0];

                span.onclick = function() {
                    $('#recommend').modal('hide');
                    bringback();
                }

                window.onclick = function(event) {
                    if (event.target == modal) {
                        $('#recommend').modal('hide');
                        bringback();
                    }
                }

                $('.modal').on('hidden.bs.modal', function() {
                    $(this).removeData('bs.modal');
                });
            }
        });
    });

    $('#bottombar-wrapper').niceScroll();

});
