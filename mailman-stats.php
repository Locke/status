<div class="top-container"></div>
<?php
	$content = file_get_contents('http://lists.piratenpartei-hessen.de/stats/stats.txt');
	$lines = explode("\n", $content);
	echo '<table><tr><th>Anzahl an Abonnenten</th><th>Liste</th></tr>';
	foreach ($lines as $line) {
		$parts = explode(" ", $line, 2);
		echo '<tr><td>' . $parts[0] . '</td><td>' . $parts[1] . '</td></tr>';
	}
	echo '</table>';
