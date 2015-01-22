$(document).ready(function() {

/*
    Header Height
    - measure header height on page load 
    - update if window changes size
*/
    var headerHeight;
    headerHeight = $('.page-header').height();

/*

    Reload page if window is resized


    var origWindowHeight = $(window).height();
    var origWindowWidth = $(window).width();
    $(window).resize(function() {
        
        // confirm window was actually resized (for IE's benefit)
        if($(window).height() != origWindowHeight || $(window).width() != origWindowWidth) {
            location.reload();
        }
        //headerHeight = $('.page-header').height();
        //fixed = false;
    });
*/


/*

    Fixed Header

*/
    var fixed;
    
    // function to make header position:fixed; after a certain height is scrolled:
    function fixedHeader(ev){
        scrolled = $(window).scrollTop();
        if(scrolled > 100 && !fixed){
            $('.page-header').fadeOut(300,function(){
                $('.header-spacer').css('height',headerHeight)
                $(this).css('position','fixed').fadeIn(300);
                $('.page-header__hamburger').css('background','rgba(0,0,0,0.3)');
            });
           fixed = true;
        }
    } // /fixedHeader

    $(window).scroll(fixedHeader); // repeatedly execute whenever page is scrolled

/*

    Mobile Nav show/hide animation

*/
    $('.page-header__nav--mobile, .page-header__hamburger .close').hide(); // hide if jquery works


    $('.page-header__hamburger').on('click', function(event) {
        $('.header-spacer').css('height',headerHeight).slideToggle();
        $('.page-header__nav--mobile').slideToggle(function(e){
            $('.page-header__hamburger .open, .page-header__hamburger .close').toggle();
        });
    });

/*

    Expanding Content Area (Home Page)

*/
    $('.expand + .hidden-content').hide(); // hide if jquery works

    $('.expand').on('click', function(event) {
        $(this).toggleClass('focus__expand--expanded');
        $(this).next('.hidden-content').slideToggle();
    });

/*

    Owl Carousel

*/
    $("#services-carousel, #blog-carousel, #testimonials-carousel").owlCarousel({ 
        navigation: true,
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        autoHeight: true
    });

});


