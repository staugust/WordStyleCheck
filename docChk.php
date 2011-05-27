<?php
function chkDoc($filename,$confname){
	
	include 'func.php';
	//include 'ParaStyle.php';
	$dcontent = getContent('word/document.xml', $filename);
	$ns = getNS($dcontent);
	var_dump($ns);
	$dxml = new DOMDocument();
	$dxml->loadXML($dcontent);
	$ele = $dxml->firstChild->firstChild->firstChild;
	//echo $ele->localName,"\n";
	while($ele){
		//echo $ele->nodeValue,"\n";
		/*
		$nd = new DOMDocument();
		$nd->formatOutput = TRUE;
		$nd ->loadXML("<root></root>");
		$node = $nd->importNode($ele,TRUE);
		$nd->firstChild->appendChild($node);
		$sx = simplexml_import_dom($nd->saveXML());
		var_dump($sx);
		//echo $nd->saveXML(),"\n";
		
		//echo $sx;
		*/
		include_once 'ParaStyle.php';
		$p = new ParaStyle($ele,$filename);
		echo"狗日的..\n";
		$ele = $ele->nextSibling;
	}
}

function getStyle($filename){
	include_once 'func.php';
	$scontent = getContent('word/styles.xml', $filename);
	$ns = getNS($scontent);
	$sxml = new DOMDocument();
	$sxml->loadXML($scontent);
	$deStyle = null;
}
?>