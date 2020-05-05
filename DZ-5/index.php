<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<style type="text/css">
		body{
			background-color: rgb(222,222,222);		}
		form{
			width: 400px;
			margin: 100px auto;
		}
		form > p {
			color: red;
			text-align: center;
		}
		input[type=file]{
			background-color: rgb(50,100,255);
			border: transparent solid 1px;
			color: #fff;
			font-size: 18px;
			width: 100%;	
			box-shadow: inset 3px 1px 5px rgba(0,0,0,.5);
		}
		input[type=submit]{
			background-color: rgb(50,100,255);
			border: transparent solid 1px;
			color: #fff;
			font-size: 18px;
			padding: 3px 5px;
			border-bottom: skyblue solid 3px;
			display: block;
			margin: 5px auto;
		}
	</style>
	<form action="handler.php" method="post" enctype="multipart/form-data">  
		<p>
			<input type="file" name="uploaded[]" multiple>
			<input type="hidden" name="MAX_FILE_SIZE" value="15000000">
		
			<input type="submit" name="submit">
		</p></br>
		
		
	</form>
</body>
</html>