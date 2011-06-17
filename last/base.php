<?php
abstract class Base{
	private $filename;
	private $confname;
	private $ns;
	private $name;
	private $content;
	function __construct($nm,$fname,$cname){
		$this->filename = $fname;
		$this->confname = $cname;
		$this->name = $nm;
		$zip = new ZipArchive();
		$res = $zip->open($fname);
		if($res == TRUE)
		{
			$fcontent = $zip->getFromName($name);
			$xml = new SimpleXMLElement($fcomment);
			$this->ns = $xml->getDocNamespaces();	
		}
		else
		{
			echo"failed to open $fname"."\n";
		}
		$zip->close();
		
	}
	function __destruct(){
		
	}
	function Base($nm,$fname,$cname){
		/*
		 * 为了与php4兼容
		 */
		$this->filename = $fname;
		$this->confname = $cname;
		$this->name = $nm;
		$zip = new ZipArchive();
		$res = $zip->open($fname);
		if($res == TRUE)
		{
			$fcontent = $zip->getFromName($name);
			$xml = new SimpleXMLElement($fcomment);
			$this->ns = $xml->getDocNamespaces();	
		}
		else
		{
			echo"failed to open $fname"."\n";
		}
		$zip->close();
	}
}

class cstyle{
	private $sz;
	private $jc;
	private $rFonts;
	private $cb;
	private $cu;
	private $ci;
	function __construct($ele){
		/*
		 * $ele 为DOM读取的配置xml文件中style节点
		 * 或者header节点
		 * 或者table节点中的caption或者tbody节点
		 */
		$this->sz = $ele->getElementsByTagName('sz')->item(0)->getAttribute('val');
		$this->cb = $ele->getElementsByTagName('b')->item(0)->getAttribute('val');
		$this->cu = $ele->getElementsByTagName('u')->item(0)->getAttribute('val');
		$this->ci = $ele->getElementsByTagName('i')->item(0)->getAttribute('val');
		$this->jc = $ele->getElementsByTagName('jc')->item(0)->getAttribute('val');
		$rEle = $ele->getElementsByTagName('rFonts')->item(0);
		$rFonts = new rFonts($rEle);
	}
	function getSz(){
		return $this->sz;
	}
	function getJc(){
		return $this->jc;
	}
	function getCu(){
		return $this->cu;
	}
	function getCi(){
		return $this->ci;
	}
	function getCb(){
		return $this->cb;
	}
	function getrFonts(){
		return $this->rFonts;
	}
	
	function __destruct(){
		echo "cstyle __destruct\n";
	}
	function test(){
		echo $this->cb,"\n";
		echo $this->jc,"\n";
	}
}
class rFonts{
	private $eA;
	private $ascii;
	private $cs;
	private $hAnsi;
	function __construct($ele){
		/*
		 * $ele 为DOM读取的配置xml文件中相应部分的rFonts节点
		 */
		$this->eA = $ele->getAttribute('eastAsia');
		$this->ascii = $ele->getAttribute('ascii');
		$this->cs = $ele->getAttribute('cs');
		$this->hAnsi = $ele->getAttribute('hAnsi');
	}
	function __destruct(){
		echo "rFonts __destruct()\n";
	}
	function getEA(){
		return $this->eA;
	}
	function getAscii(){
		return $this->ascii;
	}
	function getCs(){
		return $this->cs;
	}
	function gethAnsi(){
		return $this->hAnsi;
	}
}
class dpPr{
	private $pstyle;
	private $outLinelvl;
	private $jc;
	
}
?>