var $jq = jQuery.noConflict();
$jq(window).scroll(function() {
    if($jq(this).scrollTop() >100)
        $jq("#btnTop").fadeIn();
    else
        $jq("#btnTop").fadeOut();
});
$jq("#btnTop").click(function() {
    $jq("html,body").animate({scrollTop: 0},600);
});