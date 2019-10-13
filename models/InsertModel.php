<?php

class InsertModel
{
    function InsertUserType($conn_object,$post_value)
    {
        if($post_value != "")
        {

            $insert_user = "CALL InsertUserType('".$post_value."')";
            $execute_insert_user = mysqli_query($conn_object,$insert_user) or die(mysqli_error($conn_object));
            $result = mysqli_affected_rows($conn_object);

            if($result > 0)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }
        else
        {
            echo "<script> alert('Enter Valid Value'); </script>";
        }
    }

    function InsertUserRole($conn_object,$post_value)
    {
        if($post_value != "")
        {
            $insert_role = "CALL InsertUserRole('".$post_value."')";
            $execute_insert_role = mysqli_query($conn_object,$insert_role) or die(mysqli_error($conn_object));
            $result = mysqli_affected_rows($conn_object);
            if($result > 0)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }
        else
        {
            echo "<script> alert('Enter Valid Value'); </script>";
        }
    }

    function InsertBrand($conn_object,$post_value)
    {
        if($post_value != "")
        {
            $insert_brand = "CALL InsertBrand('".$post_value."')";
            $execute_insert_brand = mysqli_query($conn_object,$insert_brand) or die(mysqli_error($conn_object));
            $result = mysqli_affected_rows($conn_object);
            if($result > 0)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }
        else
        {
            echo "<script> alert('Enter Valid Value'); </script>";
        }
    }

    function InsertCategory($conn_object,$post_value)
    {
        if($post_value != "")
        {
            $return_value = 0;
            echo $insert_category = "CALL InsertCategory('".$post_value."')";
            $execute_insert_category = mysqli_query($conn_object,$insert_category) or die(mysqli_error($conn_object));
            $result = mysqli_affected_rows($conn_object);
            if($result > 0)
            {
                return $return_value++;
            }
            else
            {
                return $return_value;
            }
        }
        else
        {
            echo "<script> alert('Enter Valid Value'); </script>";
        }
    }

    function InsertSectionLength($conn_object,$post_value)
    {
        if($post_value != "")
        {
            echo $insert_category = "CALL InsertSectionLength('".$post_value."')";
            $execute_insert_category = mysqli_query($conn_object,$insert_category) or die(mysqli_error($conn_object));
            $result = mysqli_affected_rows($conn_object);
            if($result > 0)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }
        else
        {
            echo "<script> alert('Enter Valid Value'); </script>";
        }
    }

    // function InsertSectionUnitWeight($conn_object,$post_value)
    // {
    //   if($post_value != "")
    //   {
    //       echo $insert_section_unit_weight = "CALL InsertSectionUnitWeight('".$post_value."')";
    //       $execute_insert_section_unit_weight = mysqli_query($conn_object,$insert_section_unit_weight) or die(mysqli_error($conn_object));
    //       $result = mysqli_affected_rows($conn_object);
    //       if($result > 0)
    //       {
    //           return 1;
    //       }
    //       else
    //       {
    //           return 0;
    //       }
    //   }
    //   else
    //   {
    //       echo "<script> alert('Enter Valid Value'); </script>";
    //   }
    // }

    function InsertStandardSectionWeight($conn_object,$post_value)
    {
      if($post_value != "")
      {
          echo $insert_standard_section_weight = "CALL InsertStandardSectionWeight('".$post_value."')";
          $execute_insert_standard_section_weight = mysqli_query($conn_object,$insert_standard_section_weight) or die(mysqli_error($conn_object));
          $result = mysqli_affected_rows($conn_object);
          if($result > 0)
          {
              return 1;
          }
          else
          {
              return 0;
          }
      }
      else
      {
          echo "<script> alert('Enter Valid Value'); </script>";
      }
    }

    function InsertNewProducts($conn_object,$table_name,$data_array)
    {
           $insert_product = "CALL ProductInsert('".$table_name."','".$data_array['sizes']."',".$data_array['quantity'].",".$data_array['numbers'].",".$data_array['sectionkgm'].",".$data_array['sectionweight'].",'".$data_array['brand']."','".$data_array['description']."','".$data_array['sectionunitweight']."')";
            $execute_insert_product = mysqli_query($conn_object,$insert_product) or die(mysqli_error($conn_object));
            if($execute_insert_product)
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
