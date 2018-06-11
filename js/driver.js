var app = new Vue({
	el : '#wrapper',
	data : {
		form : {
			username : '',
			password : ''
		},
		location : {
			lat : 0,
			lng : 0,
			detected : false,
			timestamp : 0,
			watch : null,
			name : ''
		},
		status : false,
		requests : []
	},
	methods : {
		init : function(){
			this.detectLocation();
		},
		getLocation : function(position){
			this.location.lat = position.coords.latitude;
			this.location.lng = position.coords.longitude;
			this.location.timestamp = position.timestamp;
			this.location.detected = true;

			$.get('https://maps.googleapis.com/maps/api/geocode/json?latlng=' + this.location.lat + ',' + this.location.lng + '&sensor=true', function(data){
				//console.log(data.results[0].formatted_address);
				app.location.name = data.results[0].formatted_address;
			});

			this.$forceUpdate();
		},
		onLocationError : function(){
			alert('Error on detecting location!');
		},
		detectLocation : function(){
			var options = {
				enableHighAccuracy: true,
				timeout: 1000,
				maximumAge: 0,
				desiredAccuracy: 0, 
				frequency: 1 
			};

            app.location.watch = navigator.geolocation.watchPosition(app.getLocation, app.onError, options);
		}
	}
});

$(document).ready(function(){
	app.init();
});