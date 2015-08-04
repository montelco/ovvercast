<?php
	use Forecast\Forecast;
	require('../Forecast/Forecast.php');
	require('../Forecast/crds.php');

	$lat = $_POST['lat'];
	$lon = $_POST['lon'];
	
	$forecastSession = new Forecast($api_key);

	$jsonFS = $forecastSession->get($lat, $lon);
	$currentPrecip = $jsonFS->currently->precipProbability;
	$currentTemp = $jsonFS->currently->apparentTemperature;
	$currentCloudCover = $jsonFS->currently->cloudCover;
	print_r($currentTemp  . "," . $currentCloudCover . "," . $currentPrecip);
?>