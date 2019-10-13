<style>
 .bg-light {
  background: #c0d3e8 !important;
  overflow: hidden;

}
</style>
<?php
if(isset($_GET['id'])&& isset($_GET['table']))
{
          //Super Query
          $con_object = new Database();
          $con = $con_object->connect();
          $select_using_get = "SELECT * FROM product_insert_".$_GET['table']." WHERE id='".$_GET['id']."';";
          $execute_select_using_get = mysqli_query($con,$select_using_get) or die(mysqli_error($con));
          $get_values = mysqli_fetch_array($execute_select_using_get);
}
?>

<section>

<div class="container" >
   <div class="container card bg-light text-center col-sm-10">

      <br><div class="row">
       <div class="col-md-6" align="left">


       <?php
       if(isset($_GET['id'])&& isset($_GET['table']))
       {
       ?>
        <h3> Edit Size </h3>
       <?php
       }
       else
       {
       ?>
       <h3> Create New Size </h3>
        <!-- <div class="col-md-6" align="right">
         <a href="manage_product.php" name="manage_product" class="btn btn-outline-warning"> Manage </a>
       </div> -->

      <?php
       }
      ?>
      </div>
      <?php
       if(!isset($_GET['id'])&& !isset($_GET['table']))
       {
       ?>
      <div class="col-md-3" align="right">
<button type="submit" class="btn btn-primary text-white" name="view_all" style="margin-right: -205px;">View All Sizes</button>
</div>
<?php
       }
       ?>
       </div>


        <div class="card-body" style="text-align:left;">
              <div class="row">
                <div class="col-md-6">
                <?php
                if(isset($_GET['id'])&& isset($_GET['table']))
                {
                ?>
                   <label>Category</label>
                  <input type="text" title="Category" class="form-control" value="<?php echo $_GET['table']; ?>" readonly>
                <?php
                }
                else
                {
                ?>
                <label>Category</label>
                <select class="form-control" id="select_category" name="get_category">

                  <option value=""> Select Category </option>
                </select>
                <?php
                }
              ?>
              </div>
              <?php
                if(isset($_GET['id'])&& isset($_GET['table']))
                {
              ?>

              <div class="col-md-6">
                <label>Brand</label>
                  <select class="form-control" name="get_brand" title="Brand">
              <?php
                  $conn_str = new Database();
                  $con = $conn_str->connect();
                  $select_brand = "CALL SelectTables('brand')";
                  $execute_select_brand = mysqli_query($con,$select_brand) or die(mysqli_error($con));
                  while($result = mysqli_fetch_array($execute_select_brand))
                  {
                ?>
                    <option value="<?php echo $result['brand'];?>" <?php if($result['brand'] == $get_values['brand']){echo "selected";} ?> > <?php echo $result['brand']; ?> </option>
              <?php
                  }
              ?>
              </select>
                </div>
                </div><br>
                <?php
                }
                else
                {
              ?>
              <div class="col-md-6">
                   <label align="left">Brand</label>
                <select class="form-control" id="select_brand" name="get_brand">
                  <option value=""> Select Brand  </option>
                </select>
                </div>
                </div><br>
                <?php
                }
                ?>

              <div class="row">
                <div class="col-md-6">
                <label>Sizes</label>
                  <input type="text"  class="form-control" title="Sizes"  name="product_size" <?php if(isset($_GET['id'])&& isset($_GET['table'])){echo "value='".$get_values['sizes']."'";} ?> placeholder="Sizes"/><br>
                </div>
                <div class="col-md-6">
                  <label>Section Weight / Unit Length (W/L)</label>
                  <input type="text" class="form-control" title="suw" name="section_unit_weight" id="section_unit_weight" placeholder="Section Unit Weight(W/L)" <?php if(isset($_GET['id'])&& isset($_GET['table'])){echo "value='".$get_values['sectionunitweight']."'";} ?>/>
                    <!-- <select class="form-control" name="section_unit_weight" title="Section Unit Weight(W/L)" <?php if(isset($_GET['update_id'])&& isset($_GET['table'])){echo "readonly";} ?>>
                      <option value="">Section Unit Weight(W/L)</option>
                  <?php
                  // $conn_str = new Database();
                  // $con = $conn_str->connect();
                  // $select_length = "CALL SelectTables('section_unit_weight')";
                  // $execute_select_length = mysqli_query($con,$select_length) or die(mysqli_error($con));
                  // while($result_length = mysqli_fetch_array($execute_select_length))
                  // {
                ?>
                    <option value="<?php //echo $result_length['section_unit_weight'];?>" <?php //if(isset($_GET['update_id'])&& isset($_GET['table'])){if($result_length['section_unit_weight'] == $get_values['sectionunitweight']){echo "selected";}} ?> > <?php //echo $result_length['section_unit_weight']; ?> </option>
              <?php
                  //}
              ?>
                  </select> -->
                </div>
              </div>
                <!-- <div class="row">
                  <label>Quantity</label> -->
                  <input type="hidden" class="form-control" title="Quantity" name="product_quantity" value="0" placeholder="Quantity(in KGS)"/>
              <!-- </div><br> -->

                <div class="row">
                  <div class="col-md-6">
                    <label> Standard Section Length </label>
                    <select class="form-control" name="spl" id="spl" title="Length Per Section">
                      <option value="">Select Length</option>
                  <?php
                  $conn_str = new Database();
                  $con = $conn_str->connect();
                  $select_length = "CALL SelectTables('section_weight_length')";
                  $execute_select_length = mysqli_query($con,$select_length) or die(mysqli_error($con));
                  while($result_length = mysqli_fetch_array($execute_select_length))
                  {
                ?>
                    <option value="<?php echo $result_length['section_weight_length'];?>" <?php if(isset($_GET['id'])&& isset($_GET['table'])){if($result_length['section_weight_length'] == $get_values['sectionkgm']){echo "selected";}} ?> > <?php echo $result_length['section_weight_length']; ?> </option>
              <?php
                  }
              ?>
                  </select>
                </div>
                <div class="col-md-6">
                <label> Standard Section Weight</label>
                   <!-- <input type="text" class="form-control" title="Section Weight" name="section_weight" <?php //if(isset($_GET['update_id'])&& isset($_GET['table'])){echo "value='".$get_values['sectionweight']."'"; echo "readonly";} ?> placeholder="Section Weight"> -->

                  <select class="form-control" name="section_weight" id="section_weight" title="Standard Section Weight"<?php //if(isset($_GET['id'])&& isset($_GET['table'])){echo "readonly";} ?>>
                    <option value=""> Standard Section Weight </option>
                  <?php
                  $conn_str = new Database();
                  $con = $conn_str->connect();
                  $select_length = "CALL SelectTables('standard_section_weight')";
                  $execute_select_length = mysqli_query($con,$select_length) or die(mysqli_error($con));
                  while($result_length = mysqli_fetch_array($execute_select_length))
                  {
                  ?>
                  <option value="<?php echo $result_length['standard_section_weight'];?>" <?php if(isset($_GET['id'])&& isset($_GET['table'])){if($result_length['standard_section_weight'] == $get_values['sectionweight']){echo "selected";}} ?> > <?php echo $result_length['standard_section_weight']; ?> </option>
                  <?php
                  }
                  ?>
                  </select>
                </div>
                </div>


              <!-- <div class="row">
                  <label>Numbers</label> -->
                  <input type="hidden" class="form-control" title="Numbers" name="numbers" value="0" placeholder="Numbers"/>
                <!-- </div><br> -->
                  <br>
                <div class="row">
                <div class="col">
                    <label>Description</label>
                    <textarea class="form-control" title="Description" name="description" placeholder="Product Description"> <?php if(isset($_GET['id'])&& isset($_GET['table'])){echo $get_values['description'];} ?>  </textarea><br>
                  </div>
                  </div>
            </div>
            <div class="card-footer">
              <div class="row">
              <div class="col-md-3">
              </div>
                <div class="col-md-3">
                <?php
                  if(isset($_GET['id'])&& isset($_GET['table']))
                  {
                ?>
                  <button type="submit" class="btn btn-outline-success" name="update_product"> Update </button>
                  <?php
                  }
                  else
                  {
                  ?>
                  <button type="submit" class="btn btn-outline-success" name="submit_product"> Submit </button>

                  <?php
                  }
                  ?>
                </div>
                <div class="col-md-3">
                <?php
                if(!empty($_GET['db']))
                {
                ?>
                  <a href="<?php echo url()."src/view_sizes.php?db=home";?>" class="btn btn-outline-danger"> Cancel </a>
                <?php
                }
                
                else 
                {
                ?>
                  <?php
                  if(!isset($_GET['id'])&& !isset($_GET['table']))
                  {
                    ?>
                  <a href="<?php echo url()."src/manage_inventory.php";?>" class="btn btn-outline-danger"> Cancel </a>

                <?php
                }
                else{
                  ?>
                  <a href="<?php echo url()."src/view_sizes.php";?>" class="btn btn-outline-danger"> Cancel </a>
<?php
                }
                }
                ?>
                </div>
              </div>
            </div>
            <br>
           </div>
           </div>

