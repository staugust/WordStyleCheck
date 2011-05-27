<?php
/*
 * style父类
 */
abstract class Style{
	private $filename;
	private $name;
	private $content;
	private $ns;
	private $outlinelvl;
	private $id;
	private $basedOn;
	private $next;
	private $qFormat;	
	private $results;	
	private $pPr = array();
	function __construct(){
		
	}
	function __destruct(){
		
	}
	function chk(){
		
	}
	function eleToArrNS($ele,$ns = array(),$filename){
		$styleArr = array();
		if($ele->hasAttributes()){
			/*
			 * 检查是否有属性
			 */
			$i = 0;
			$temp = array();
			while($ele->attributes->item($i)){
				//echo $ele->attributes->item($i)->localName,":\n";
				$temp[$ele->attributes->item($i)->localName]= 
					$ele->attributes->item($i)->nodeValue;
				
				$i++;
			}
			//var_dump($temp);
			$styleArr = array_merge($styleArr,$temp);
		}
		if($ele->hasChildNodes()){
			/*
			 * 检查是否有字节点
			 */
			foreach ($ele->childNodes as $chEle){
				$styleArr[$chEle->localName] = eleToArr($chEle, $ns,$filename);
				//$styleArr = $styleArr + $tempstyleArr;
			}
		}
		foreach ($ele->getElementsByTagNameNS($ns['w'],'basedOn') as $pele){
			$pId = $pele->getAttributeNS($ns['w'],'val');
			//echo "baseOn: $pId","\n";
			$pstyle = idToStyle($pId, $filename);
			//$styleArr = $styleArr + eleToArr($pstyle, $ns, $filename,$styleArr);
			$styleArr = array_merge(eleToArr($pstyle, $ns, $filename),$styleArr);
		}
	}
	function idToStyle($id,$filename){
	/*
	 * 根据传进来的styleId
	 * 返回styleId对应的style节点..
	 */
		$scontent = getContent('word/styles.xml', $filename);
		$sxml = new DOMDocument();
		$sxml->loadXML($scontent);
		$sns = getNS($scontent);
		foreach ($sxml->getElementsByTagNameNS($sns['w'],'style') as $style){
			if($style->getAttributeNS($sns['w'],'styleId') == $id){
				echo "success $id\n";
			
				return $style;
			}
		}
	
	}
	function eleToArr($ele){
		
		
	}
	function getNS($content){
		//$fcomment = getContent($xmlfile, $filename);
		$xml = new SimpleXMLElement($content);
		$ns = $xml->getDocNamespaces();	
		return $ns;
	
	}	
	function getContent($name,$filename)
	{
		$zip = new ZipArchive();
		$res = $zip->open($filename);
		if($res == TRUE)
		{
			$fcomment = $zip->getFromName($name);
			return $fcomment;
		}
		else
		{
			echo"failed to open $filename"."\n";
			return;
		}
		$zip->close();
	}
}
?>