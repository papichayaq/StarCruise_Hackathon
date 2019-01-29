
$(document).ready(function () {
  $('.container').addClass('container-loaded');
  $.each($('#diningmenus').find('li'), function() {
    $(this).toggleClass('active',
        window.location.pathname.indexOf($(this).find('a').attr('href')) > -1);
    });
});
