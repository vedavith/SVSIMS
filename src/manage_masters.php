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
        <?php
            load_bootstrap();
        ?>
    </head>
    <?php
        $database = new Database();
        $conn_object = $database -> connect();

        load_model("SelectModel");

        $selectdata = new SelectModel();
        $test = $selectdata->select_master($conn_object,$_GET['db']);

    ?>
    <body>
    <br><br><br><br>
        <?php
            form_open("POST");
            echo "<section class='fixed-top'>";
            render_view("headers","header1");
            render_view("headers","header");
            echo "</section>";
        ?>
        <br><br><br><br>
    <div class="container">
    <div class="row">
        <div class="col-md-6" align="left">
       <h5>
       <?php
            if($_GET['db'] == "user_type")
            {
                $table_type = "USER TYPE";
            }
            elseif ($_GET['db'] == "user_role")
            {
                $table_type = "USER ROLE";
            }
            elseif($_GET['db'] == "brand")
            {
                $table_type = "BRAND";
            }
            elseif($_GET['db'] == "category")
            {
                $table_type = "CATEGORY";
            }
            elseif($_GET['db'] == "section_weight_length")
            {
                  $table_type  = "STANDARD SECTION LENGTH";
            }
            // elseif($_GET['db'] == "$section_unit_weight")
            // {
            //     echo    "<td>".$section_unit_weight."</td>";
            // }
            else
            {
                  $table_type =  "STANDARD SECTION WEIGHT";
            }
       ?>
        MANAGE <?php echo $table_type; ?> </h5>
        </div>
        <div class="col-md-6" align="right">
        <a class="btn btn-danger" href="<?php echo url()."src/masters.php"?>"> Back </a>
        </div>
    </div>
    <?php
    if(isset($_GET['db']) && isset($_GET['update_id']))
    {
        $value = "";

        $database = new Database();
        $conn_object = $database -> connect();
         $select_data = "CALL SelectDataId('".$_GET['db']."',".$_GET['update_id'].")";
        $execute_select_data = mysqli_query($conn_object,$select_data) or die(mysqli_error($conn_object));
        $result = mysqli_fetch_array($execute_select_data);
         "<script> alert('".json_encode($result)."') </script>";
        extract($result);

        if($_GET['db'] == "user_type")
        {
            $value = $user_type;
        }
        elseif ($_GET['db'] == "user_role")
        {
            $value = $user_role;
        }
        elseif($_GET['db'] == "brand")
        {
            $value = $brand;
        }
        elseif($_GET['db'] == "category")
        {
            $value = $category;
        }
        elseif($_GET['db'] == "section_weight_length")
        {
            $value = $section_weight_length;
        }
        // elseif($_GET['db'] == "section_unit_weight")
        // {
        //     $value = section_unit_weight;
        // }
        else
        {
            $value = $standard_section_weight;
        }
?>
        <div class="row">
            <div class="col-md-4">
                <input type="hidden" class="form-control" name="old_value" value=" <?php echo $value; ?>">
                <input type="text" class="form-control" name = "update_value" value="<?php echo $value; ?>">
                <input type="hidden" class="form-control" name="get_db" value="<?php echo $_GET['db'];?>">
                <input type="hidden" class="form-control" name="get_id" value="<?php echo $_GET['update_id'];?>">
            </div>
            <div class="col-md-4">
                <div class="col-md-6" align="left">
                    <input type = "submit" class="btn btn-outline-primary" name="update_data" value="Update">
                 </div>
            </div>
            <div class="col-md-4"></div>
        </div>

<?php
            /**
             *
             * UPDATE DATA
             *
             */
            if(isset($_POST['update_data']))
            {
                //GET db Value

                $get_database = $_POST['get_db'];
               $trim_old_value = trim($_POST['old_value']);
                $trim_old_value;

                $get_mysql_driver = new Database();

                $conn =  $get_mysql_driver -> mysql_connection_string();
                $use_database = mysql_select_db("dbsvsims");

                if($get_database == 'category')
                {
                    $create_alter = "CALL AlterProductTable('".$trim_old_value."','".$_POST['update_value']."')";
                    $execute_alter = mysql_query($create_alter) or die(mysql_error());
                }

                $create_update = "CALL UpdateTables('".$_POST['get_db']."','".$_POST['update_value']."',".$_POST['get_id'].")";
                $execute_update = mysql_query($create_update) or die(mysql_error());
                $get_changed_rows = mysql_affected_rows();
                echo "<script>alert('Succesfully Updated');</script>";
                echo "<script> window.location.href = '".url()."src/manage_masters.php?db=".$_GET['db']."'</script>";
                mysql_close();
            }
    }
