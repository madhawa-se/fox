$(document).ready(function(){
    $(".second_tab").champ({
        plugin_type :  "tab",
        side : "right",
        active_tab : "1",
        controllers : "false"
    });				
});

$(document).ready(function(){
    
    if ($(window).width() < 767) {
        
        $('.carousel').carousel({
            pause: true,
            interval: false
        });
        
    }

});

$(document).ready(function() {
    var stickyNavTop = $('#top-nav, #mobile-header').offset().top;
     
    var stickyNav = function(){
    var scrollTop = $(window).scrollTop();
          
    if (scrollTop > stickyNavTop) { 
        $('#top-nav, #mobile-header').addClass('sticky');
    } else {
        $('#top-nav, #mobile-header').removeClass('sticky'); 
    }
    };
     
    stickyNav();
     
    $(window).scroll(function() {
        stickyNav();
    });
});
