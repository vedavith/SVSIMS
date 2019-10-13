<style>
 .bg-light {
  background: #b5cce2 !important;
  overflow: hidden;
  
}
</style>
<section>
  <div class="container card bg-light col-sm-6">
    <br>
    <div class="row">
      <div class="col-md-6" align="left">
        <h3> Deduct Quantity </h3>
      </div>
      <div class="col-md-6" align="right">
        <a href="manage_inventory.php" class="btn btn-outline-danger"> Back </a>
      </div>
    </div>
    <br>
    <div class="card bg-light">
      <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <select class="form-control" id="select_category" name="get_category">
                <option value = ""> Select a Category </option>
              </select>
            </div>
            <div class="col-md-6">
                <button class="btn btn-outline-primary" name="submit_category"> Submit </button>
            </div>
        </div>
      </div>
    </div><br>
  </div>
</section>
