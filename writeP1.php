<?php
	$handle = fopen('p1.txt', 'w+') or die('fopen failed');
	if (fwrite($handle, $_GET['content']) === FALSE) {
		echo "Cannot write to p1.txt";
		exit;
	}
	fclose($handle);
?>