?>


<br><br>
        <table class="table table-bordered table-hover">
    <?php

        echo "<thead align='center'>";
        echo    "<th> S.No </th>";
        if($_GET['db'] == "user_type")
        {
            echo    "<th> USER TYPE</th>";
        }
        elseif($_GET['db'] == "user_role")
        {
            echo    "<th> USER ROLE</th>";
        }
        elseif($_GET['db'] == "brand")
        {
            echo    "<th> BRAND</th>";
        }
        elseif($_GET['db'] == "category")
        {
            echo    "<th> CATEGORY </th>";
        }
        elseif($_GET['db'] == "section_weight_length")
        {
            echo    "<th> STANDARD SECTION LENGTH </th>";
        }
        // elseif($_GET['db'] == "$section_unit_weight")
        // {
        //     echo    "<td>".$section_unit_weight."</td>";
        // }
        else
        {
             echo    "<th> STANDARD SECTION WEIGHT </th>";
        }

        echo    "<th> EDIT </th>";
        echo    "<th> DELETE</th>";
        echo "</thead>";
        echo "<tbody align='center'>";
        $i = 1;
        foreach($test as $product)
        {
            extract($product);
            echo "<tr>";
            echo    "<td>".$i."</td>";

            if($_GET['db'] == "user_type")
            {
                echo    "<td>".$user_type."</td>";
            }
            else if($_GET['db'] == "user_role")
            {
                echo    "<td>".$user_role."</td>";
            }
            else if($_GET['db'] == "brand")
            {
                echo    "<td>".$brand."</td>";
            }
            else if($_GET['db'] == "category")
            {
                echo    "<td>".$category."</td>";
            }
            elseif($_GET['db'] == "section_weight_length")
            {
                echo    "<td>".$section_weight_length."</td>";
            }
	          // elseif($_GET['db'] == "$section_unit_weight")
	          // {
		        //     echo    "<td>".$section_unit_weight."</td>";
            // }
            else
            {
                 echo    "<td>".$standard_section_weight."</td>";
            }
            echo    "<td> <a class='btn btn-sm btn-primary' href='".url()."src/manage_masters.php?db=".$_GET['db']."&&update_id=".$id."'> Edit </button></td>";
            echo    "<td> <a class='btn btn-sm btn-danger' href='".url()."src/manage_masters.php?db=".$_GET['db']."&&delete_id=".$id."'> Delete </button></td>";
            echo "</tr>";
            $i++;
        }
        echo "</tbody>";
    ?>
        </table><br><br>
    </div>
<?php
    form_close();
    render_view("headers","footer");
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
 /**
  *
  * DELETE DATA
  *
  */
 if(isset($_GET['delete_id']))
 {
     $get_mysql_driver = new Database();
     $conn = $get_mysql_driver->mysql_connection_string();
     $use_database = mysql_select_db("dbsvsims");

     if($_GET['db'] == 'category')
     {
          echo $select_data = "SELECT category FROM category WHERE id='".$_GET['delete_id']."'";
          $execute_select_data = mysql_query($select_data) or die(mysql_error());
          $result = mysql_fetch_array($execute_select_data);
          echo json_encode($result);
         $drop_table = "CALL DropProductTables('".$result['category']."')";
         $execute_drop_table = mysql_query($drop_table) or die(mysql_error());
     }

     $delete_data = "CALL DeleteData('".$_GET['db']."',".$_GET['delete_id'].")";
     $execute_delete_data = mysql_query($delete_data) or die(mysql_error());

     echo "<script> alert('Deleted'); </script>";
     echo "<script> window.location.href = '".url()."src/manage_masters.php?db=".$_GET['db']."'</script>";
     mysql_close();

 }

 ?>
