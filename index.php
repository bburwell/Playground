<!doctype html>
<html>
<head>
	<title>Ben Burwell’s Playground</title>
	<style type="text/css">
		html {
			background-color: #eee;
			color: #333;
			font-family: 'Helvetica Neue', 'Helvetica', sans-serif;
			text-align: center;
			font-weight: 200;
		}

		ul {
			list-style-type: none;
		}

		a {
			color: #900;
			text-decoration: none;
		}

		a:hover {
			background-color: #fff;
		}

		body {
			padding: 100px;
		}

		li {
			font-size: 18px;
		}
	</style>
</head>
<body>
	<h1>Ben’s Playground</h1>
	<p>Links to projects are below, or you can <a href="https://github.com/bburwell/Playground/">browse the source code on GitHub</a>.</p>
	
	<ul>
	
	<?php

	// files to not print
	$ignore_files = array('.', '..');

	// get directory contents
	$files = scandir(getcwd());

	// loop in all files
	foreach ($files as $file) {

		// print directories not to be ignored
		if (is_dir($file) && !in_array($file, $ignore_files)) {
			echo '<li>';
			echo '<a href="/'.$file.'/">'.$file.'</a>';
			echo '</li>';
		}

	}

	?>

	</ul>

	<a href="https://github.com/bburwell"><img style="position: absolute; top: 0; left: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_left_red_aa0000.png" alt="Fork me on GitHub"></a>
</body>
</html>
