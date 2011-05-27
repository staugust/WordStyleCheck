<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Word版式在线检查系统</title>
</head>
    <body>
    	<form enctype="multipart/form-data" action="up.php" method="POST">
    <!-- MAX_FILE_SIZE must precede the file input field -->

    <!-- Name of input element determines name in $_FILES array -->
    Send this file: <input name="userfile" type="file" />
    <br>
    <!-- MAX_FILE_SIZE must precede the file input field -->

    <!-- Name of input element determines name in $_FILES array -->
    Send conf file: <input name="conf" type="file"/>
    <input type="submit" value="Send File" />
		</form>
    </body>
   
</html>