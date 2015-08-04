
<html>
	<head>
		<title>Ovvercast</title>
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	    <meta name="mobile-web-app-capable" content="yes">
	    <meta name="theme-color" content="#7FFFD4">
	    <link rel="icon" sizes="192x192" href="css/favicon.png">
		<link rel="stylesheet" type="text/css" href="css/ovvermaster.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<script src="http://isithackday.com/hacks/geo/yql-geo-library/yqlgeo.js"></script>
		<script>
		$(function(){
		initiate_geolocation();
		});

		function initiate_geolocation() {
		    if (navigator.geolocation)
		    {
		        navigator.geolocation.getCurrentPosition(handle_geolocation_query, handle_errors);
		    }
		    else
		    {
		        yqlgeo.get('visitor', normalize_yql_response);
		    }
		}
		function handle_errors(error)
		{
		    switch(error.code)
		    {
		        case error.PERMISSION_DENIED: alert("Application requires GPS access to run.");
		        break;

		        case error.POSITION_UNAVAILABLE: alert("Unable to locate.");
		        break;

		        case error.TIMEOUT: alert("Request took too long to respond.");
		        break;

		        default: alert("Error 0: Unexpected error has occurred. If this occurs again please report a bug.");
		        break;
		    }
		}

		function normalize_yql_response(response)
		{
		    if (response.error)
		    {
		        var error = { code : 0 };
		        handle_error(error);
		        return;
		    }

		    var position = {
		        coords :
		        {
		            latitude: response.place.centroid.latitude,
		            longitude: response.place.centroid.longitude
		        },
		        address :        
		        {
		            city: response.place.locality2.content,
		            region: response.place.admin1.content,
		            country: response.place.country.content
		        }
		    };

		    handle_geolocation_query(position);
		}

		function handle_geolocation_query(position)
		{
			var data = {};
			data['lat'] = position.coords.latitude;
			data['lon'] = position.coords.longitude;

		    $.ajax({
		        url: "forecast/call.php",
		        type: "post",
		        data: {lat: position.coords.latitude, lon: position.coords.longitude},
		        success: function(data){
		        	var data = data;
		        	$.ajax({
			            url: "php_last_fm_api/search/call.php",
			            type: "post",
			            data: {current: data},
			            success: function(data){
			            	$('.output').html(data);
			            }
			        });
		    	}
			});
		}
		</script>

	</head>
	<body>
		<div class="container">
			<header class="row">
		        <div class="col-lg-5 col-sm-12 col-xs-12 col-centred" id="logo">
		        	<img src="css/ovvercast.png" alt="Ovvercast">
		        </div>
	        </header>
	        <section class="row">
				<div class="output col-lg-12 col-sm-12 col-xs-12 col-centred">
					<img src="css/loading.gif" alt="Loading...">
				</div>	
			</section>
		</div>
	</body>		
</html>