function useSearchTable(use, fsearch) {
    //clearTimeout($.data(this, 'timer'));
    if (!use) {
        $(".tablesearch").fadeOut(300);
        $(".populated").fadeIn(300);
    } else {
        $(".tablesearch").fadeIn(300);
        $(".populated").fadeOut(300);
        //$(this).data('timer', setTimeout(fsearch, 100));
    };
}
