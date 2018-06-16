jQuery(document).ready(function () {

    jQuery("#modal-1").on("change", function () {
        if (jQuery(this).is(":checked")) {
            jQuery("body").addClass("modal-open");
        } else {
            jQuery("body").removeClass("modal-open");
        }
    });

    jQuery(window).scroll(function(){
        var scrolling = jQuery(window).scrollTop();

        var logo = jQuery('#boundlessIcon');
        if( scrolling > 15 ){
            logo.addClass('scroll');
        }
        else{
            logo.removeClass('scroll');
        }
    });

jQuery(".header-logo a").click(function(event){
    event.preventDefault(); // prevents link to be redirected
    var time = 300; // time for slideup effect
    var url = jQuery(this).attr("href"); // pick url for redirecting via javascript

    jQuery('#boundlessIcon').addClass('spin');
    window.setTimeout(function () {
        document.location.href = url;
    }, time); // timeout and waiting until effect is complete
    return -1;
    jQuery();
});
    jQuery(".modal-fade-screen, .modal-close").on("click", function () {
        jQuery(".modal-state:checked").prop("checked", false).change();
    });

    jQuery(".modal-inner").on("click", function (e) {
        e.stopPropagation();
    });

    var navigation = document.getElementById("myNav");
    jQuery("#toggle").on('click', function () {
        if (!jQuery(navigation).hasClass("open")) {
            jQuery('#svg-rotate').css({'transform': 'rotate(225deg)', 'transform-origin': '50% 50%'});
            jQuery(navigation).css({width: '100%'}).addClass('open');
            jQuery(".overlay-content, .overlay-content ul").show();
            jQuery(".overlay-content .page_item").fadeIn();
        } else {
            jQuery('#svg-rotate').css({'transform': 'rotate(-180deg)', 'transform-origin': '50% 50%'});
            jQuery(navigation).css({width: '0%'}).removeClass('open');
        }
    });
    jQuery(document).on("keydown", function (e) {
        if (jQuery(navigation).hasClass('open') && e.keyCode == 27) {
            jQuery('#svg-rotate').css({'transform': '', 'transform-origin': ''});
            jQuery(navigation).css({width: '0%'}).removeClass('open');
        }
    });
    jQuery(".filter-button").click(function () {
        var clickID = jQuery(this).attr('id');
        var major = jQuery('#' + clickID).attr('data-filter');
        jQuery('.image-container').fadeOut('slow', function () {
            jQuery('.image-container' + major).fadeIn('slow')
        });
    });

});

