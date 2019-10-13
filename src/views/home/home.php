<style>
 .bg-light {
  background: #c0d3e8 !important;
  overflow: hidden;

}
</style>

<section>
<?php
	$database = new Database();
	$conn_object = $database->connect();

	$category_array = array();
	$select_category = "SELECT * FROM category ORDER BY category";
	$execute_select_category = mysqli_query($conn_object,$select_category) or die(mysqli_error($conn_object));
	$x = 0;
	while($row = mysqli_fetch_array($execute_select_category))
	{
		$category_array[$x] = $row['category'];
		$x++;
	}
	//print_r($category_array);

	//$query_array = array();
	(int)$quant = array();
	(int)$deduct = array();
	
	$current_sum = 0;
	$deduct_sum = 0;

	for($mm = 0; $mm <= count($category_array)-1; $mm++)
	{
		$select_quant_sum = "SELECT SUM(quantity) AS quant_sum FROM product_insert_";
		$select_quant_sum.=$category_array[$mm];

		$execute_select_quant_sum = mysqli_query($conn_object,$select_quant_sum) or die(mysqli_error($conn_object));
		$quant_sum = mysqli_fetch_array($execute_select_quant_sum);
		$quant[$mm] = $quant_sum['quant_sum'];

		$select_deduct_qunat = "SELECT SUM(quantity) AS deduct_sum FROM product_update_".$category_array[$mm]." WHERE addordel='d'";
		$execute_select_deduct_quant = mysqli_query($conn_object,$select_deduct_qunat) or die(mysqli_error($conn_object));
		$sum_deduct = mysqli_fetch_array($execute_select_deduct_quant);
		$deduct[$mm] = (int)$sum_deduct['deduct_sum'];
		
	}
	
	// echo "<code>";
	// print_r($quant);
	// echo "</code>"."<br>";
	
	// echo "<code>";
	// print_r($deduct);
	// echo "</code>";

	for($vr = 0; $vr <= count($quant)-1; $vr++)
	{
		$current_sum = $current_sum + $quant[$vr];
	}

	for($vr = 0; $vr <= count($quant)-1; $vr++)
	{
		$deduct_sum = $deduct_sum + $deduct[$vr];
	}


?>
<div class="container">
   <div class="row">
	<div class="col-sm-4">
		<div class="card bg-dark">
			<div class="card-body">
				<div align = "center">
				<br>
					<button class="btn btn-lg btn-danger" name="view_all"> View All Sizes </button>
				</div>
				<br>
			</div>	
		</div>
	</div>	
		<div class = "col-sm-4">
			<div class="card bg-danger text-white">
				<div class="card-body">
					<div align = "center">
					<br>
						<h3> <b> Current Inventory </b> </h3>
					</div>
					<div align ="center"> <H5> <?php echo $current_sum; ?> KGS</H5></div>
				</div>
			</div>
		</div>
		<div class = "col-sm-4">
			<div class="card bg-info text-white">
				<div class="card-body">
					<div align = "center">
					<br>
						<h3> <b> Outgoing Stock </b> </h3>
					</div>
					<div align ="center"> <H5> <?php echo $deduct_sum; ?> KGS</H5></div>
				</div>
			</div>
		</div>
	</div>
   </div>
</div>
</section>

<?php
if(isset($_POST['view_all']))
{
  redirect_page("view_sizes","home");
}

?>