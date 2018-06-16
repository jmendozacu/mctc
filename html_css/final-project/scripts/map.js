function initialize() {
	$('.slideout-menu-toggle').click(function(e) {
    e.preventDefault();
	});

	var mapCanvas = document.getElementById('map');
	var mapOptions = {
      center: new google.maps.LatLng(44.951541, -93.282774),
      zoom:  14,
      maxZoom: 17,
      minZoom: 13,
      scrollwheel: false,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
	  disableDefaultUI: true,
	  backgroundColor: "#CCC"
    }
    var map = new google.maps.Map(mapCanvas, mapOptions);
	
	google.maps.event.addDomListener(window, "resize", function() {
		var center = map.getCenter();
		google.maps.event.trigger(map, "resize");
		map.setCenter(center);
	});

	map.set('styles', [
  {
    featureType: 'road',
    elementType: 'geometry',
    stylers: [
      { color: '#CCCCCC' },
      { weight: .5 }
    ]
  }, {
    featureType: 'road',
    elementType: 'labels',
    stylers: [
      { visibility: 'off' },
    ]
  }, {
  	featureType: 'road.arterial',
    elementType: 'labels',
    stylers: [
      { visibility: 'off' },
    ]
  }, {
  	featureType: 'road.local',
    elementType: 'labels',
    stylers: [
      { visibility: 'on' },
    ]
  }, {
    featureType: 'water',
    elementType: 'geometry',
    stylers: [
          { hue: '#87CEFA'},
        ]  	
  }, {
  	featureType: 'landscape.man_made',
    elementType: 'geometry',
    stylers: [
          { hue: '#FFFFFF'},
        ]  	
  }, {
    featureType: 'landscape',
    elementType: 'geometry',
    stylers: [
      { hue: '#FFFFE0' },
    ]
  }
]);
}
google.maps.event.addDomListener(window, 'load', initialize);