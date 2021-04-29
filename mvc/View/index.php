<!DOCTYPE html>
<html>
<head>
	<title>Post</title>
	<link rel="stylesheet" href="./style.css" />
    <?php include 'header.php';?>
</head>
<body class="home-post post-public">
  <h3>Trainning PHP News Public</h3>
  <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "phpmysql";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $mes_del="";
      $result = mysqli_query($conn, "select count(id) as total from newpost where status='public' ");
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
   ?>
   <div class="status-del"><?php echo $mes_del; ?></div>
  <div class="content posts">
    <div class="ct-center new-post">
      <?php 
      $urlPage = "http://".$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"];
      if($conn->connect_error){
        die("Connection Failed :" .$conn->connect_error);
      }
      else{
        $sql="SELECT * FROM newpost WHERE status='public' ORDER BY id DESC LIMIT $start, $limit";
        $result = $conn->query($sql);
          if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
            ?>
              <div class="post-content">
                <h2><?php echo $row["title"]; ?></h2>
                <div class="info-post">
                  <strong>Post by: <?php echo "<i>" . $row["author"] . "</i>"; ?> | </strong>
                  <span>Post date: <?php echo $row["created_at"]; ?></span>
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
                  echo '<a href="'.$urlPage.'/mvc/index.php?page='.($current_page-1).'">Prev</a> ';
              }
              for ($i = 1; $i <= $total_page; $i++){
                  if ($i == $current_page){
                      echo '<span>'.$i.'</span>';
                  }
                  else{
                      echo '<a href="'.$urlPage.'/mvc/index.php?page='.$i.'">'.$i.'</a>';
                  }
              }
              if ($current_page < $total_page && $total_page > 1){
                  echo '<a href="'.$urlPage.'/mvc/index.php?page='.($current_page+1).'">Next</a> ';
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
</body>
</html>