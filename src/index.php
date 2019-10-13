<html>
<style>

</style>

<?php
     
     //Loader - THE HOLY GRAIL OF CLASSES
     /*
      * Contains the loader functions 
      *    1. Url()
      *         - returns the url string
      *
      *    2. database_loader();
      *         - Loads database
      *         
      *    3. render_view(<parameter1>,<parameter2>);
      *         - Loads views from views folder
      *         - <parameter1>,<parameter2> -> $url string, $file_to_render.
      *   
      */
      session_start();
    require '../config/autoloader.php';
    require '../config/html_lib.php';
    
    database_loader();
    //Creating object for Database class and calling connection() method. 
    $connection_flag = NULL;
    $database = new Database();
    $connect_flag = $database->connect();
?>
<head>
<?php
  load_bootstrap();
?>
</head>

<body id="body" background="<?php echo url()."images/svs.jpg";?>" style="background-size: cover;background-repeat: no-repeat;height:100%;">
  <div class="container">
  <br><br><br><br><br><br><br><br>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <?php    
            form_open("POST");
            render_view("login","login");
            form_close();
        ?>
        </div>
        <div class="col-md-4"></div>
    </div>
  </div>
  <?php render_view("headers","footer")?>
</body>

</html>
<?php

if(isset($_POST['login']))
{
   $select_user = "SELECT COUNT(*) AS cnt FROM login_details WHERE email_id='".$_POST['user_name']."' AND password = '".$_POST['password']."'";
        $execute_select_user = mysqli_query($connect_flag,$select_user) or die(mysqli_error($connect_flag));
        $result1 = mysqli_fetch_array($execute_select_user);
        
        $check_execution_flag = mysqli_affected_rows($connect_flag);
        if($check_execution_flag)
        {
            if($result1['cnt'] > 0)
            {
  //$insert_login = "INSERT INTO login_details (`email_id`, `password`) VALUES ('".$_POST['user_name']."','".$_POST['password']."')";
  $select_login = "SELECT * FROM login_details WHERE email_id='".$_POST['user_name']."' AND password='".$_POST['password']."'"; 
  $execute_login= mysqli_query($connect_flag,$select_login) or mysqli_error($connect_flag);
  $result=mysqli_fetch_array($execute_login);
  if($result['email_id'] == $_POST['user_name'] && $result['password'] == $_POST['password'])
                {
                    echo $_SESSION['id'] = $result['id'];
                    echo $_SESSION['email_id'] = $result['email_id'];
                    echo $_SESSION['role'] = $result['role'];    
                    echo "<script> window.location.href='".url()."src/home.php'; </script>";
                }
            }
                    else
                    {
                        echo "<script> alert('Invaild credentials'); </script>";
                    }
}
            else
                    {
                        echo "<script> alert('Invaild credentials'); </script>";
                    }
}
?>
