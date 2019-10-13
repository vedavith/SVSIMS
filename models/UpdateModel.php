<?php
class UpdateModel
{
    function updateProduct($conn_object,$table_name,$data_array,$id)
    {
        $update_product = "CALL UpdateProduct('".$table_name."','".$data_array['sizes']."',".$data_array['numbers'].",'".$data_array['sectionkgm']."','".$data_array['sectionweight']."','".$data_array['brand']."','".$data_array['description']."','".$data_array['sectionunitweight']."',".$id.")";
      $execute_update_product = mysqli_query($conn_object,$update_product) or die(mysqli_error($conn_object));
      if($execute_update_product)
      {
        return 1;
      }
      else
      {
        return 0;
      }
    }
}
?>