</section><br><br><br>
<script>
$(document).ready(function(){
var get_category = "<?php echo url()."src/get_json/category.json"; ?>";
var get_brand = "<?php echo url(),"src/get_json/brand.json"; ?>";
var get_section_unit_weight = "<?php echo url(),"src/get_json/section_unit_weight.json"; ?>";

   $.getJSON(get_category, function (data) {
     var str = "#select_category";
               $.each(data, function (index, value) {
                       $(str).append('<option value="' + value.category + '">' + value.category + '</option>');
                   });
               });
    $.getJSON(get_brand, function (data) {
      var str = "#select_brand";
                $.each(data, function (index, value) {
                       $(str).append('<option value="' + value.brand + '">' + value.brand + '</option>');
                    });
              });

    $.getJSON(get_section_unit_weight, function (data) {
      var str = "#select_suw";
                $.each(data, function (index, value) {
                       $(str).append('<option value="' + value.section_unit_weight + '">' + value.section_unit_weight + '</option>');
                    });
              });
});
</script>
<script>
jQuery(document).ready(function(){
  jQuery('#section_weight,#spl').change(function(){
    if(jQuery("#section_unit_weight").val() == 0)
    {
      alert('Please Select Standard Section Length or Standard Section Weight');      
    }
    
      var section_weight = jQuery('#section_weight').val();
      var spl = jQuery('#spl').val();
      var sec_wt_per_spl = section_weight/spl ;
       var output = Math.floor(sec_wt_per_spl * 100) / 100;
      jQuery("#section_unit_weight").val(output);
  });
});
</script>
<?php
if(isset($_POST['view_all']))
{
  echo "<script>window.location.href='view_sizes.php';</script>";
}

?>