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

/*

    Google Maps 

*/
    google.maps.event.addDomListener(window, 'load', init);
    var map;
    function init() {
        var mapOptions = {
            center: new google.maps.LatLng(53.4790629,-2.248984),
            zoom: 17,
            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.DEFAULT,
            },
            disableDoubleClickZoom: true,
            mapTypeControl: true,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
            },
            scaleControl: true,
            scrollwheel: false,
            panControl: true,
            streetViewControl: true,
            draggable : true,
            overviewMapControl: true,
            overviewMapControlOptions: {
                opened: false,
            },
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: [
    {
      featureType: "landscape",
      stylers: [
        { saturation: -100 },
        { lightness: 65 },
        { visibility: "on" }
      ]
    },{
      featureType: "poi",
      stylers: [
        { saturation: -100 },
        { lightness: 51 },
        { visibility: "simplified" }
      ]
    },{
      featureType: "road.highway",
      stylers: [
        { saturation: -100 },
        { visibility: "simplified" }
      ]
    },{
      featureType: "road.arterial",
      stylers: [
        { saturation: -100 },
        { lightness: 30 },
        { visibility: "on" }
      ]
    },{
      featureType: "road.local",
      stylers: [
        { saturation: -100 },
        { lightness: 40 },
        { visibility: "on" }
      ]
    },{
      featureType: "transit",
      stylers: [
        { saturation: -100 },
        { visibility: "simplified" }
      ]
    },{
      featureType: "administrative.province",
      stylers: [
        { visibility: "off" }
      ]
  /** /
    },{
      featureType: "administrative.locality",
      stylers: [
        { visibility: "off" }
      ]
    },{
      featureType: "administrative.neighborhood",
      stylers: [
        { visibility: "on" }
      ]
  /**/
    },{
      featureType: "water",
      elementType: "labels",
      stylers: [
        { visibility: "on" },
        { lightness: -25 },
        { saturation: -100 }
      ]
    },{
      featureType: "water",
      elementType: "geometry",
      stylers: [
        { hue: "#ffff00" },
        { lightness: -25 },
        { saturation: -97 }
      ]
    }
  ],
        } 
        var mapElement = document.getElementById('google-map');
        var map = new google.maps.Map(mapElement, mapOptions);
        var locations = [
['Example Company', 'undefined', 'undefined', 'info@example.dev', 'http://example.dev', 53.4792321, -2.248807, 'http://starter.dev/wp-content/themes/starter/assets/img/google-map-marker.png']
        ];
        for (i = 0; i < locations.length; i++) {
            if (locations[i][1] =='undefined'){ description ='';} else { description = locations[i][1];}
            if (locations[i][2] =='undefined'){ telephone ='';} else { telephone = locations[i][2];}
            if (locations[i][3] =='undefined'){ email ='';} else { email = locations[i][3];}
           if (locations[i][4] =='undefined'){ web ='';} else { web = locations[i][4];}
           if (locations[i][7] =='undefined'){ markericon ='';} else { markericon = locations[i][7];}
            marker = new google.maps.Marker({
                icon: markericon,
                position: new google.maps.LatLng(locations[i][5], locations[i][6]),
                map: map,
                title: locations[i][0],
                desc: description,
                tel: telephone,
                email: email,
                web: web
            });
link = '';            bindInfoWindow(marker, map, locations[i][0], description, telephone, email, web, link);
     }
 function bindInfoWindow(marker, map, title, desc, telephone, email, web, link) {
      var infoWindowVisible = (function () {
              var currentlyVisible = false;
              return function (visible) {
                  if (visible !== undefined) {
                      currentlyVisible = visible;
                  }
                  return currentlyVisible;
               };
           }());
           iw = new google.maps.InfoWindow();
           google.maps.event.addListener(marker, 'click', function() {
               if (infoWindowVisible()) {
                   iw.close();
                   infoWindowVisible(false);
               } else {
                   var html= "<div style='color:#000;background-color:#fff;padding:5px;width:150px;'><h4>"+title+"</h4></div>";
                   iw = new google.maps.InfoWindow({content:html});
                   iw.open(map,marker);
                   infoWindowVisible(true);
               }
        });
        google.maps.event.addListener(iw, 'closeclick', function () {
            infoWindowVisible(false);
        });
 }
}

});


