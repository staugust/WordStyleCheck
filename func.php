<?php

/*
 * 根据文件名字，
 * 获取文件内容，
 * 并将所有内容以字符串的形式保存到$fcontent中，
 * 返回$fcontent..
 */
function getContent($name,$filename)
	{
		$zip = new ZipArchive();
		$res = $zip->open($filename);
		if($res == TRUE)
		{
			$fcontent = $zip->getFromName($name);
			return $fcontent;
		}
		else
		{
			echo"failed to open $filename"."\n";
			return;
		}
		$zip->close();
	}
/*
 * 输入：xml内容，
 * 利用SimpleXML获取xml的命名空间
 * 并将$ns返回..
 */
function getNS($fcomment)
{
	//$fcomment = getContent($xmlfile, $filename);
	$xml = new SimpleXMLElement($fcomment);
	$ns = $xml->getDocNamespaces();	
	return $ns;
}
?>