<?php
	function test_input($data) {
	    $data = trim($data);
	    $data = stripslashes($data);
	    $data = htmlspecialchars($data);
	    return $data;
	}
	function curPageURL() {
		 $pageURL = 'http';
		 if (!empty($_SERVER['HTTPS'])){
		 	$pageURL .= "s";
		 }
		 $pageURL .= "://";
		 if ($_SERVER["SERVER_PORT"] != "80") {
		  	$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"];
		 } 
		 else {
		  	$pageURL .= $_SERVER["SERVER_NAME"];
		 }
		 return $pageURL;
	}
	function Rederect($url){
		if (headers_sent()===false) {
			header('Location:'.curPageURL().'/mvc/'. $url);
		}
		exit();
	}
	function first_char($str){
		$length = strlen($str);
		$str = substr($str, 1, $length);
		return $str;
	}
	function check_login($name){
		if(empty($_SESSION["$name"])){
			Rederect('login.php');
		}
	}
	

?>