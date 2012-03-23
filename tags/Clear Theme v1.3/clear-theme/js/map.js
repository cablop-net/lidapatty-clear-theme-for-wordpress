jQuery(function (){
	var inventContactMap = {
		marker: null,
		infoWindow: null,
		map: null,

		init: function(){
			if(document.getElementById('map-canvas') == null)
				return false;
			
			if(inventMap.marker.lat == 0 || inventMap.marker.lng == 0)
				return false;
			
			var myLatLng = new google.maps.LatLng(inventMap.marker.lat, inventMap.marker.lng);

			var mapOptions = {
				center: myLatLng,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				navigationControl: true
			};

			inventContactMap.map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
			inventContactMap.map.setZoom(inventMap.zoom);
			inventContactMap.marker = new google.maps.Marker({
				position: myLatLng,
				map: inventContactMap.map,
				title: inventMap.marker.title,
				icon: THEME_DIR + 'images/markers/blue.png'
			});

			inventContactMap.infoWindow = new google.maps.InfoWindow({
				content:  '<h3>'+inventMap.marker.title+'</h3><p>'+inventMap.marker.description.replace(/(\n)/g, "<br />")+'</p>'
			});

//			inventContactMap.infoWindow.open(inventContactMap.map, inventContactMap.marker);
			google.maps.event.addListener(inventContactMap.marker, "click", function(event) {
				inventContactMap.infoWindow.open(inventContactMap.map, inventContactMap.marker);
			});

			google.maps.event.addListener(inventContactMap.map, "click", function(event) {
				inventContactMap.infoWindow.close();
			});

			return true;
		}
	};

	inventContactMap.init();
	
});