


<section>

  <div class="container">
    <div class="row">
        <div class="col-md-6" align="left" >
            <h3 style="margin-left: 20px;">  <?php echo $_POST['get_category']; ?> </h3>
        </div>
        <div class="col-md-6" align="right">
            <a href="manage_product.php" style="margin-right:16px;" class="btn btn-danger"> Back </a>
        </div>
    </div><br>
          <div class="col-md-12">

          <table class="table table-bordered table-hover">
                <thead align="center">
                    <tr>
                        <th>S.No </th>
                        <th>SIZES</th>
                        <th>QUANTITY (IN KGS)</th>
                        <th>NUMBERS</th>
                        <th>SECTION WEIGHT PER UNIT LENGTH(W/L)</th>
                        <th>SECTION LENGTH</th>
                        <th>SECTION WEIGHT </th>
                        <th>BRAND</th>
                        <th>PRODUCT DESCRIPTION</th>
                        <!-- <th>EDIT</th>
                        <th>DELETE</th> -->
                        <th>REPORTS</th>
                    <tr>
                </thead>
          <?php
          $con_object = new Database();
          $con = $con_object->connect();
          $select_products = "SELECT * FROM product_insert_".$_POST['get_category'].";";
          $execute_select_products = mysqli_query($con,$select_products) or die(mysqli_error($con));
          $i=1;
          while($get_result = mysqli_fetch_array($execute_select_products))
          {
        ?>


                    <tbody align="center">
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td> <?php echo $get_result['sizes']; ?> </td>
                            <td> <?php echo $get_result['quantity']; ?> </td>
                            <td> <?php echo $get_result['numbers']; ?> </td>
                            <td> <?php echo $get_result['sectionunitweight']; ?> </td>
                            <td> <?php echo $get_result['sectionkgm']; ?> </td>
                            <td> <?php echo $get_result['sectionweight']; ?> </td>
                            <td> <?php echo $get_result['brand']; ?> </td>
                            <td> <?php echo $get_result['description']; ?> </td>
                            <!-- <td><a class="btn btn-sm btn-outline-success" href="<?php //echo url()."src/create_product.php?update_id=".$get_result['id']."&&table=".$_POST['get_category']."" ?>">Edit</a>
                            <td><a class="btn btn-sm btn-outline-danger" href="<?php //echo url()."src/manage_product.php?id=".$get_result['id']."&&table=".$_POST['get_category']."" ?>">Delete</a> -->
                            <td><a name="reports" class="btn btn-sm btn-outline-primary" href="<?php echo url()."src/reports.php?sizes=".$get_result['sizes']."&&brand=".$get_result['brand']."&&table=".$_POST['get_category']."" ?>"> Reports </a>
                    <?php
        $i++;
        }
?>
</tr>
</tbody>
</table><br><br>

        </div>
        </div>

</section>
