<!DOCTYPE html>
<html lang="en" dir="ltr">
	<body>
	
		<div id="nowPlaying">
			<!-- List of the last songs played -->
		</div>

		<script src="js/jquery.min3952.js"></script>
		
		<!-- Update of the last songs played -->
		<script type="text/javascript">
			function updateNowPlaying(){
				$.ajax({ url: "song-history-timeline.php", cache: false, success: function(html){ $("#nowPlaying").html(html); } });
			};
			updateNowPlaying();
			setInterval( "updateNowPlaying()", 10000 ); // refreshed every 10 sec
		</script>
		
	</body>
</html>