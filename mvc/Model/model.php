<?php session_start(); ?>
<?php include_once("Model/model.php");
Class Model{
    public function Model()
    {
    }
    public function user_login()
    {
      $name = $password =$errName = $errpass= $success = "";

          if ($_SERVER["REQUEST_METHOD"] == "POST") {
              
              if(empty($_POST["name"])){
                  $errName="Ban chua nhap ten";
                  return $errName;
              }
              else{
                  $name = test_input($_POST["name"]);
              }
              if(empty($_POST["password"])){
                  $errpass="Ban chua nhap Password";
                  return $errpass;
              }
              else{
                  $pass = test_input($_POST["password"]);
              }
              if(($errName=="")&&($errpass=="")){
                  $servername = "localhost";
                  $username = "root";
                  $password = "";
                  $dbname = "phpmysql";
                  $conn = new mysqli($servername, $username, $password, $dbname);

                  if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                  }
                  else
                  {
                    $sql = "SELECT * FROM register WHERE name='$name' AND password='$pass'";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){
                        $_SESSION['name'] = $name;
                        $_SESSION['loged'] = true;
                        Rederect('home.php');
                       
                    }
                    else {
                      $success= "Thông tin nhập không đúng !";
                      return $success;
                    }
                  }
                  $conn->close();
              }
        }
    }
    public function register_user(){
      $name = $email =$pass =$address = $errName= $erremail= $errpass=$erraddress="";
      $success="";
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(empty($_POST["name"])){
              $errName="Ban chua nhap ten";
              return $errName;
            }
            else{
              $name = test_input($_POST["name"]);
            }
            if(empty($_POST["email"])){
              $erremail="Ban chua nhap Email";
              return $erremail;
            }
            elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){  
              $erremail="Email khong hop le";
              return $erremail;
            }  
            else{
              $email = test_input($_POST["email"]);
            }

            if(empty($_POST["password"])){
              $errpass="Ban chua nhap Password";
              return $errpass;
            }
            else{
              $pass = test_input($_POST["password"]);
            }

            $address = test_input($_POST["address"]);

            if(($errName=="")&&($erremail=="")&&($errpass=="")){
              $servername = "localhost";
              $username = "root";
              $password = "";
              $dbname = "phpmysql";
              $conn = new mysqli($servername, $username, $password, $dbname);
              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }
              else
              {
                $sql = "SELECT * FROM register WHERE name='$name'";
                  $result = $conn->query($sql);
                  if($result->num_rows > 0)
                  {
                    $errName="This Account already exists";
                    return $errName;
                  }
                  else {
                    $sql = "INSERT INTO register (name, email, password, address)
                    VALUES ('$name', '$email', '$pass', '$address')";

                  if ($conn->query($sql) === TRUE) {
                    Rederect("login.php?name=".$name);
                  } 
                  else {
                    $success= "Error: " . $sql . "<br>" . $conn->error;
                    return $success;
                  }
                  
                }
                $conn->close();
              }
          }
                
        }
    }

    public function delete_post(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "phpmysql";
        $conn = new mysqli($servername, $username, $password, $dbname);
        $mes_del = "";
        if (isset($_POST['confirm']))
        {
            if($_POST['confirm'] == 'Yes') 
            {
              $idpost = ($_POST['id']);
              if($conn->connect_error){
                return die("Connection Failed :" .$conn->connect_error);
              }
              else{
                $sqldel = "DELETE FROM newpost WHERE id = $idpost";
                  if ($conn->query($sqldel)===TRUE) {
                      return $mes_del = "Record deleted successfully";
                  } else {
                      return $mes_del = "Error deleting record: " . $conn->error;
                    }
              }
            }
         
        }
    }
    public function new_update_post(){
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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          
          if(empty($_POST["title"])){
            $errtitle="Ban chua nhap title";
          }
          else{
            $title = test_input($_POST["title"]);
          }

              if(empty($_POST["description"])){
            $errdescription="Ban chua nhap description";
          } 
          else{
            $description = test_input($_POST["description"]);
          }
          if(isset($_FILES['image'])&&$_FILES['image']["name"]!=null){
                $file_name=$_FILES['image']["name"];
                $file_tmp =$_FILES['image']['tmp_name'];
                $path ='images/'.$file_name;
                move_uploaded_file($file_tmp,$path);
            }
            else{
              $errimage="Image input error";
            }         
          if(empty($_POST["status"])){
            $errstatus="Ban chua nhap status";
          }
          else{
            $status = test_input($_POST["status"]);
          }
          if(isset($_POST["tags"])){
            $tags = $_POST["tags"];
          foreach ($tags as $key => $value){ 
            $tag .= ",".$value;
          }
          $tag = ucfirst(first_char($tag));
          }
          if(isset($_POST["cate"])){
            $cate = $_POST["cate"];
          foreach ($cate as $key => $value){ 
            $category .= ",".$value;
          }
          $category = ucfirst(first_char($category));
          }
          if(isset($_POST["author"])){
            $aut = test_input($_POST["author"]);
          }
          $author = $_SESSION['name'];
          $created_at = date("Y/m/d");
          $updated_at = date("Y/m/d");
          if(($errtitle=="")&&($errdescription=="")&&($errimage=="")&&($errstatus=="")){
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            } 
            else
            {
              if($id_post!=""){
                $sql = "UPDATE newpost SET title='$title', description='$description', image='$file_name', status='$status', updated_at='$updated_at', tag= '$tag', category= '$category' WHERE id = '$id_post' && author ='$author'";
                  if ($conn->query($sql) === TRUE) {
                    if ($aut != $author) {
                      $success= "You are not an Author ! Do not Update";
                    }
                    else{
                        $success= "New record UPDATE successfully!";
                      }
                  } 
                  else {
                    $success= "Error: " . $sql . "<br>" . $conn->error;
                  }
                return $success;
              }
              else{
                $sql = "INSERT INTO newpost (title, description, image, status, author, created_at, tag, category)
                VALUES ('$title', '$description', '$file_name', '$status' ,'$author' ,'$created_at', '$tag', '$category')";
                if ($conn->query($sql) === TRUE) {
                  $success= "New record CREATED successfully";
                } 
                else {
                  $success= "Error: " . $sql . "<br>" . $conn->error;
                }
                return $success;
              }
            }
          }
      }
    }
    public function update_account(){
      $name = $email =$pass =$address = $err ="";
      $success="";
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "phpmysql";
      $conn = new mysqli($servername, $username, $password, $dbname);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

          if (isset($_POST['confirmyes'])) {
            $iduser = ($_POST['user']);
            if($conn->connect_error){
              return die("Connection Failed :" .$conn->connect_error);
            }
            else{
              $sqldel = "DELETE FROM register WHERE id = $iduser";
                if ($conn->query($sqldel)===TRUE) {
                  return $mes_del = "Record deleted successfully";
                } 
                else {
                  return $mes_del = "Error deleting User: " . $conn->error;
                }
            }
          }
          if (isset($_POST['submit'])) {
            $name = test_input($_POST["name"]);
            if(empty($_POST["email"])){
              $err = "Ban chua nhap Email";
            }
            elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){  
              $err="Email khong hop le";
            }  
            else{
              $email = test_input($_POST["email"]);
            }

            if(empty($_POST["password"])){
              $err ="Ban chua nhap Password";
            }
            else{
              $pass = test_input($_POST["password"]);
            }

            if(empty($_POST["address"])){
              $err = "Ban chua nhap Address";
            }
            else{
              $address = test_input($_POST["address"]);
            }
            if($err==""){
              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }
              else
              {
                $sql = "UPDATE register SET email='$email', password='$pass', address='$address' WHERE name = '$name'";
                if ($conn->query($sql) === TRUE) {
                  $err = "Update successfully";
                } 
                else {
                  $err = "Error: " . $sql . "<br>" . $conn->error;
                }
              }
            }
          return $err;
        }
      }
    }
  }
?>