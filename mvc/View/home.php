<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" href="./style.css" />
  <style type="text/css" ></style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <?php include 'header.php';?>
</head>
<body class="home-post">
  <div class="popup"></div>
  <h3>The Posts</h3>
  <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "phpmysql";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $mes_del="";
      $result = mysqli_query($conn, 'select count(id) as total from newpost');
      $row = mysqli_fetch_assoc($result);
      $total_records = $row['total'];
      $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
      $limit = 4;
      $total_page = ceil($total_records / $limit);
       
      if ($current_page > $total_page){
          $current_page = $total_page;
      }
      else if ($current_page < 1){
          $current_page = 1;
      }
      $start = ($current_page - 1) * $limit;
      //------------------------------------
      if (isset($_POST['confirm']))
        {
            if($_POST['confirm'] == 'Yes') 
            {
              $idpost = ($_POST['id']);
              
            }
         
        }
   ?>
   <div class="status-del"><?php echo $mes_del; ?></div>
  <div class="content posts">
    <div class="messe"><?php echo $mes_delete; ?></div>
    <div class="ct-center new-post">
      <?php 
      $urlPage = "http://".$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"];
      if($conn->connect_error){
        die("Connection Failed :" .$conn->connect_error);
      }
      else{
        $sql="SELECT * FROM newpost ORDER BY id DESC LIMIT $start, $limit";
        $result = $conn->query($sql);
          if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
            ?>
              <div class="post-content">
                <h2><?php echo $row["title"]; ?></h2>
                <div class="info-post">
                  <strong>Post by: <?php echo "<i>" . $row["author"] . "</i>"; ?> | </strong>
                  <span>Post date: <?php echo $row["created_at"]; ?></span>
                  <span class="star"><?php echo $row["status"]; ?></span>
                </div>
                <div class="edit-del">
                  <a href="<?php echo($urlPage)?>/mvc/new_post.php?post-id=<?php echo $row["id"];?>">Edit</a> 
                  <span class="delete">Delete</span>
                    <!--POPUP delete-->
                      <form class="form-del" action="" method="post">
                          <p>Are you sure DELETE post id <?php echo $row["id"]?> ?</p>
                          <div class="inp">
                            <input type="submit" name="confirm" value="Yes">
                            <input type="submit" name="confirm" value="No">
                            <input type="hidden" name="id" value="<?php echo $row["id"];?>">
                            <input type="hidden" name="referer" value="<?php echo $_SERVER['HTTP_REFERER']; ?>">
                          </div>
                      </form>
                      
                </div>
                <div class="desc">
                  <?php echo $row["description"]; ?>
                </div>
                <div class="center">
                  <?php 
                      $row_image = $urlPage.'/mvc/images/'.$row['image'];
                   ?>
                  <img src="<?php echo $row_image ?>">
                </div>
                <div class="tag-cate">
                  <p class="tag"><span>Tag :</span><?php echo $row['tag']; ?></p>
                  <p class="cate"><span>Category :</span><?php echo $row['category']; ?></p>
                </div>
              </div>
            <?php

            }
            
            echo '<div class="pagination">';
             if ($current_page > 1 && $total_page > 1){
                  echo '<a href="'.$urlPage.'/mvc/home.php?page='.($current_page-1).'">Prev</a> ';
              }
              for ($i = 1; $i <= $total_page; $i++){
                  if ($i == $current_page){
                      echo '<span>'.$i.'</span>';
                  }
                  else{
                      echo '<a href="'.$urlPage.'/mvc/home.php?page='.$i.'">'.$i.'</a>';
                  }
              }
              if ($current_page < $total_page && $total_page > 1){
                  echo '<a href="'.$urlPage.'/mvc/home.php?page='.($current_page+1).'">Next</a> ';
              }
              echo'</div>';
          }
          else{
            echo '<p class="no-post">No the post in Website. Add new post!</p>';
          }
      }
      ?>
    </div>
  </div>
  <script type="text/javascript">  
    jQuery('.delete').click(function(){
      jQuery(this).closest('body').find('.popup').addClass('active-popup');
      jQuery(this).closest('.edit-del').addClass('form-active');
    });
    jQuery('.popup').click(function(){
      jQuery(this).removeClass('active-popup');
      jQuery('.edit-del').removeClass('form-active');
    });
  </script> 
</body>
</html>