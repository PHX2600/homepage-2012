$(document).ready(function() {
    
    checkWidth();
    
    $(window).resize(function(){
        checkWidth();
    });
    
});

function checkWidth() {
    if ($(window).width() < 768) {
        $('body').addClass('small-mode');
    } else {
        $('body').removeClass('small-mode');
    }
}
