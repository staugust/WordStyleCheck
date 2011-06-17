<?php
include_once("base.php");
class cPara extends Base{
	private $name;
	private $oll;
	private $pgBreak;
	private $pstyle;
	function __construct($oll,$cname){
		$this->oll = $oll;
		$content = file_get_contents($cname);
		$cxml = new DOMDocument();
		$cxml->loadXML($content);
		$sList = $cxml->getElementsByTagName('OutLineLevel');
		for($i = 0;$i < $sList->length;$i++){
			if($sList->item($i)->getAttribute('val') == $oll){
				$style =  $sList->item($i)->parentNode;
				$this->name = $style->getElementsByTagName('name')->item(0)->getAttribute('val');
				$this->pgBreak = $style->getElementsByTagName('pgBreak')->item(0)->getAttribute('val');
				$this->pstyle = new cstyle($style);			
			}
			
		}
	}
	function getPstyle(){
		return $this->pstyle;
	}
	function __destruct(){
		echo "cPara __destruct\n";
	}
	
	public function test(){
		echo "name:$this->name\n";
		echo "oll:$this->oll\n";
		echo "pgBreak:$this->pgBreak\n";
	}
}
?>