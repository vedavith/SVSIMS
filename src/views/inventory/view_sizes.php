
<?php
$database = new Database();
$conn_object = $database->connect();

$tables = array();
$category = array();

$select_get_tables = "SELECT TABLE_NAME AS 'tables' FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA='dbsvsims' AND TABLE_NAME LIKE 'product_insert_%'";
$execute_select_get_tables = mysqli_query($conn_object,$select_get_tables) or die(mysqli_error($conn_object));
$row_count = mysqli_num_rows($execute_select_get_tables);
$i = 0;
while($result_tables = mysqli_fetch_array($execute_select_get_tables))
{
    if($i <= $row_count-1)
    {
        $tables[$i] = $result_tables['tables'];
        $i++;
    }
    
}

$select_category_tables = "SELECT * FROM `category` ORDER BY `category`.`category` ASC";
$execute_select_category_tables = mysqli_query($conn_object,$select_category_tables) or die(mysqli_error($conn_object));
$row_count2 = mysqli_num_rows($execute_select_category_tables);
$j = 0;

while($result_category = mysqli_fetch_array($execute_select_category_tables))
{
    if($j <= $row_count2-1)
    {
        $category[$j] = $result_category['category'];
        $j++;
    }
}
?>


<?php
$query_array = array();
for($z = 0; $z <= count($tables)-1;$z++)
{
    $cmp = strcmp($tables[$z],"product_insert_".$category[$z]);
    if(!$cmp)
    {
        $query_array[$z] = "SELECT * FROM "."$tables[$z]".";";
    }
}
// echo "<pre>";
// print_r($query_array);
// echo "</pre>";
?>
<style>
@media only screen and (max-width: 400px) {
    #hide
    {
      display : none;
    }
}
</style>

<section>
    <div class="container">
    <div class="row">
    <div class="col-md-3">
    <h3>VIEW ALL SIZES </h3>
    </div>
    <div class="col-md-6">
    </div>
    <div class="col-md-3">
    <?php
    if (isset($_GET['db'])) 
    {
       $home = $_GET['db']; 
    ?>
      <a href="../src/home.php" class="btn btn-outline-danger"> Back </a>
    <?php
    }
    else
    {
    ?>
      <a href="../src/create_product.php" class="btn btn-outline-danger"> Back </a>
    <?php  
    }
    ?>
    </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-6">
        <select class="form-control" id="category">
          <option value=""> Select Category </option>
  <?php
      for($c=0;$c<=count($category)-1;$c++)
      {
        echo "<option value='".$category[$c]."'>".$category[$c]."</option>";
      }
   ?>
      </select>
    </div>
    
    </div><br>
    <div class="output">
    <div class="col-md-6">
              <h3 id="heading"></h3>
          </div><br>
      <?php
      for($x=0; $x <= count($query_array)-1; $x++)
      {
      ?>
        <div class="row" id="<?php echo $category[$x]; ?>">
          
          <div class="colors <?php echo $category[$x]; ?>">
             <table class="table table-bordered table-hover">
                <thead align="center">
                      <th> S.No </th>
                      <th> Type </th>
                      <th> SIZES </th>
                      <th> QUANTITY </th>
                      <th> NUMBERS </th>
                      <th id="hide"> STANDARD SECTION LENGTH</th>
                      <th id="hide"> STANDARD SECTION WEIGHT </th>
                      <th id="hide"> SECTION WEIGHT/UNIT LENGTH (W/L) </th>
                      <th id="hide"> BRAND </th>
                      <th id="hide"> DESCRIPTION </th>
                  <?php
                      if((isset($_GET['db'])) && ($_SESSION['role'] == "user"))
                      {
                        
                        echo "";

                      }
                      else
                      {
                        
                  ?>  
                      <th> EDIT </th>
                      <th> DELETE </th>
                  <?php
                        
                      }
                  ?>    
              </thead>
              <?php
                  $execute_select_tab = mysqli_query($conn_object,$query_array[$x]) or die(mysqli_error($conn_object));
                        $a = 1;
                      while($result_tab = mysqli_fetch_array($execute_select_tab))
                      {
                        echo  "<tbody align='center'>";
                        echo  "<td>".$a."</td>";
                        echo  "<td>".$category[$x]."</td>";
                        if(isset($_GET['db']))
                        {
                        echo  "<td><a href='../src/reports.php?sizes=".$result_tab['sizes']."&&length=".$result_tab['sectionkgm']."&&brand=".$result_tab['brand']."&&table=".$category[$x]."'>".$result_tab['sizes']."</a></td>";
                        }
                        else
                        {
                          echo  "<td>".$result_tab['sizes']."</td>";
                        }
                        echo  "<td>".$result_tab['quantity']."</td>";
                        echo  "<td>".$result_tab['numbers']."</td>";
                        echo  "<td id='hide'>".$result_tab['sectionkgm']."</td>";
                        echo  "<td id='hide'>".$result_tab['sectionweight']."</td>";
                        echo  "<td id='hide'>".$result_tab['sectionunitweight']."</td>";
                        echo  "<td id='hide'>".$result_tab['brand']."</td>";
                        echo  "<td id='hide'>".$result_tab['description']."</td>";
                      if((isset($_GET['db'])) && ($_SESSION['role'] == "user"))
                      {
                       
                        echo  " ";

                      } 
                      else if((isset($_GET['db'])) && ($_SESSION['role'] != "user"))
                      {
                        
                        echo  "<td><a href='../src/create_product.php?table=".$category[$x]."&&id=".$result_tab['id']."&&db=".$home."' name='rec_edit' class='btn btn-sm btn-primary'> Edit </a> </td>";
                        echo  "<td><a href='../src/view_sizes.php?table=".$category[$x]."&&id=".$result_tab['id']."' class='btn btn-sm btn-danger'> Delete </a> </td>";
                        echo  "</tbody>";
                      } 
                      else{
                        echo  "<td><a href='../src/create_product.php?table=".$category[$x]."&&id=".$result_tab['id']."' name='rec_edit' class='btn btn-sm btn-primary'> Edit </a> </td>";
                        echo  "<td><a href='../src/view_sizes.php?table=".$category[$x]."&&id=".$result_tab['id']."' class='btn btn-sm btn-danger'> Delete </a> </td>";
                        echo  "</tbody>";
                      }
                        $a++;
                      }
                        echo "</table>";
                        echo "</div></div>";
                  }
              ?>

    </div>
  </div>
<br><br>
</div>
</div>
</section>

<script>
$(function() {
  $('.colors').hide();
  $('#category').change(function(){
    $('.colors').hide();
    $('.' + $('#category').val()).show();
    $('#heading').text($('#category').val());

  });
});
</script>

<?php
      if (isset($_GET['id']) && isset($_GET['table'])) 
      {
        //database_loader();
        $con_obj = new Database();
        $con = $con_obj->connect();
        $select_data = "DELETE FROM product_insert_".$_GET['table']." WHERE id ='".$_GET['id']."'";
        $execute_select_data = mysqli_query($con,$select_data) or die(mysqli_error($con));
        echo "<script>alert('Deleted')</script>";
        echo "<script> location.href='".url()."src/view_sizes.php';</script>";
      }
?>

