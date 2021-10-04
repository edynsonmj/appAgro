<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
	<link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />
	<link rel="stylesheet" href="main.css">
</head>

<body>
	<div id="map">
		<script src="<?php echo base_url(); ?>/js/main.js"></script>
		<script>
			const marker = new mapboxgl.Marker()
				.setLngLat([-76.610102, 2.439890])
				.addTo(map);
			const marker2 = new mapboxgl.Marker()
				.setLngLat([-70.610105, 2.439895])
				.addTo(map);
			const lngLat = marker.getLngLat();
			// Print the marker's longitude and latitude values in the console
			console.log(`Longitude: ${lngLat.lng}, Latitude: ${lngLat.lat}`);
		</script>
	</div>
</body>
<!--
<body>
	<div id="map">
	<script src="<?php echo base_url(); ?>/js/main.js"></script>
	</div>
</body>-->

</html>