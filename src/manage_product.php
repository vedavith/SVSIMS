<?php
    require '../config/autoloader.php';
    require '../config/html_lib.php';
    require '../config/redirect.php';
    require '../config/load_models.php';
    session_start();
if($_SESSION['role'] == "superadmin" || $_SESSION['role'] == "admin" || $_SESSION['role'] == "user")
{
?>
<html>
  <head>
    <?php load_bootstrap(); ?>
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
  echo "<br><br><br><br><br><br><br><br><br>";
  render_view("inventory","set_product");
  render_view("headers","footer");
  form_close();
}
elseif(isset($_POST['get_category']))
{
  form_open("POST");
  render_view("headers","header");
  echo "<br><br><br><br><br><br>";
  render_view("inventory","manage_product");
  render_view("headers","footer");
  form_close();
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
 

    $.getJSON(get_category, function (data) {
      var str = "#select_category";
                $.each(data, function (index, value) {
                        $(str).append('<option value="' + value.category + '">' + value.category + '</option>');
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
     header_buttons();
 ?>
<?php
      if (isset($_GET['id']) && isset($_GET['table'])) 
      {
        //database_loader();
        $con_obj = new Database();
        $con = $con_obj->connect();
        $select_data = "DELETE FROM product_insert_".$_GET['table']." WHERE id ='".$_GET['id']."'";
        $execute_select_data = mysqli_query($con,$select_data) or die(mysqli_error($con));
        echo "<script>alert('Deleted')</script>";
        echo "<script> location.href='".url()."src/manage_product.php';</script>";
      }
?>
<?php
}
else
{
    require '../404.php';
    echo "<script> window.location='".url()."src' </script>";
}
?>