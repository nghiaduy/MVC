<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" href="./style.css" />
	<style type="text/css" ></style>
</head>
<body>
	<?php include 'header.php';?>
	<h3>Register</h3>
	<div class="content">
		<div class="ct-center">
			<form method="post" action="">
				<ul>
		            <li>
		            	<div class="info">
			               <p>User name:</p> 
			               <input type="text" name="name" placeholder="Leona Devin">
		               </div>
		            </li>
		            <li>
		            	<div class="info">
			               <p>Email:</p>
			               <input type="text" name="email" placeholder="Email">
		               </div>
		            </li>
		            <li>
		            	<div class="info">
			               <p>Password:</p>
			               <input type="password" name="password">
		               </div>
		            </li>
		            <li>
		            	<div class="info">
			               <p>Address:</p>
			               <input type="text" name="address" placeholder="Thai Nguyen-Viet Nam">
			            </div>
		            </li>
		            <li>
		               	<div class="login">
		                  <input type="submit" name="submit" value="Register">
		               	</div>
		            </li>
		            <li><i class="error" style="color: red"><?php echo $mes_register?></i></li>
		        </ul>
			</form>
		</div>
	</div>
</body>
</html>