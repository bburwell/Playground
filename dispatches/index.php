<!doctype html>
<html>
	<head>
		<title>Recorded Dispatches</title>
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<script>
			$(document).ready(function() {
				$('.ctl').each(function (index) {
					$(this).text('play');
					var id = $(this).attr('id').split(':')[1];
					$(this).click(function() {
						var a = document.getElementById('a:'+id);
						var c = document.getElementById('c:'+id);
						if (a.paused) {
							a.currentTime = 0;
							a.play();
							c.innerHTML = 'stop';
						} else {
							a.pause();
							c.innerHTML = 'play';
						}
					});
				});
			});
		</script>
		<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.9.0/build/reset/reset-min.css">
		<style type="text/css">
			body {
				font-family: "Helvetica Neue", "Helvetica", sans-serif;
				font-size: 16px;
				padding: 30px;
			}

			h1 {
				font-size: 30px;
				font-weight: bold;
				margin-bottom: 10px;
			}

			.time {
				color: #666;
				font-size: 14px;
			}

			.station {
				font-weight: bold;
			}

			li {
				padding: 7px;
				border: 1px solid rgba(0,0,0,0);
			}

			li:hover {
				background-color: #ffffe0;
				border: 1px solid #aaa;
			}

			li a {
				text-transform: uppercase;
				font-size: 12px;
				text-decoration: none;
				color: #900;
				background-color: #eee;
				border: 1px solid #999;
				border-radius: 4px;
				padding: 4px;
				margin-right: 5px;
			}

			li a:hover {
				color: #eee;
				background-color: #900;
				border-color: #333;
			}
		</style>
	</head>
	<body>
		
		<h1>Recorded Dispatches</h1>

		<ul>
			<?php

				$station_codes = array(
					'151-DutyCrew' => 'Pennington First Aid Squad',
					'MCEMS-A' => 'Muhlenberg College EMS',
					'MCEMS-B' => 'Muhlenberg College EMS');

				// get all files
				$files = array();
				$files = @scandir('../../com.benburwell.stat/dispatches/audio/');

				// exclude these files
				$exclude = array('.', '..', 'index.html');

				// iterate through files
				foreach ($files as $file) {

					// ensure we don't need to exclude it
					if (!in_array($file, $exclude)) {

						// print item

						$parts = explode('_', $file);

						$station = $station_codes[$parts[0]];

						// only proceed if there is a station to display
						if ($station != '') {
							$date = substr($parts[1], 0, 10);
							$time = substr($parts[1], 10) . ':' . $parts[2];

							$datetime = strtotime($date);
							// $pretty_time = date('l, j F Y') . ' at ' . $time;
							$pretty_time = date('l, j F Y');

							echo '<li>'
								. '<a href="#" onclick="return false;" class="ctl" id="c:'.$file.'"></a> '
								. '<span class="station">'.$station.'</span> '
								. '<span class="time">'.$pretty_time.'</span> '
								. '<audio src="http://stat.benburwell.com/dispatches/audio/'.$file.'" preload="auto" id="a:'.$file.'"></audio>'
								. '</li>';
						}
					}
				}

			?>
		</ul>

	</body>
</html>