<?php
class tes{
	function __construct(){
		echo $i,"ok\n";
		$i ++;
	}
	public function go(){
		echo "say go \n";
	} 
	public static $i = 1 ;
}
function test(){
	echo "Good \n";
}
?>