$(document).ready(function () {
  $.each($('li'), function() {
      console.log(this);
    $(this).toggleClass('active',
        window.location.pathname.indexOf($(this).find('a').attr('href')) > -1);
    });
});
