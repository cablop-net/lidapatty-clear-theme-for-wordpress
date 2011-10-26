var contactMap = {
	markers: [],
	viewObjects: [],
	map: null,
	mapDiv: null,
	infoWindow: null,
	init: function()
	{
		var $ = jQuery;

		if($('#map-canvas').length<1) return false;
		
		var lat = parseFloat($('#invent-marker-0-lat').val());
		var lng = parseFloat($('#invent-marker-0-lng').val());
		if(isNaN(lng) || isNaN(lat) || lng>180 || lng<-180 || lat>85 || lat<-85)
			{
				$('#invent-marker-0-lat').val('');
				$('#invent-marker-0-lng').val('');
				var myLatLng = new google.maps.LatLng(34, -118);
			}
		else
			var myLatLng = new google.maps.LatLng(lat, lng,false);

		var mapOptions = {
			center: myLatLng,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			navigationControl: true
		};

		contactMap.mapDiv = document.getElementById('map-canvas');
		contactMap.map = new google.maps.Map(contactMap.mapDiv, mapOptions);

		if(!$('#invent-map-zoom').val()) $('#invent-map-zoom').val(3);
		contactMap.map.setZoom(parseInt($('#invent-map-zoom').val()));


		google.maps.event.addListener(contactMap.map, "rightclick", function(event)
		{
			$('#map-no-markers').hide();
			$('#map-markers').show();
			$('#invent-marker-0-lng').val(event.latLng.lng());
			$('#invent-marker-0-lat').val(event.latLng.lat());
			contactMap.refreshMap();
		});

		google.maps.event.addListener(contactMap.map, "zoom_changed", function(event){
			
			$('#invent-map-zoom').val(contactMap.map.getZoom());
		});

		$('#invent-marker-0-lng,#invent-marker-0-lat,#invent-marker-0-title,#invent-marker-0-description').change(function(){
			contactMap.refreshMap();
		})

		if($('#invent-marker-0-lat').val()) {
				$('#map-no-markers').hide();
				$('#map-markers').show();
				contactMap.refreshMap();
		}
	},

	clearMarkers: function() {
	  if (contactMap.markers.length) {
			for (i in contactMap.markers) {
				contactMap.markers[i].setMap(null);
			}
			contactMap.markers = [];
		}
	},

	refreshMap : function(){
		contactMap.clearMarkers();

		var $ = jQuery;
		var myLatLng =  new google.maps.LatLng($('#invent-marker-0-lat').val(), $('#invent-marker-0-lng').val());
		var marker = new google.maps.Marker({
			position: myLatLng,
			map: contactMap.map,
			title: $('#invent-marker-0-title').val(),
			icon: THEME_DIR + 'images/markers/blue.png'
		});
		contactMap.markers.push(marker);
		
		contactMap.infoWindow = new google.maps.InfoWindow({
			content: '<h3>'+$('#invent-marker-0-title').val()+'</h3><p>'+$('#invent-marker-0-description').val().replace(/(\n)/g, "<br />")+'</p>'
		});

		contactMap.infoWindow.open(contactMap.map, marker);
		google.maps.event.addListener(marker, "click", function(event) {
			contactMap.infoWindow.open(contactMap.map, marker);
		});

	}
};