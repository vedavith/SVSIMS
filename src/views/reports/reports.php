<?php
//Creating object for Database class
$database = new Database();
//calling connect() returns connection object
$conn_obj = $database->connect();
?>
<section>
  <div class="container">
  <div class="row">
    <div class="col-md-6" align="left">
      <h3> Quantity Added </h3>
    </div>
    <?php
    if(isset($_GET['length']) && isset($_GET['table']))
    {
    ?>
    <div class="col-md-6" align="right">
      <a href="view_sizes.php?db=home" class="btn btn-danger"> Back </a>
    </div>
    <?php
    }
    elseif(!isset($_GET['length']))
    {
    ?>
    <div class="col-md-6" align="right">
      <a href="manage_product.php" class="btn btn-danger"> Back </a>
    </div>
    <?php
    }
    else
    {
    ?>
    <div class="col-md-6" align="right">
      <a href="view_sizes.php" class="btn btn-danger"> Back </a>
    </div>
    <?php
    }
    ?>
  </div><br>
    <table class="table table-hover table-bordered">
      <thead align="center">
        <tr>
          <th> S.No </th>
          <th> Sizes </th>
          <th> Brand </th>
          <th> Quantity Added </th>
          <th> Numbers </th>
          <th> Time Stamp </th>
        </tr>
      </thead>
      <tbody align="center">
          <?php
                $total_amount_added = array();

                $select_product_update_add = "SELECT * FROM product_update_".$_GET['table']." WHERE sizes='".$_GET['sizes']."' AND brand='".$_GET['brand']."' AND addordel='a'";
                $execuete_select_product_update_add = mysqli_query($conn_obj,$select_product_update_add) or die(mysqli_error($conn_obj));
                $i = 1; $x = 0;
                while ($result = mysqli_fetch_array($execuete_select_product_update_add)) 
                {
                  $total_amount_added[$x] = (int)$result['quantity'];
                  
          ?>
              <tr>
                  <td> <?php echo $i;  ?> </td>
                  <td> <?php echo $result['sizes']; ?> </td>
                  <td> <?php echo $result['brand']; ?> </td>
                  <td> <?php echo $result['quantity']; ?> </td>
                  <td> <?php echo $result['numbers'];?> </td>
                  <td> <?php echo $result['time_stamp']; ?> </td>
              </tr>      
          <?php        
              $x++;
              $i++;  
              }
          ?>
      </tbody>
    </table>
  </div>
  <br>
  <div class="container">

    <div class="col-md-6">
      <h3> Quantity Deducted </h3>
    </div>

  <table class="table table-hover table-bordered">
      <thead align="center">
        <tr>
          <th> S.No </th>
          <th> Sizes </th>
          <th> Brand </th>
          <th> Quantity Deducted </th>
          <th> Numbers </th>
          <th> Time Stamp </th>
        </tr>
      </thead>
      <tbody align="center">
          <?php
                $total_amount_deducted = array();

                $select_product_update_del = "SELECT * FROM product_update_".$_GET['table']." WHERE sizes='".$_GET['sizes']."' AND brand='".$_GET['brand']."' AND addordel='d'";
                $execuete_select_product_update_del = mysqli_query($conn_obj,$select_product_update_del) or die(mysqli_error($conn_obj));
                $i = 1; $x = 0;
                while ($result = mysqli_fetch_array($execuete_select_product_update_del)) 
                {
                  $total_amount_deducted[$x] = (int)$result['quantity'];
          ?>
              <tr>
                  <td> <?php echo $i;  ?> </td>
                  <td> <?php echo $result['sizes']; ?> </td>
                  <td> <?php echo $result['brand']; ?> </td>
                  <td> <?php echo $result['quantity']; ?> </td>
                  <td> <?php echo $result['numbers']; ?> </td>
                  <td> <?php echo $result['time_stamp']; ?> </td>
              </tr>      
          <?php       
              $x++; 
              $i++;  
              }
          ?>
      </tbody>
    </table>
    <?php
    $current_quantity = 0;
    $quantity_added = 0;
    $quantity_deducted = 0;

    for($i=0; $i <= count($total_amount_added); $i++)
    {
        $quantity_added = $quantity_added + $total_amount_added[$i];
    }

    for($i=0; $i <= count($total_amount_deducted); $i++)
    {
        $quantity_deducted = $quantity_deducted + $total_amount_deducted[$i];
    }
    ?>
    <div class="col-md-6">
      <h4> Remaining quantity: <?php echo $current_quantity = $quantity_added - $quantity_deducted; ?> (In KGS) </h4>
    </div>
  </div><br><br><br>
</section>

