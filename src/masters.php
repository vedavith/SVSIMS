<?php
    require '../config/autoloader.php';
    require '../config/html_lib.php';
    require '../config/redirect.php';
    require '../config/load_models.php';
    session_start();
if($_SESSION['role'] == "superadmin" || $_SESSION['role'] == "admin" )
{
?>
<html>
    <head>
        <?php load_bootstrap(); ?>
    </head>
<body>
<?php
//form open
form_open("POST");

echo "<section class='fixed-top'>";
//calling header.php
render_view("headers","header1");
render_view("headers","header");
echo "</section>";

echo "<br><br><br><br><br><br><br><br><br>";
//write what ever you want here
render_view("masters","master");

//form close
form_close();

//calling footer.php
render_view("headers","footer");
?>
<!-- SUBMIT BUTTONS -->
<?php
$connect = new Database();

if(isset($_POST['insert_type']))
{
    $conn0 = $connect->connect();
    $check_duplicates = "CALL CheckDuplicate('".$_POST['insert_type']."','".$_POST['user_type']."');";
    $execute_check_duplicates = mysqli_query($conn0,$check_duplicates) or die(mysqli_error($conn0));
    $result = mysqli_fetch_array($execute_check_duplicates);
    mysqli_close($conn0);
    if($result['count'] != 0)
    {
      echo "<script> alert('Value Exists'); </script>";
    }
    else
    {
      $conn = $connect->connect();
      load_model("InsertModel");
      $InsertModel = new InsertModel();
      $x = $InsertModel -> InsertUserType($conn,$_POST['user_type']);

      if($x > 0)
      {
          echo "<script> alert('Inserted'); </script>";
      }
      else
      {
          echo "<script> alert('Not Inserted'); </script>";
      }
    }

}

if(isset($_POST['insert_role']))
{
  $conn0 = $connect->connect();
  $check_duplicates = "CALL CheckDuplicate('".$_POST['insert_role']."','".$_POST['user_role']."');";
  $execute_check_duplicates = mysqli_query($conn0,$check_duplicates) or die(mysqli_error($conn0));
  $result = mysqli_fetch_array($execute_check_duplicates);
  mysqli_close($conn0);
  if($result['count'] != 0)
  {
    echo "<script> alert('Value Exists'); </script>";
  }
  else
  {
    $conn = $connect->connect();
    load_model("InsertModel");
    $InsertModel = new InsertModel();
    $x = $InsertModel -> InsertUserRole($conn,$_POST['user_role']);
    if($x > 0)
    {
        echo "<script> alert('Inserted'); </script>";
    }
    else
    {
        echo "<script> alert('Not Inserted'); </script>";
    }
  }
}
if(isset($_POST['insert_brand']))
{
  $conn0 = $connect->connect();
  $check_duplicates = "CALL CheckDuplicate('".$_POST['insert_brand']."','".$_POST['brand']."');";
  $execute_check_duplicates = mysqli_query($conn0,$check_duplicates) or die(mysqli_error($conn0));
  $result = mysqli_fetch_array($execute_check_duplicates);
  mysqli_close($conn0);
  if($result['count'] != 0)
  {
    echo "<script> alert('Value Exists'); </script>";
  }
  else
  {
    $conn = $connect->connect();
    load_model("InsertModel");
    $InsertModel = new InsertModel();
    $x = $InsertModel -> InsertBrand($conn,$_POST['brand']);
    if($x > 0)
    {
        echo "<script> alert('Inserted'); </script>";
    }
    else
    {
        echo "<script> alert('Not Inserted'); </script>";
    }
  }
}

if(isset($_POST['insert_category']))
{
  $conn0 = $connect->connect();
  $check_duplicates = "CALL CheckDuplicate('".$_POST['insert_category']."','".$_POST['category']."');";
  $execute_check_duplicates = mysqli_query($conn0,$check_duplicates) or die(mysqli_error($conn0));
  $result = mysqli_fetch_array($execute_check_duplicates);
  mysqli_close($conn0);
  if($result['count'] != 0)
  {
    echo "<script> alert('Value Exists'); </script>";
  }
  else
  {
    $conn = $connect->connect();
    load_model("InsertModel");
    $InsertModel = new InsertModel();
    $x = $InsertModel -> InsertCategory($conn,$_POST['category']);
    echo $x;
    if($x > 0)
    {
        echo "<script> alert('Inserted'); </script>";
    }
    else
    {
        echo "<script> alert('Not Inserted'); </script>";
    }
  }
}

if(isset($_POST['insert_slw']))
{
  $conn0 = $connect->connect();
  $check_duplicates = "CALL CheckDuplicate('".$_POST['insert_slw']."','".$_POST['section_weight_length']."');";
  $execute_check_duplicates = mysqli_query($conn0,$check_duplicates) or die(mysqli_error($conn0));
  $result = mysqli_fetch_array($execute_check_duplicates);
  mysqli_close($conn0);
  if($result['count'] != 0)
  {
    echo "<script> alert('Value Exists'); </script>";
  }
  else
  {
    $conn = $connect->connect();
    load_model("InsertModel");
    $InsertModel = new InsertModel();
    $x = $InsertModel -> InsertSectionLength($conn,$_POST['section_weight_length']);
    if($x > 0)
    {
        echo "<script> alert('Inserted'); </script>";
    }
    else
    {
        echo "<script> alert('Not Inserted'); </script>";
    }
  }
}


if(isset($_POST['insert_ssw']))
{
  $conn0 = $connect->connect();
  $check_duplicates = "CALL CheckDuplicate('".$_POST['insert_ssw']."','".$_POST['standard_sectiont_weight']."');";
  $execute_check_duplicates = mysqli_query($conn0,$check_duplicates) or die(mysqli_error($conn0));
  $result = mysqli_fetch_array($execute_check_duplicates);
  mysqli_close($conn0);
  if($result['count'] != 0)
  {
    echo "<script> alert('Value Exists'); </script>";
  }
  else
  {
    $conn = $connect->connect();
    load_model("InsertModel");
    $InsertModel = new InsertModel();
    $x = $InsertModel -> InsertStandardSectionWeight($conn,$_POST['standard_sectiont_weight']);
    if($x > 0)
    {
      echo "<script> alert('Inserted'); </script>";
    }
    else
    {
      echo "<script> alert('Not Inserted'); </script>";
    }
  }
}

?>

<?php
/**
 * MANAGE BUTTONS CODE FOR MASTERS
 **/
if(isset($_POST['manage_type']))
{
   // echo "<script> alert('".$_POST['manage_type']."'); </script>";
    redirect_page("manage_masters",$_POST['manage_type']);
}

if(isset($_POST['manage_role']))
{
   // echo "<script> alert('".$_POST['manage_role']."'); </script>";
    redirect_page("manage_masters",$_POST['manage_role']);
}

if(isset($_POST['manage_brand']))
{
   // echo "<script> alert('".$_POST['manage_brand']."'); </script>";
    redirect_page("manage_masters",$_POST['manage_brand']);
}

if(isset($_POST['manage_category']))
{
    //echo "<script> alert('".$_POST['manage_category']."'); </script>";
    redirect_page("manage_masters",$_POST['manage_category']);
}

if(isset($_POST['manage_slw']))
{
   // echo "<script> alert('".$_POST['manage_slw']."'); </script>";
    redirect_page("manage_masters",$_POST['manage_slw']);
}

// if(isset($_POST['manage_suw']))
// {
//     echo "<script> alert('".$_POST['manage_suw']."'); </script>";
//     redirect_page("manage_masters",$_POST['manage_suw']);
// }

if(isset($_POST['manage_ssw']))
{
   // echo "<script> alert('".$_POST['manage_ssw']."'); </script>";
    redirect_page("manage_masters",$_POST['manage_ssw']);
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
require '../config/create_json.php';

//CREATING JSON FILES FOR MASTER TABLES
$secondary_connect = new Database();
$get_connect = $secondary_connect -> connect();

//calling functions that create json files
create_json($get_connect);
?>
