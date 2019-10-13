<?php

function header_buttons()
{
    if(isset($_POST['home']))
    {
       // echo "<script> alert('".$_POST['home']."'); </script>";
        echo "<script> window.location.href='".url()."src/".$_POST['home'].".php';</script>";
    }
    if(isset($_POST['masters']))
    {
      //  echo "<script> alert('".$_POST['masters']."'); </script>";
        echo "<script> window.location.href='".url()."src/".$_POST['masters'].".php';</script>";
    }
    if(isset($_POST['manage_inventory']))
    {
       // echo "<script> alert('".$_POST['manage_inventory']."'); </script>";
        echo "<script> window.location.href='".url()."src/".$_POST['manage_inventory'].".php';</script>";
    }
    if(isset($_POST['user_details']))
    {
       // echo "<script> alert('".$_POST['user_details']."'); </script>";
        echo "<script> window.location.href='".url()."src/".$_POST['user_details'].".php';</script>";
    }
    if(isset($_POST['reports']))
    {
       // echo "<script> alert('".$_POST['reports']."'); </script>";
        echo "<script> window.location.href='".url()."src/".$_POST['reports'].".php';</script>";
    }
    if(isset($_POST['logout']))
    {
            session_unset();
			session_destroy();
            //echo "<script> alert('".$_SESSION['email_id']."'); </script>";
			echo "<script>window.location='".url()."src/index.php';</script>";
       
        
    }
}


function inventory_buttons()
{
  if(isset($_POST['create_product']))
  {
     // echo "<script> alert('".$_POST['create_product']."'); </script>";
      echo "<script> window.location.href='".url()."src/".$_POST['create_product'].".php';</script>";
  }

  if(isset($_POST['add_quantity']))
  {
     // echo "<script> alert('".$_POST['add_quantity']."'); </script>";
      echo "<script> window.location.href='".url()."src/".$_POST['add_quantity'].".php';</script>";
  }

  if(isset($_POST['deduct_quantity']))
  {
     // echo "<script> alert('".$_POST['deduct_quantity']."'); </script>";
      echo "<script> window.location.href='".url()."src/".$_POST['deduct_quantity'].".php';</script>";
  }

  if(isset($_POST['manage_product']))
  {
    //  echo "<script> alert('".$_POST['manage_product']."'); </script>";
      echo "<script> window.location.href='".url()."src/".$_POST['manage_product'].".php';</script>";
  }
}
?>
