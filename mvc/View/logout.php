<!DOCTYPE html>
<html>
<head>
	<title>logout</title>
	<link rel="stylesheet" href="style.css" />
</head>
<body>
  <?php include 'header.php';?>
	<div class="content padding-top">
   		<div class="ct-center">
   			<h3>logout success</h3>
   			<?php
   			$urlPage = "http://".$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"];
	   			if(isset($_GET["act"])){
				unset($_SESSION["loged"]);
				unset($_SESSION["name"]);
				header('Refresh: 2; url = '.$urlPage.'/mvc/index.php');
			}
   			 ?>
   		</div>
   	</div>
</body>
</html>