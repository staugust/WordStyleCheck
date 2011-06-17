<?php 
include_once("base.php");
class cPic extends Base{
	private $pjc;
	private $pSize;
	function __construct($cname){
		$this->confname = $cname;
		$this->content = file_get_contents($cname);
		//echo $this->content;
		$cxml = new DOMDocument();
		$cxml->loadXML($this->content);
		$picEle = $cxml->getElementsByTagName('pic')->item(0);
		$this->pjc = $picEle->getElementsByTagName('jc')->item(0)->getAttribute('val');
		$this->pSize = $picEle->getElementsByTagName('controlSize')->item(0)->getAttribute('val');
	}
	function __destruct(){
		echo 'cpic__destruct',"\n";
	}
	function getPjc(){
		return $this->pjc;
	}
	function getPSize(){
		return $this->pSize;
	}
	function print_cPic(){
		echo "pjc:",$this->pjc,"\n";
		echo "pSize:",$this->pSize,"\n";
	}
}
?>