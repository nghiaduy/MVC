<div class="top-header">
	<?php 
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

		if (isset($_SESSION['loged'])) {
		?>
		<div class="redirect">
	      <a href="<?php echo $pageURL ?>/mvc/account.php">MY ACCOUNT</a>
	      <a href="<?php echo $pageURL ?>/mvc/home.php">ALL POST</a>
	      <a href="<?php echo $pageURL ?>/mvc/new_post.php">NEW POST</a>
		<!--
	      <a href="<?php echo $pageURL ?>/mvc/tag.php">TAG</a>
	      <a href="<?php echo $pageURL ?>/mvc/category.php">CATEGORY</a>
	  	-->
	  	</div>
	  	<div class="account">
	  		<?php 
	         if( isset( $_SESSION['name'] ) )
	           {
	           	?>
	             	<p>WellCome : <span><?php echo $_SESSION['name']; ?></span></p>
					<a href="<?php echo $pageURL ?>/mvc/logout.php?act=logout">Logout</a>
	            <?php
	           }
	        ?>
	  	</div>
  	<?php } 
  		else{
  			?>
	  		<div class="redirect">
	  			<a href="<?php echo $pageURL ?>/mvc/index.php">NEWS</a>
				<a href="<?php echo $pageURL ?>/mvc/register.php">REGISTER</a>
				<a href="<?php echo $pageURL ?>/mvc/login.php">LOGIN</a>

		  	</div>
	<?php }?>
 </div>
