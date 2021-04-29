<!DOCTYPE html>
<html>
<head>
	<title>new post</title>
	<link rel="stylesheet" href="style.css" />
	<style type="text/css" ></style>
	<?php include 'header.php';?>
</head>
<body>
	<?php 
		if (isset($_GET["post-id"])) {
			echo '<h3>Update Post</h3>';
		}
		else{
			echo '<h3>New Post</h3>';
		}
		$id_post = '';
	    if (isset($_GET["post-id"])) {
	      $id_post = $_GET["post-id"];
	    }
	    $title = $description =$status = $author = $aut = $created_at= ""; 
	    $errtitle = $errdescription =$errimage =$errstatus = $erruthor= $created_at= "";
	    $tag = $category = "";
	    $success="";
	    $file_name="";
	    
	      $servername = "localhost";
	      $username = "root";
	      $password = "";
	      $dbname = "phpmysql";
	      $conn = new mysqli($servername, $username, $password, $dbname);   
	?>
	<div class="content posts">
		<div class="ct-center new-post">
			<form method="post" action="" enctype="multipart/form-data" id="new-post">
				<ul>
					<?php 
						if ($id_post!="") {
							if ($conn->connect_error) {
					  			die("Connection failed: " . $conn->connect_error);
							}	
							else
							{
								$sql = "SELECT * FROM newpost WHERE id = '$id_post'";
								$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
									?>
										<li>
							            	<div class="info">
								               <p>Post Title:</p> 
								               <input type="text" name="title" value="<?php echo $row["title"];?>">
							               </div>
							            </li>
							            <li>
							            	<div class="info">
								               <p>Description:</p>
								               <textarea name="description" form="new-post" rows="10"><?php echo $row["description"];?></textarea>
							               </div>
							            </li>
							            <li>
							            	<div class="info">
								               <p>Image:</p>
								               <input type="file" name="image" accept="image/*"/>
							               </div>
							            </li>
							            <li>
							            	<div class="info">
								               <p>Status:</p>
								               <input type="text" name="status" value="<?php echo $row["status"];?>">
								            </div>
							            </li>
							            <li>
								            <input type="hidden" name="author" value="<?php echo $row["author"];?>">
							            </li>
							            <div class="tag-cate">
							            	<div class="tag">
							            		<p> Tag: </p>
							            	<?php 
												if ($conn->connect_error) {
													die("Connection failed: " . $conn->connect_error);
												}
												else
												{
												$sql = "SELECT name FROM tag";
												$result = $conn->query($sql);
													if ($result->num_rows > 0) {
													  while($row = $result->fetch_assoc()) {
													?>
								            		<input type="checkbox" name="tags[]" id = "tags" value="<?php echo $row["name"];?>"><?php echo "<span>".$row["name"]."</span>"; ?>
								            		<?php 
											            }
											        }
											    }
								             ?>
							            	</div>
							            	<div class="cate">
							            		<p> Category: </p>
							            	<?php 
												if ($conn->connect_error) {
													die("Connection failed: " . $conn->connect_error);
												}
												else
												{
												$sql = "SELECT name FROM category";
												$result = $conn->query($sql);
													if ($result->num_rows > 0) {
													  while($row = $result->fetch_assoc()) {
													?>
								            		<input type="checkbox" name="cate[]" id = "cate" value="<?php echo $row["name"];?>"><?php echo "<span>".$row["name"]."</span>"; ?>
								            		<?php 
											            }
											        }
											    }
								             ?>				            		
							            	</div>
							            </div>
									<?php
										}
									}
							}
						}
						else{ ?>
							<li>
				            	<div class="info">
					               <p>Post Title:</p> 
					               <input type="text" name="title">
				               </div>
				            </li>
				            <li>
				            	<div class="info">
					               <p>Description:</p>
					               <textarea name="description" form="new-post" rows="10"></textarea>
				               </div>
				            </li>
				            <li>
				            	<div class="info">
					               <p>Image:</p>
					               <input type="file" name="image" accept="image/*"/>
				               </div>
				            </li>
				            <li>
				            	<div class="info">
					               <p>Status:</p>
					               	<select name="status">
										<option value="public" selected>Public</option>
										<option value="trash">Trash</option>
									</select>
					            </div>
				            </li>
				            <div class="tag-cate">
				            	<div class="tag">
				            		<p> Tag: </p>
				            	<?php 
									if ($conn->connect_error) {
										die("Connection failed: " . $conn->connect_error);
									}
									else
									{
									$sql = "SELECT name FROM tag";
									$result = $conn->query($sql);
										if ($result->num_rows > 0) {
										  while($row = $result->fetch_assoc()) {
										?>
					            		<input type="checkbox" name="tags[]" id = "tags" value="<?php echo $row["name"];?>"><?php echo "<span>".$row["name"]."</span>"; ?>
					            		<?php 
								            }
								        }
								    }
					             ?>
				            	</div>
				            	<div class="cate">
				            		<p> Category: </p>
				            	<?php 
									if ($conn->connect_error) {
										die("Connection failed: " . $conn->connect_error);
									}
									else
									{
									$sql = "SELECT name FROM category";
									$result = $conn->query($sql);
										if ($result->num_rows > 0) {
										  while($row = $result->fetch_assoc()) {
										?>
					            		<input type="checkbox" name="cate[]" id = "cate" value="<?php echo $row["name"];?>"><?php echo "<span>".$row["name"]."</span>"; ?>
					            		<?php 
								            }
								        }
								    }
					             ?>				            		
				            	</div>
				            </div>
						<?php
						}
					 ?>
		            
		            <li class="public-post">
		               	<div class="login">
		                  <input type="submit" name="submit" value="<?php if (isset($_GET["post-id"])) echo 'Update'; else echo 'Puplic';?>" > 
		               	</div>
		            </li>
		            <li><i class="error" style="color: red"><?php echo $mes_post ?></i></li>
		        </ul>
			</form>
		</div>
	</div>
	<?php /*$conn->close(); */?>
</body>
</html>