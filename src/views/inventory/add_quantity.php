
<style>
 .bg-light {
  background: #b5cce2 !important;
  overflow: hidden;
  
}
</style>
<section>
<div class="container" >
   <div class="container card bg-light text-center col-sm-10" >
       
        <div class="row">
          <div class="col-md-6"  align="left">
            <h3> Add Quantity </h3>
          </div>
        </div>
        <br>
        <div class="card-body" style="text-align:left;">
        <div class="row">
          
          <div class="col-md-6">
          <p> You Have Selected <b> <span style="color:red;"> <?php echo $_POST['get_category']; ?> </span> </b> </p>
          </div>
        </div>
          <div class="row">
          <div class="col-md-6">
          <label>Sizes,Length,Brand</label>
            <input type="hidden" value="<?php echo $_POST['get_category']; ?>" class="form-control" name="update_table"/>
            
            <input id = "select_uid" list = "uid" name = "select_uid" class = "form-control" placeholder="Select Sizes_SectionLength_Brand"/>
            <datalist id="uid">
    <?php
      $con_object = new Database();
      $con = $con_object->connect();

      $select_products = "SELECT * FROM product_insert_".$_POST['get_category'];
      $execute_select_products = mysqli_query($con,$select_products) or die(mysqli_error($con));
      while($get_result = mysqli_fetch_array($execute_select_products))
      {
    ?>
            <option data-value="<?php echo $get_result['sizes']."%".$get_result['sectionkgm']."%".$get_result['sectionweight']."%".$get_result['sectionunitweight']."%".$get_result['brand'];?>" value="<?php echo "Sizes : ".$get_result['sizes']." Section Length : ".$get_result['sectionkgm']." Brand : ".$get_result['brand']; ?>"> </option>
    <?php
      }
    ?>
          </datalist>

<script>
      							$(document).ready(function() {
      									$('#select_uid').change(function()
      									{
                            var value = $('#select_uid').val();
                            alert(value);
                            soldier_combo = $('#uid [value="' + value + '"]').data('value');
                            alert(soldier_combo);
                            //$("#soldier_name").val(registration);
                            var result = soldier_combo.split("%");
                            alert(result);
                            $('#sizes').val(result[0]);
                            $('#sectionlength').val(result[1]);
                            $('#sectionweight').val(result[2]);
                            $('#sectionunitweight').val(result[3]);
                            $('#brand').val(result[4]);
      									});
      								});
      </script>

        </div>
        
      
        <br>
        <div class="col-md-6">
        <label>Sizes</label>
          <input type="text" class="form-control" name="selected_product" id="sizes" readonly/>
        </div>
        
      </div><br>
    

      <div class="row">
       
        <div class="col-md-6">
        <label>Brand</label>
          <input type="text" class="form-control" name="selected_brand" id="brand" readonly/>
        </div>
        
      <div class="col-md-6">
      <label> Standard Section Length</label>
        <input type="text" class="form-control input value3" name="selected_spl" id="sectionlength" readonly/>
      </div>
      
    </div><br>
                      
    <div class="row">
     
      <div class="col-md-6">
      <label> Standard Section Weight</label>
        <input type="text" class="form-control" name="selected_section_weight" id="sectionweight" readonly/>
      </div>
      
      <div class="col-md-6">
      <label>Section Weight / Unit Length (W/L)</label>
        <input type="text" class="form-control"  name = "selected_suw" id="sectionunitweight" readonly/>
      </div>
      
    </div><br>
  
    <div class="row">
      
      <div class="col-md-6">
      <label>Quantity (In KGS)</label>
        <input type="text" class="form-control input value1" min="1" name="quantity" id="result1" placeholder="Quantity"/>
      </div><br>
        
      <div class="col-md-6">
      <label>Numbers</label>
        <input type="text" class="form-control input1 value2" min="1" name="numbers" id="result" placeholder="Numbers"/>
      </div><br>
      
    </div><br>
  

<br>
  <div class="card-footer">
    <div class="row">
    <div class="col-md-4">
    </div>
      <div class="col-md-3">
        
          <button type="submit" class="btn btn-outline-success" name="update_quantity"> Update </button>
       
      </div>
    <div class="col-md-3">
   
      <a href="<?php echo url()."src/add_quantity.php" ?>" class="btn btn-outline-danger"> Cancel </a>
    
  </div>
</div>
</div>
</div><br>
</div><br><br>
</section><br><br>
<script>
$(document).ready(function(){
  
    $(".input").keyup(function(){
          var val1 = +$(".value1").val();
          var val2 = +$("#sectionlength").val();
          var val3 = +$("#sectionunitweight").val();
          var val4 = val2*val3;
          // var val5 = Math.ceil(val1/val4);
         // var val2 = +$(".value2").val();
          $("#result").val(val1/val4);
   });
   $(".input1").keyup(function(){
          var val1 = +$(".value2").val();
          var val2 = +$("#sectionlength").val();
          var val3 = +$("#sectionunitweight").val();
          var val4 = val2*val3;
          
         // var val2 = +$(".value2").val();
          $("#result1").val(val1*val4);
   });
   
});
</script>