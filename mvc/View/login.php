<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="./style.css" />
</head>
<body>
  <?php include 'header.php';?>
    <h3>Login</h3>
    <div class="content">
        <div class="ct-center">
          <?php
            $name ="";
            if(isset($_GET["name"])){
              $name =$_GET["name"];
            ?>
              <div class="smg-s">Created one account succeed !</div>
          <?php } ?>
            <form method="post" action="">
                <ul>
                    <li>
                        <div class="info">  
                           <p>User name:</p> 
                           <input type="text" name="name" value="<?php echo($name) ?>">
                       </div>
                    </li>
                    <li>
                        <div class="info">
                           <p>Password:</p>
                           <input type="text" name="password">
                       </div>
                    </li>
                    <li>
                        <div class="login">
                          <input type="submit" name="submit" value="Login"> 
                        </div>
                    </li>
                    <li><i class="error" style="color: red"><?php echo $result;?></i></li>
                </ul>
            </form>
        </div>
    </div>

</body>
</html>