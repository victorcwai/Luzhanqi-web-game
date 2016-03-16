<?php
	$handle = fopen('save.txt', 'r') or die('fopen failed');
	$result = fgets($handle);
	if ($result === FALSE) {
		echo "Cannot read save.txt";
		exit;
	}
	fclose($handle);
	echo $result;
?>