jQuery(window).load(function () {
    if (jQuery(window).width() >= 480) {
        jQuery(updateBoxDimension);
    }
    jQuery(window).on('resize', function () {
        if (jQuery(window).width() >= 480) {
            updateBoxDimension();
        }
    });
    initMap();

    function updateBoxDimension() {
        var offsetLeft1 = jQuery("#first").offset();
        jQuery("#second").css({
            marginLeft: offsetLeft1.left - 145
        });

        var offsetLeft1 = jQuery("#second").offset();
        jQuery("#third").css({
            marginLeft: offsetLeft1.left - 135
        });
    }


});
// jQuery(".container .line").each(function() {
//     var i = 1;
//     var margin = 2% + (i * 1.7);
//     jQuery(this).css("margin-left", margin);
// });
function initMap() {
    // Styles for map
    var mapStyles = [
        {"featureType": "all", "elementType": "labels.text", "stylers": [{"lightness": "56"}]}, {
            "featureType": "all",
            "elementType": "labels.text.stroke",
            "stylers": [{"visibility": "off"}]
        }, {
            "featureType": "administrative",
            "elementType": "all",
            "stylers": [{"visibility": "off"}]
        }, {
            "featureType": "landscape",
            "elementType": "geometry.fill",
            "stylers": [{"visibility": "on"}, {"saturation": "-36"}, {"lightness": "20"}]
        }, {
            "featureType": "landscape",
            "elementType": "geometry.stroke",
            "stylers": [{"saturation": "-5"}]
        }, {
            "featureType": "landscape.man_made",
            "elementType": "all",
            "stylers": [{"visibility": "simplified"}]
        }, {
            "featureType": "landscape.man_made",
            "elementType": "geometry",
            "stylers": [{"visibility": "on"}, {"saturation": "-7"}, {"lightness": "7"}]
        }, {
            "featureType": "landscape.man_made",
            "elementType": "geometry.fill",
            "stylers": [{"saturation": "42"}, {"lightness": "-15"}, {"weight": "4.57"}, {"gamma": "3.50"}, {"hue": "#004cff"}, {"visibility": "on"}]
        }, {
            "featureType": "landscape.man_made",
            "elementType": "geometry.stroke",
            "stylers": [{"visibility": "on"}, {"saturation": "32"}, {"hue": "#d900ff"}, {"lightness": "-26"}, {"weight": "0.59"}, {"gamma": "1.55"}]
        }, {
            "featureType": "landscape.man_made",
            "elementType": "labels.text",
            "stylers": [{"visibility": "off"}]
        }, {"featureType": "poi", "elementType": "all", "stylers": [{"visibility": "off"}]}, {
            "featureType": "poi.park",
            "elementType": "geometry.fill",
            "stylers": [{"visibility": "on"}, {"saturation": "3"}, {"color": "#9bce21"}, {"lightness": "68"}]
        }, {
            "featureType": "road",
            "elementType": "geometry.stroke",
            "stylers": [{"visibility": "off"}]
        }, {
            "featureType": "road",
            "elementType": "labels.text.stroke",
            "stylers": [{"visibility": "off"}]
        }, {
            "featureType": "road.highway",
            "elementType": "geometry.fill",
            "stylers": [{"lightness": "33"}]
        }, {
            "featureType": "road.highway",
            "elementType": "labels.text",
            "stylers": [{"visibility": "off"}]
        }, {
            "featureType": "road.highway",
            "elementType": "labels.icon",
            "stylers": [{"visibility": "simplified"}]
        }, {
            "featureType": "road.highway.controlled_access",
            "elementType": "geometry.fill",
            "stylers": [{"lightness": "-11"}]
        }, {
            "featureType": "road.highway.controlled_access",
            "elementType": "labels.text",
            "stylers": [{"visibility": "off"}]
        }, {
            "featureType": "road.highway.controlled_access",
            "elementType": "labels.text.fill",
            "stylers": [{"visibility": "off"}]
        }, {
            "featureType": "road.highway.controlled_access",
            "elementType": "labels.text.stroke",
            "stylers": [{"visibility": "off"}]
        }, {
            "featureType": "road.highway.controlled_access",
            "elementType": "labels.icon",
            "stylers": [{"saturation": "-100"}, {"lightness": "20"}]
        }, {
            "featureType": "road.arterial",
            "elementType": "geometry.fill",
            "stylers": [{"lightness": "-9"}, {"gamma": "5.90"}, {"saturation": "41"}]
        }, {
            "featureType": "road.arterial",
            "elementType": "labels.icon",
            "stylers": [{"visibility": "off"}]
        }, {
            "featureType": "road.local",
            "elementType": "geometry.fill",
            "stylers": [{"color": "#fffef2"}, {"saturation": "22"}]
        }, {
            "featureType": "road.local",
            "elementType": "labels.icon",
            "stylers": [{"visibility": "off"}]
        }, {
            "featureType": "transit",
            "elementType": "all",
            "stylers": [{"visibility": "off"}]
        }, {"featureType": "water", "elementType": "geometry.fill", "stylers": [{"color": "#b8e2ff"}]}
    ]
    var isDraggable = jQuery(document).width() > 480 ? true : false; // If document (your website) is wider than 480px, isDraggable = true, else isDraggable = false
    var map = new google.maps.Map(document.getElementById('map'), {
        center: new google.maps.LatLng(44.9728621, -93.2864276),
        zoom: 17,
        styles: mapStyles,
        draggable: isDraggable,
        scrollwheel: false // Prevent users to start zooming the map when scrolling down the page
    });

    // Add a marker
    var marker = new google.maps.Marker({
        map: map,
        position: new google.maps.LatLng(44.9728602, -93.2838634)
    });

    // // Add a Snazzy Info Window to the marker
    // var info = new SnazzyInfoWindow({
    //     marker: marker,
    //     content: '<h1>Styling with SCSS</h1>' +
    //     '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce id urna eu sem fringilla ultrices.</p>' +
    //     '<hr>' +
    //     '<em>Snazzy Info Window</em>',
    //     closeOnMapClick: false
    // });
    // info.open();
}