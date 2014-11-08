(function(w, doc) {

	w.thoughtspot = {
		'h':	doc.getElementsByTagName('html'),
		'b':	doc.getElementsByTagName('body'),

		/* initialize */
		'init': function() {
      google.maps.event.addDomListener(window, 'load', initialize);
		},

    'initializePlaces': function() {
      var mapOptions = {
        center: new google.maps.LatLng(-33.8688, 151.2195),
        zoom: 13
      };

      var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

      var input = (document.getElementById('placesSearch'));

      var types = document.getElementById('type-selector');
      map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
      map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

      var autocomplete = new google.maps.places.Autocomplete(input);
      autocomplete.bindTo('bounds', map);

      var infowindow = new google.maps.InfoWindow();
      var marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
      });

      console.log(autocomplete);

      if(autocomplete){
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
          console.log('a');
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          /*
          marker.setIcon(({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
          }));
          */
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          var address = '';
          var website = place.website;
          var phone = place.formatted_phone_number;
          var price_level = place.prive_level;
          var hours = '';

          console.log(place);

          if (place.opening_hours) {
            if (place.opening_hours.weekday_text) {
              hours = [
                (place.opening_hours.weekday_text[0] + '<br>' || ''),
                (place.opening_hours.weekday_text[1] + '<br>' || ''),
                (place.opening_hours.weekday_text[2] + '<br>' || ''),
                (place.opening_hours.weekday_text[3] + '<br>' || ''),
                (place.opening_hours.weekday_text[4] + '<br>' || ''),
                (place.opening_hours.weekday_text[5] + '<br>' || ''),
                (place.opening_hours.weekday_text[6] + '<br>' || ''),
                (place.opening_hours.weekday_text[7] || '')
              ].join(' ');
            }
          }

          // place.types
          // place.reviews

          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address + '<br>' + phone + '<br>' + website + '<br><br>' + hours);
          infowindow.open(map, marker);
        });
      },

      'setupClickListener': function(id, types) {
        var radioButton = document.getElementById(id);
        google.maps.event.addDomListener(radioButton, 'click', function() {
          autocomplete.setTypes(types);
        });
      }

      //setupClickListener('changetype-all', []);
      //setupClickListener('changetype-address', ['address']);
      //setupClickListener('changetype-establishment', ['establishment']);
      //setupClickListener('changetype-geocode', ['geocode']);
    }
	};

	w.thoughtspot.init();

})(this, this.document);