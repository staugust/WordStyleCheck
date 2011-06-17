<?php
include_once 'base.php';
class cHeader extends Base{
	private $name;
	private $type;
	private $text;
	private $hstyle;
	function __construct($tp,$cname){
		$this->type = $tp;
		$content = file_get_contents($cname);
		$cxml = new DOMDocument();
		$cxml->loadXML($content);
		foreach ($cxml->getElementsByTagName('header') as $hEle){
			$temptype = $hEle->getElementsByTagName('type')->item(0)->getAttribute('val');
			if($temptype == $this->type){
				$this->hstyle = new cstyle($hEle);
				$this->text = $hEle->getElementsByTagName('text')->item(0)->getAttribute('val');
				$this->name = $hEle->getElementsByTagName('name')->item(0)->getAttribute('val');
			}
		}
	}
	public function test(){
		echo $this->name,"\n";
	}
	public function getHstyle(){
		return $this->hstyle;
	}
	public function getText(){
		return $this->text;
	}
	public function getName(){
		return $this->name;
	}
	public function getType(){
		return $this->type;
	}
}
?>