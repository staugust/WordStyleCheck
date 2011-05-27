<?php
$results = "";
$uploaddir = '/home/joker/files/';
echo $uploaddir ;
echo"<br>";
$uploadfile = $uploaddir . $_FILES['userfile']['name'];
$uploadconf = $uploaddir . $_FILES['conf']['name'];
echo $uploadfile."<br>";
echo $uploadconf."<br>";
echo 'Come in <br><pre>';
if(strcmp($_FILES['userfile']['type'], 
	'application/vnd.openxmlformats-officedocument.wordprocessingml.document') == '0')
{
	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) 
	{
    	$results = $results."File is valid, and was successfully uploaded."."\n";
    	$results = $results."file Type:".$_FILES['userfile']['type']."\n";
    	/*
    	include 'docChk.php';
    	chkDoc($uploadfile);
   		*/
	if (move_uploaded_file($_FILES['conf']['tmp_name'], $uploadconf)) 
	{
    	$results = $results."File is valid, and was successfully uploaded."."\n";
    	$results = $results."file Type:".$_FILES['conf']['type']."\n";
    	//$results = $results.$_FILES['userfile']['name'];
   		//检查文件
   		echo "upload success\n";
   		
   		include 'docChk.php';
   		chkDoc($uploadfile, $uploadconf);	
   		
	} 
	else {
    echo "Possible file upload attack!\n";
 	echo 'Here is some more debugging info:';
 	print_r($_FILES);
 	switch ($_FILES['conf']['error']) {
 		case '1':
 			$results = $results."上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值。\n";
 			break;
 		case '2':
 			$results = $results."上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。\n";
 			break;
 		case '3':
 			$results = $results."文件只有部分被上传。\n";
 			break;
 		case '4':
 			$results = $results."没有文件被上传。\n";
 			break;
 		case '6':
 			$results = $results."找不到临时文件夹。\n";
 			break;
 		case '7':
 			$results = $results."文件写入失败。\n";
 			break;
 		default:
 			$results = $results."未知的错误！\n";
 			break;
 	}
	}
	} 
	else {
    echo "Possible file upload attack!\n";
 	echo 'Here is some more debugging info:';
 	print_r($_FILES);
 	switch ($_FILES['userfile']['error']) {
 		case '1':
 			$results = $results."上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值。\n";
 			break;
 		case '2':
 			$results = $results."上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。\n";
 			break;
 		case '3':
 			$results = $results."文件只有部分被上传。\n";
 			break;
 		case '4':
 			$results = $results."没有文件被上传。\n";
 			break;
 		case '6':
 			$results = $results."找不到临时文件夹。\n";
 			break;
 		case '7':
 			$results = $results."文件写入失败。\n";
 			break;
 		default:
 			$results = $results."未知的错误！\n";
 			break;
 	}
	}
	
 	
}
else {
		$results = $results."上传文档类型不正确...请上传一个word2007文档\n";
}

	//echo "results:\n",$results."\n";
?>