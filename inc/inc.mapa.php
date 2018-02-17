<section class="section section--no-padd">
	<div class="container">
		<h1>Como chegar</h1>
	</div>
</section>
<section id="map" class="map"></section>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAb-m_JxVK8GB0-6Ke-YG98nNK8_Wr1s3s"></script>
<script type="text/javascript">
	<?php if( have_rows('mapa') ): ?>
	var locations = [
						<?php while (have_rows('mapa')) : the_row(); $location = get_sub_field('marker'); ?>
							['<?php echo $location['lat']; ?>', '<?php echo $location['lng']; ?>', '<?php the_sub_field('marker') ?>'],
						<?php endwhile; ?>
					];
	<?php endif; ?>

	console.log(locations[0]);

	gmarkers = [];

	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 17,
		center: new google.maps.LatLng(-22.746859, -43.424399),
		scrollwheel: false,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	});

	var infowindow = new google.maps.InfoWindow();
	var img = "http://pibaa.com.br/wp-content/uploads/2017/06/iconemaps-01.png"
	function createMarker(latlng, html) {
		var marker = new google.maps.Marker({
			position: latlng,
			map: map,
			icon: img
		});

		google.maps.event.addListener(marker, 'click', function() {
			infowindow.setContent(html);
			infowindow.open(map, marker);
		});
		return marker;
	}

	var localName = locations[0][2];
	var localNameCropped = localName.split('-');
	gmarkers[locations[0][0]] = createMarker(new google.maps.LatLng(-22.746859, -43.424399), '<strong>' + localNameCropped[0] + '</strong><br>' + localNameCropped[1] + '<br>' + localNameCropped[2]);
</script>