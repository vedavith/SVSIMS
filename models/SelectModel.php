<?php
 class SelectModel
 {
     function select_master($conn_object,$db_name)
     {
        $arr_data = array();
        $select_tables = "CALL SelectTables('".$db_name."')";
        $execute_select = mysqli_query($conn_object,$select_tables) or die(mysqli_error($conn_object));
        $i = 0;
        while($result = mysqli_fetch_assoc($execute_select))
        {
            $arr_data[$i] = $result;
            $i++;
        }
        return $arr_data;
     }

     function selectUniqueProduct($conn_object,$table_name,$validate_array)
     {
        $count = NULL;

        $get_count = "CALL SelectUniqueProduct('".$table_name."','".$validate_array['sizes']."','".$validate_array['brand']."','".$validate_array['sectionkgm']."');";
        $execute_get_count = mysqli_query($conn_object,$get_count) or die(mysqli_error($conn_object));
        $get_result = mysqli_fetch_array($execute_get_count);
        mysqli_close($conn_object);
        if($get_result[0] == 0)
        {
          $count = 1;
        }
        else
        {
          $count = 0;
        }
        return $count;
     }
     function select_product_list($conn_object,$table_name)
     {
       $data_array = array();
       $select_product = "CALL SelectProductList('".$table_name."')";
       $execute_select_product = mysqli_query($conn_object,$select_product) or die(mysqli_error($conn_object));
       $i = 0;
       while($get_data = mysqli_fetch_assoc($execute_select_product))
       {
         $data_array[$i] = $get_data;
         $i++;
       }
       return $get_data;
     }
     
     function add_num()
     {
        return 10+20;
     }
 }
