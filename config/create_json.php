<?php
function create_json($connect_string)
{
  $get_tables = "SELECT TABLE_NAME AS 'tables' FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA='dbsvsims' AND TABLE_NAME NOT LIKE 'product_%'";
  $execute_get_tables = mysqli_query($connect_string,$get_tables) or die(mysqli_error($connect_string));

  while($result = mysqli_fetch_array($execute_get_tables))
  {
    $data_array = array();

    $get_data = "SELECT * FROM ".$result['tables'];
    $execute_get_data = mysqli_query($connect_string,$get_data) or die(mysqli_error($connect_string));
    while ($result_set = mysqli_fetch_assoc($execute_get_data))
    {
      $data_array[] = $result_set;
     for($count = 0;;)
     {
        if($count == 0)
        {
          $file_path = "../src/get_json/".$result['tables'].".json";
          
          if(file_exists($file_path))
          {
            $delete_old = unlink($file_path) or die("Unable to delete");
          }

          $myfile = fopen($file_path, "w") or die("Unable to open file");
          $test = fwrite($myfile, json_encode($data_array));

          $test = fclose($myfile);
          $count++;
          break;
        }
     }
   }
  }
}
 ?>
