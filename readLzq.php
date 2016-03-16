<?php
	$handle = fopen('lzq.txt', 'r') or die('fopen failed');
	$result = fgets($handle);
	if ($result === FALSE) {
		echo "Cannot read lzq.txt";
		exit;
	}
	fclose($handle);
	echo $result;
?>
