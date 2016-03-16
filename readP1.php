<?php
	$handle = fopen('p1.txt', 'r') or die('fopen failed');
	$result = fgets($handle);
	if ($result === FALSE) {
		echo "Cannot read p1.txt";
		exit;
	}
	fclose($handle);
	echo $result;
?>
