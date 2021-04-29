<!DOCTYPE html>
<html>
<head>
	<title>myaccount</title>
	<link rel="stylesheet" href="style.css" />
	<style type="text/css" ></style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<?php include 'header.php';?>
</head>
<body class="myaccount">
	<div class="popup"></div>
	<h3>My Account</h3>
	<?php
      	$servername = "localhost";
      	$username = "root";
      	$password = "";
      	$dbname = "phpmysql";
      	$conn = new mysqli($servername, $username, $password, $dbname);
	?>
	<div class="content-myac">
		<div class="ct-left left">
			<div class="title">All Account</div>
			<?php 
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				else
				{
				$mes_del="";
				$sql = "SELECT id, name, email FROM register";
				$result = $conn->query($sql);
					if ($result->num_rows > 0) {
					  while($row = $result->fetch_assoc()) {
					  	$row_name = $row["name"];
					  	echo '<div class="accout-list">';
					    echo "<p>".$row["name"]."</p>";
					    echo "<p>".$row["email"]."</p>";
					    echo "<p class='delete'>Del</p>";
					    ?>
					    <form class="form-del" action="" method="post">
                          	<p>Are you sure DELETE account <?php echo $row["name"]?> ?</p>
                          	<div class="inp">
                            	<input type="submit" name="confirmyes" value="Yes">
                            	<input type="submit" name="confirmno" value="No">
                            	<input type="hidden" name="user" value ="<?php echo $row["id"];?>">
                          	</div>
                      	</form>
					    <?php
					    echo "</div>";
					  }
					} else {
					  echo "No User";
					}
				}
			 ?>
		</div>
		<div class="ct-right right">
		<?php 
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			else
			{
				$idname = $_SESSION['name'];
				if($_SESSION['loged'] = true){
					$sql = "SELECT name, email, password, address FROM register WHERE name = '$idname'";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
					?>
					<form method="post" action="">
						<ul>
				            <li>
				            	<div class="info">
					               <p>User name:</p> 
					               <input type="text" name="name" value="<?php echo $row["name"];?>">
				               </div>
				            </li>
				            <li>
				            	<div class="info">
					               <p>New Email:</p>
					               <input type="text" name="email" placeholder="<?php echo $row["email"];?>">
				               </div>
				            </li>
				            <li>
				            	<div class="info">
					               <p>New Password:</p>
					               <input type="text" name="password" value="">
				               </div>
				            </li>
				            <li>	
				            	<div class="info">
					               <p>New Address:</p>
					               <input type="text" name="address" placeholder="<?php echo $row["address"];?>">
					            </div>
				            </li>
				            <li>
				               	<div class="login">
				                  <input type="submit" name="submit" value="Update"> 
				               	</div>
				            </li>
				            <li><i class="error" style="color: red"><?php echo $mes_acc;?></i></li>
				        </ul>
					</form>
				<?php	}
					}
				}
			
			}
			
		 ?>
			
		</div>
	</div>
  <script type="text/javascript">  
    jQuery('.delete').click(function(){
      jQuery(this).closest('body').find('.popup').addClass('active-popup');
      jQuery(this).closest('.accout-list').addClass('form-active');
    });
    jQuery('.popup').click(function(){
      jQuery(this).removeClass('active-popup');
      jQuery('.accout-list').removeClass('form-active');
    });
  </script> 
</body>
</html>