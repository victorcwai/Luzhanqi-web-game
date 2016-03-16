<?php
	$handle = fopen('save.txt', 'w+') or die('fopen failed');
	if (fwrite($handle, $_GET['content']) === FALSE) {
		echo "Cannot write to lzq.txt";
		exit;
	}
	fclose($handle);
?>
