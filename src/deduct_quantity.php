<?php
    require '../config/autoloader.php';
    require '../config/html_lib.php';
    require '../config/redirect.php';
    require '../config/load_models.php';
    session_start();
if($_SESSION['role'] == "superadmin" || $_SESSION['role'] == "admin" || $_SESSION['role'] == "user" )
{
?>
?>
<html>
  <head>
    <?php
      load_bootstrap();
      ?>
  </head>
<body>
<?php
form_open("POST");
echo "<section class='fixed-top'>";
render_view("headers","header1");
render_view("headers","header");
echo "</section>";
form_close();
if(!(isset($_POST['submit_category'])))
{
//form open
form_open("POST");
echo "<br><br><br><br><br><br><br><br>";
render_view("inventory","deduct_category");
render_view("headers","footer");
form_close();
}
elseif(isset($_POST['get_category']))
{
  if($_POST['get_category'] == "")
  {
    echo "<script> alert('Please Select Valid Category'); </script>";
    echo "<script> window.location.href='".url()."/src/deduct_quantity.php'; </script>";
  }
  else
  {
    form_open("POST");
    render_view("headers","header");
    echo "<br><br><br><br>";
    // $con_object = new Database();
    // $con = $con_object->connect();
    render_view("inventory","deduct_quantity");
    render_view("headers","footer");
    form_close();
  }
}
else
{
  render_view("headers","header");
  //calling footer.php
  render_view("headers","footer");
  //form close
  form_close();
}
 ?>
 <script>
 $(document).ready(function(){
 var get_category = "<?php echo url()."src/get_json/category.json"; ?>";
 var get_brand = "<?php echo url(),"src/get_json/brand.json"; ?>";

    $.getJSON(get_category, function (data) {
      var str = "#select_category";
                $.each(data, function (index, value) {
                        $(str).append('<option value="' + value.category + '">' + value.category + '</option>');
                    });
                });
     $.getJSON(get_brand, function (data) {
       var str = "#select_brand";
                 $.each(data, function (index, value) {
                        $(str).append('<option value="' + value.brand + '">' + value.brand + '</option>');
                     });
               });
 });
 </script>

</body>
</html>

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
 if(isset($_POST['update_quantity']))
 {
  
  // echo $test = $selectmodel->add_num();
  
  database_loader();
  $conn_object = new Database();
  $con_str = $conn_object->connect();
  

  load_model('SelectModel');
  $selectmodel = new SelectModel();
  //print_r($selectmodel);

  $validate_parmeters = array("sizes"=>$_POST['selected_product'],"brand"=>$_POST['selected_brand'],"sectionkgm"=>$_POST['selected_spl']);  
  $check1 = $selectmodel->selectUniqueProduct($con_str,$_POST['update_table'],$validate_parmeters); 
  
  if(!$check1)
  {
    $conn_obj2 = new Database();
    $conn = $conn_obj2->connect();
    $update_product_quantity = "CALL DeleteQuantity('".$_POST['update_table']."','".$_POST['selected_product']."',".$_POST['quantity'].",'".$_POST['selected_brand']."','".$_POST['selected_spl']."',".$_POST['numbers'].")";
    $execute_update_product_quantity = mysqli_query($conn,$update_product_quantity) or die(mysqli_error($conn));
    if($execute_update_product_quantity)
    {
      echo "<script> alert('Updated'); </script>";
    }
    mysqli_close($conn);
  }
  else
  {
    echo '<h3>Product Does Not Exist</h3>';
  }
 }?>
