<?php
    require '../config/autoloader.php';
    require '../config/html_lib.php';
    require '../config/redirect.php';
    require '../config/load_models.php';
    session_start();
if($_SESSION['role'] == "superadmin" || $_SESSION['role'] == "admin" )
{
?>
?>
<html>
    <head>
        <?php load_bootstrap(); ?>
    </head>
<body>
<?php
//form open
form_open("POST");

//Calling header.php
echo "<section class='fixed-top'>";
//calling header.php
render_view("headers","header1");
render_view("headers","header");
echo "</section>";
echo "<br><br><br><br><br><br><br>";
//write what ever you want here.
render_view("inventory","create_product");

//form close
form_close();

//calling footer.php
render_view("headers","footer");
 ?>

<?php
if (isset($_POST['submit_product']))
{
  $data_array = array((string)"sizes"=>$_POST['product_size'],"quantity"=>$_POST['product_quantity'],"numbers"=>$_POST['numbers'],"sectionkgm"=>$_POST['spl'],"sectionweight"=>$_POST['section_weight'],(string)"brand"=>$_POST['get_brand'],"description"=>$_POST['description'],"sectionunitweight"=>$_POST['section_unit_weight']);
  $validate_parmeters = array("sizes"=>$_POST['product_size'],"brand"=>$_POST['get_brand'],"sectionkgm"=>$_POST['spl']);

  $database = new Database();
  $conn_string = $database -> connect();

//Loading Select Model and Insert model
  load_model('InsertModel');
  load_model('SelectModel');
  $select_model = new SelectModel();
  $insert_model = new InsertModel();

  $check_repeat_flag = $select_model->selectUniqueProduct($conn_string,$_POST['get_category'],$validate_parmeters);
  $set_flag = NULL;

  if($check_repeat_flag == 1)
  {
      $set_flag = true;
  }
  else
  {
    $set_flag = false;
  }
  if($set_flag)
  {
    $database = new Database();
    $conn_string = $database -> connect();
    $result_check = $insert_model->InsertNewProducts($conn_string,$_POST['get_category'],$data_array);
    if($result_check)
    {
      echo "<script> alert('New Product Created'); </script>";
    }
  }
  else
  {
      echo "<script> alert('Product Already Exists.'); </script>";
  }
}


?>

 <?php
 /* HEADER BUTTON NAVIGATION */

 /*
  * This works if the page name similar as the post value -> from redirect.php
  */
}
else
{
    require '../404.php';
    echo "<script> window.location='".url()."src' </script>";
}
      header_buttons();
  ?>
<?php
if(isset($_GET['id'])&& isset($_GET['table']))
{
    if(isset($_POST['update_product']))
    {
        $data_array = array((string)"sizes"=>$_POST['product_size'],"numbers"=>$_POST['numbers'],"sectionkgm"=>$_POST['spl'],"sectionweight"=>$_POST['section_weight'],(string)"brand"=>$_POST['get_brand'],"description"=>$_POST['description'],"sectionunitweight"=>$_POST['section_unit_weight']);

        $database = new Database();
        $con = $database->connect();
        
        load_model('UpdateModel');
        $UpdateModel = new UpdateModel();
        $check_stat = $UpdateModel->updateProduct($con,$_GET['table'],$data_array,$_GET['id']);
        if($check_stat)
        {
            echo "<script> alert('Updated Product'); </script>";
            echo "<script>window.location.href='create_product.php?table=".$_GET['table']."&&id=".$_GET['id']."'</script>";
        }
        else
        {
            echo "<script> alert('Product Not Updated'); </script>";
        }
    }
    
}
?>