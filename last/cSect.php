<?php
include_once("base.php");
class cSect extends Base{
	private $totalChara;
	private $height;
	private $width;
	private $titleNum;
	//private $content;
	function __construct($cname){
		$this->confname = $cname;
		$this->content = file_get_contents($cname);
		//echo $this->content;
		$cxml = new DOMDocument();
		$cxml->loadXML($this->content);
		$sectEle = $cxml->getElementsByTagName('secPr')->item(0);
		$this->totalChara = $sectEle->getElementsByTagName('Characters')->item(0)->getAttribute('val');
		//echo $this->totalChara;
		$this->height = $sectEle->getElementsByTagName('pgSz')->item(0)->getAttribute('h');
		$this->width = $sectEle->getElementsByTagName('pgSz')->item(0)->getAttribute('w');
		$this->titleNum = $sectEle->getElementsByTagName('Title')->item(0)->getAttribute('val');
	}
	function __destruct(){
		echo "destruct","\n";
	}
	function print_cSect(){
		echo 'height',$this->height,"\n";
		echo 'width ',$this->width,"\n";
		echo 'totalNum',$this->totalChara,"\n";
		echo 'titleNum',$this->titleNum,"\n";
	}
	function getTotalChara(){
		return $this->totalChara;
	}
	function getTitleNum(){
		return $this->titleNum;
	}
	function getWidth(){
		return $this->width;
	}
	function getHeight(){
		return $this->height;
	}
}