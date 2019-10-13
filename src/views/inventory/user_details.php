<style>
 .bg-light {
  background: #b5cce2 !important;
  overflow: hidden;
  
}
</style>
<section>
    <div class="container" >
    <div class="container card bg-light text-center col-sm-10" >
        <br>
        <div class="row">
                <div class="col-md-6"  align="left">
            <?php
                if(isset($_GET['id']))
                {
            ?>
                    <h3> MANAGE EMPLOYEES </h3>
                </div>
                
            <?php
                }
                else
                {
                ?>
                    <h3> ADD EMPLOYEES </h3>
                    </div>
                    <div class="col-md-3" align="right">
                    <button type="submit" class="btn btn-primary text-white" name="manage_employees" style="margin-right: -205px;" formnovalidate>Manage Employees</button>
                </div>
                <?php
                }
                ?>
            
                    
                
            </div>
            <br><br>
            <?php
            if(isset($_GET['id']))
					{
                        $con_obj = new Database();
                        $con = $con_obj->connect();
	 $update_sql="SELECT * FROM `login_details` WHERE id='".$_GET['id']."'";
							$update_query=mysqli_query($con,$update_sql);
							$select_row=mysqli_fetch_array($update_query);

					}		
?>
        <div class="row">
            <div class="col-md-3 col-sm-10">
                <label class="control-label">First Name</label>
                <input class="form-control" type="text" name="txtFname" value="<?php if(isset($_GET['id'])){ 
																echo $select_row['first_name']; } ?>" />
            </div> 
            <div class="col-md-3 col-sm-10">
                <label class="control-label">Last Name</label>
                <input class="form-control" type="text" name="txtLname" value="<?php if(isset($_GET['id'])){ 
																echo $select_row['last_name']; } ?>"/>
            </div> 
            <div class="col-md-3 col-sm-12">
                <label class="control-label">Gender</label>
                <select class="form-control" name="txtGender" required>
                    <option> Select Gender </option>
                    <option value="M" <?php if (isset($_GET['id']) && ($select_row['gender'] == 'M')) { echo 'selected="selected"'; } ?>> Male </option>
                    <option value="F" <?php if (isset($_GET['id']) && ($select_row['gender'] == 'F')) { echo 'selected="selected"'; } ?>> Female </option>
                </select>
            </div> 
            <div class="col-md-3 col-sm-12">
                <label class="control-label">Father's Name</label>
                <input class="form-control" type="text" name="txtFatherName" value="<?php if(isset($_GET['id'])){ 
																echo $select_row['father_name']; } ?>"/>
            </div> 
        </div> <br>
        <div class="row">
            <div class="col-md-3 col-sm-12">
                <label class="control-label">Blood Group</label>
                <select class="form-control" name="txtBlood" required>
                    <option> Select Blood Group </option>
                    <option value="A+" <?php if (isset($_GET['id']) && ($select_row['blood_group'] == 'A+')) { echo 'selected="selected"'; } ?>> A+ </option>
                    <option value="A-" <?php if (isset($_GET['id']) && ($select_row['blood_group'] == 'A-')) { echo 'selected="selected"'; } ?>> A- </option>
                    <option value="B+" <?php if (isset($_GET['id']) && ($select_row['blood_group'] == 'B+')) { echo 'selected="selected"'; } ?>>B+</option>
                    <option value="B-" <?php if (isset($_GET['id']) && ($select_row['blood_group'] == 'B-')) { echo 'selected="selected"'; } ?>>B-</option>
                    <option value="O+" <?php if (isset($_GET['id']) && ($select_row['blood_group'] == 'O+')) { echo 'selected="selected"'; } ?>>O+</option>
                    <option value="O-" <?php if (isset($_GET['id']) && ($select_row['blood_group'] == 'O-')) { echo 'selected="selected"'; } ?>>O-</option>
                    <option value="AB+" <?php if (isset($_GET['id']) && ($select_row['blood_group'] == 'AB+')) { echo 'selected="selected"'; } ?>>AB+</option>
                    <option value="AB-" <?php if (isset($_GET['id']) && ($select_row['blood_group'] == 'AB-')) { echo 'selected="selected"'; } ?>>AB-</option>


                </select>
            </div> 

            <div class="col-md-3 col-sm-12">
                <label class="control-label">Date Of Birth</label>
                <input class="form-control" type="date" name="txtBirthdate" value="<?php if(isset($_GET['id'])){ 
																echo $select_row['date_of_birth']; } ?>">
            </div> 
            <div class="col-md-3 col-sm-12">
                <label class="control-label">Employee ID</label>
                <input class="form-control" type="text" name="txtEmpid" value="<?php if(isset($_GET['id'])){ 
																echo $select_row['emp_id']; } ?>" />
            </div> 
            <div class="col-md-3 col-sm-12">
                <label class="control-label">Date Of Join</label>
                <input class="form-control" type="date" name="txtJoindate" value="<?php if(isset($_GET['id'])){ 
																echo $select_row['date_of_join']; } ?>">
            </div> 
        </div><br>
        <div class="row">
            <div class="col-md-3 col-sm-12">
                <label class="control-label">Aadhar No.</label>
                <input id="joinDate" class="form-control" type="text" name="txtAadhar" value="<?php if(isset($_GET['id'])){ 
																echo $select_row['adhaar_no']; } ?>"/>
            </div>
            <div class="col-md-3 col-sm-12">
                <label class="control-label">PAN</label>
                <input id="joinDate" class="form-control" type="text" name="txtPAN" value="<?php if(isset($_GET['id'])){ 
                                                                                echo $select_row['pan_no']; } ?>"/>
            </div>
            <div class="col-md-3 col-sm-12">
                <label class="control-label">Bank Account No.</label>
                <input id="joinDate" class="form-control" type="text" name="txtBankAcc" value="<?php if(isset($_GET['id'])){ 
                                                                                echo $select_row['bank_accnt']; } ?>"/>
            </div>
            <div class="col-md-3 col-sm-12">
                <label class="control-label">Nominee Name</label>
                <input id="joinDate" class="form-control" type="text" name="txtNominee" value="<?php if(isset($_GET['id'])){ 
                                                                                echo $select_row['nominee_name']; } ?>"/>
            </div>
        </div> <br>
        <div class="row">
            <div class="col-md-3 col-sm-12">
                <label class="control-label">DL No.</label>
                <input id="joinDate" class="form-control" type="text" name="txtDL" value="<?php if(isset($_GET['id'])){ 
                                                                                echo $select_row['dl_no']; } ?>"/>
            </div>
            <div class="col-md-3 col-sm-12">
                <label class="control-label">PF No.</label>
                <input id="joinDate" class="form-control" type="text" name="txtPF" value="<?php if(isset($_GET['id'])){ 
                                                                                echo $select_row['pf_no']; } ?>"/>
            </div>
            <div class="col-md-3 col-sm-12">
                <label class="control-label">ESI No.</label>
                <input id="joinDate" class="form-control" type="text" name="txtESI" value="<?php if(isset($_GET['id'])){ 
                                                                                echo $select_row['esi_no']; } ?>"/>
            </div>
            <div class="col-md-3 col-sm-12">
                <label class="control-label">PT No.</label>
                <input id="joinDate" class="form-control" type="text" name="txtPT" value="<?php if(isset($_GET['id'])){ 
                                                                                echo $select_row['pt_no']; } ?>"/>
            </div>
        </div> <br>
        <div class="row">
            <div class="col-md-3 col-sm-12">
                <label class="control-label">PassPort No.</label>
                <input id="joinDate" class="form-control" type="text" name="txtPassPort" value="<?php if(isset($_GET['id'])){ 
                                                                                echo $select_row['passport_no']; } ?>"/>
            </div>
            <div class="col-md-3 col-sm-12">
                <label class="control-label">Voter ID No.</label>
                <input id="joinDate" class="form-control" type="text" name="txtVoterId" value="<?php if(isset($_GET['id'])){ 
                                                                                echo $select_row['voter_id']; } ?>"/>
            </div>
            <div class="col-md-3 col-sm-12">
                <label class="control-label">Email ID</label>
                <input class="form-control" type="text" name="txtMailid" value="<?php if(isset($_GET['id'])){ 
                                                                                echo $select_row['email_id']; } ?>" required/>
            </div> 
            <div class="col-md-3 col-sm-12">
                <label class="control-label">Password</label>
                <input class="form-control" type="password" name="txtPassword"  value="<?php if(isset($_GET['id'])){ 
                                                                                echo $select_row['password']; } ?>" required/>
            </div> 
        </div> <br>
        <div class="row"> 

            <div class="col-md-4 col-sm-12">
                <label class="control-label">Mobile No.</label>
                <input class="form-control" type="text" name="txtMobile"  minlength="10" maxlength="10"   value="<?php if(isset($_GET['id'])){ 
                                                                                echo $select_row['mobile_no']; } ?>"/>
            </div> 
            <!-- <div class="col-md-3 col-sm-12">
                <label class="control-label"> Department</label>
                    <select class="form-control" name="txtDepartment" required>
                    <option> Select Department </option>
                        <?php
                        //$master_select_sql='SELECT * FROM department_master ORDER BY Id ASC';
                        //$master_select_query=mysqli_query($connect,$master_select_sql);
                        //$i=1;
                        //while($master_select_row=mysqli_fetch_array($master_select_query))
                        //{
                        ?>
                            <option value="<?php //echo $master_select_row['Id']; ?>" <?php //if(isset($_GET['id'])){
                                        //if ($master_select_row['Id'] == $select_row['Department'])  echo 'selected="selected"';
                                            //}  ?>> <?php //echo $master_select_row['Department_Name']; ?></option>
                        <?php
                        //}
                        ?>
                    </select>
            </div> -->

            <div class="col-md-4 col-sm-12">
                <label class="control-label"> User Role</label>
                <select class="form-control" name="txtRole" required>
                    <option> Select Role </option>
                    <?php
                  $conn_str = new Database();
                  $con = $conn_str->connect();
                  $select_role = "CALL SelectTables('user_role')";
                  $execute_select_role = mysqli_query($con,$select_role) or die(mysqli_error($con));
                  while($result = mysqli_fetch_array($execute_select_role))
                  {
                ?>
                            <option value="<?php echo $result['user_role']; ?>" <?php if(isset($_GET['id'])){
                                        if ($result['user_role'] == $select_row['role'])  echo 'selected="selected"';
                                            }  ?>> <?php echo $result['user_role']; ?></option>
                        <?php
                        }
                        ?>
                </select>
            </div> 
            <div class="col-md-4 col-sm-12">
                <label class="control-label">User Type</label>
                <select class="form-control" name="txtUsertype">
                    <option> Select User Type </option>
                    <?php
                  $conn_str = new Database();
                  $con = $conn_str->connect();
                  $select_type = "CALL SelectTables('user_type')";
                  $execute_select_type = mysqli_query($con,$select_type) or die(mysqli_error($con));
                  while($result = mysqli_fetch_array($execute_select_type))
                  {
                ?>
                        <option value="<?php echo $result['user_type']; ?>" <?php if(isset($_GET['id'])){
                                    if ($result['user_type'] == $select_row['user_type'])  echo 'selected="selected"';
                                        }  ?>> <?php echo $result['user_type']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div> 
        </div> <br>
        <div class="row"> 
            <div class="col-md-3 col-sm-12">
                <label class="control-label">Education</label>
                <input class="form-control" type="text" name="txtEdu" value="<?php if(isset($_GET['id'])){ 
																echo $select_row['education']; } ?>"/>
            </div>

            <div class="col-md-3 col-sm-12">
                <label class="control-label">Previous Experience</label>
                <input class="form-control" type="text" name="txtExper" value="<?php if(isset($_GET['id'])){ 
																echo $select_row['previous_exp']; } ?>"/>
            </div>
            <div class="col-md-3 col-sm-12">
                <label class="control-label">Area of Work / Designation

                </label>
                <input class="form-control" type="text" name="txtDesign" value="<?php if(isset($_GET['id'])){ 
																echo $select_row['designation']; } ?>"/>
            </div>
            <div class="col-md-3 col-sm-12">
                <label class="control-label">Any Other Skills</label>
                <input class="form-control" type="text" name="txtSkills" value="<?php if(isset($_GET['id'])){ 
																echo $select_row['any_other_skills']; } ?>"/>
            </div>
        </div> <br>
        <div class="row"> 
            <div class="col-md-6 col-sm-12">
                <label class="control-label">Present Address</label>
                    <textarea class="form-control" name="txtPreAddress" ><?php if(isset($_GET['id'])){ 
																echo $select_row['present_address']; } ?> </textarea>

            </div> 
            <div class="col-md-6 col-sm-12">
                <label class="control-label">Permanent Address</label>
                <textarea class="form-control" name="txtPerAddress" ><?php if(isset($_GET['id'])){ 
																echo $select_row['permanent_address']; } ?> </textarea>

            </div>
        </div>
        </br></br> 
        <div class="row">
        <div class="col-md-3">
        </div>
            <div class="col-md-3">
<?php
if(isset($_GET['id']))
{
	?>
	<button type="submit" name="recover-update"class="btn btn-success">Update</button>
	<?php
}
else
{
	?>
	<button type="submit" name="recover-submit" class="btn btn-success">Submit</button>
	<?php
}
?>
            </div>
            <div class="col-md-3">
<?php
if(isset($_GET['id']))
{
	?>
           
                <a href="manage_employee.php" class="btn btn-danger">Cancel</a>
                <?php
}
else
{
	?>
                <button type="submit" name="" value="Cancel" class="btn btn-danger" formnovalidate>Cancel</button>
                <?php
}
?>
            </div>
        </div>

<br><br>


        </div>
    </div>
</section>
<br><br>
<?php
if(isset($_POST['manage_employees']))
{
  echo "<script>window.location.href='manage_employee.php';</script>";
}

?>