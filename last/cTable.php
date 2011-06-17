<?php
include_once 'base.php';
class cTable extends Base{
	private $caption;
	private $tbody;
	private $border;
	function __construct($cname){
		$this->confname = $cname;
		$this->content = file_get_contents($cname);
		//echo $this->content;
		$cxml = new DOMDocument();
		$cxml->loadXML($this->content);
		$tEle = $cxml->getElementsByTagName('table')->item(0);
		$tcapEle = $tEle->getElementsByTagName('caption')->item(0);
		$this->caption = new cstyle($tcapEle);
		$tbodyEle = $tEle->getElementsByTagName('tbody')->item(0);
		$this->tbody = new cstyle($tbodyEle);
		$bordEle = $tEle->getElementsByTagName('border')->item(0);
		$this->border = new borders($bordEle);
		
	}	
	function getCaption(){
		return $this->caption;
	}
	function getTbody(){
		return $this->tbody;
	}
	function getBorder(){
		return $this->border;
	}
}
class borders{
	private $top;
	private $bottom;
	private $left;
	private $right;
	function __construct($ele){
		/*
		 * $ele 为DOM读取的配置xml文件中table节点的border节点
		 */
		$this->top = $ele->getAttibute('top');
		$this->bottom = $ele->getAttibute('bottom');
		$this->left = $ele->getAttibute('left');
		$this->right = $ele->getAttibute('right');
	}
	function getTop(){
		return $this->top;
	}
	function getBottom(){
		return $this->bottom;
	}
	function getLeft(){
		return $this->left;
	}
	function getRight(){
		return $this->right;
	}
}
?>