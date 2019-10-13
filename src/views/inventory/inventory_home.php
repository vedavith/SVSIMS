<section>

  <div class="container">
    <div class="row">
    <?php
    if($_SESSION['role'] != "user")
    {
    ?>
    
    <div class="col-md-3">
    </div>
      <div class="col-md-3">
        <div class="card bg-dark">
          <div class="card-body">
            <div align="center">
                <button type="submit" class="btn btn-lg btn-danger" name="create_product" value="create_product"> Create Size </button>
            </div>
          </div>
        </div>
        </div><br><br>
    <?php
    }
    ?>

   
      <div <?php if($_SESSION['role'] != "user")
    { echo 'class="col-md-3"'; } else { echo 'class="col-md-4"'; } ?>>
          <div class="card bg-dark">
            <div class="card-body">
              <div align="center">
                  <button type="submit" class="btn btn-lg btn-danger" name="add_quantity" value="add_quantity"> Add Quantity </button>
              </div>
            </div>
          </div>
      </div><br>
      <?php
      if($_SESSION['role'] != "user")
      {
      ?>
      </div>
      <br>
      <div class="row">
      <div class="col-md-3">
    </div>
      <?php
      }
      ?>
      
      <div <?php if($_SESSION['role'] != "user")
    { echo 'class="col-md-3"'; } else { echo 'class="col-md-4"'; } ?>>
          <div class="card bg-dark">
            <div class="card-body">
              <div align="center">
                  <button type="submit" class="btn btn-lg btn-danger" name="deduct_quantity" value="deduct_quantity"> Deduct Quantity </button>
              </div>
            </div>
          </div>
      </div>
      <div <?php if($_SESSION['role'] != "user")
    { echo 'class="col-md-3"'; } else { echo 'class="col-md-4"'; } ?>>
          <div class="card bg-dark">
            <div class="card-body">
              <div align="center">
                  <button type="submit" class="btn btn-lg btn-danger" name="manage_product" value="manage_product"> Inventory </button>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</section>
<br><br><br>