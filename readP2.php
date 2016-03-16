<?php
	$handle = fopen('p2.txt', 'r') or die('fopen failed');
	$result = fgets($handle);
	if ($result === FALSE) {
		echo "Cannot read p2.txt";
		exit;
	}
	fclose($handle);
	echo $result;
?>
