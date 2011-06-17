<?php
	echo "<pre>";
	echo "fuck off","\n";
	include_once 'cHeader.php';
	$confname = '/home/joker/file/x.xml';
	$cs = new cHeader('default', $confname);
	$cs->test();
	echo"fuck","\n";
	//$cs->print_cPic();
?>