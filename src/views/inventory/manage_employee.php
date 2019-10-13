<section>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h4> MANAGE EMPLOYEES </h4>
                </div>
                </br></br></br>
                <table class="table table-bordered table-hover">
                    <thead align="center">
                        <th> S.No </th>
                        <th> FIRST NAME </th>
                        <th> EMPLOYEE ID </th>
                        <th> EMAIL-ID </th>
                        <th> USER ROLE </th>
                        <th> DESIGNATION </th>
                        <th> EDIT </th>
                        <th> DELETE </th>
                    </thead>
                        <?php
                        $con_obj = new Database();
                        $con = $con_obj->connect();
                        $select_emp = 'SELECT * FROM login_details';
                        $execute_emp = mysqli_query($con,$select_emp) or die(mysqli_error($con));
                        $i=1;
                        while($result_emp = mysqli_fetch_array($execute_emp))
                        {
                        ?>

                    <tbody align="center">
                        <td> <?php echo $i;?> </td>
                        <td> <?php echo $result_emp['first_name'];?> </td>
                        <td> <?php echo $result_emp['emp_id'];?> </td>
                        <td> <?php echo $result_emp['email_id'];?> </td>
                        <td> <?php echo $result_emp['role'];?> </td>
                        <td> <?php echo $result_emp['designation'];?> </td>
                        <td> <a href='user_details.php?id=<?php echo $result_emp['id'];?>' name='rec_edit' class='btn btn-sm btn-primary'> Edit </a> </td>
                        <td> <a href='manage_employee.php?id=<?php echo $result_emp['id'];?>' onClick="return confirm('Are you sure you want to delete?')" name='rec_delete' class='btn btn-sm btn-danger'> Delete </a> </td> 
                        <!-- <td><input type="text" class="form-control" value="<?php //echo $result_emp['id'];?>" name="delete">  -->
                         <!-- <input type="submit" onClick="return confirm('Are you sure you want to delete?')" name='rec_delete' class='btn btn-sm btn-danger' value="Delete">   </td>  -->

                    </tbody>
                
            
                <?php
                $i++;
                }
?>
            </table>
            <?php
if(isset($_GET['id']))
{
    $conn_str = new Database();
    $con = $conn_str->connect();
    $delete_emp = 'DELETE FROM `login_details` WHERE id="'.$_GET['id'].'"';
    // echo "<script> alert('".$delete_emp."'); </script>";
    $execute_del = mysqli_query($con,$delete_emp) or die(mysqli_error($con));
    if($execute_del)
    {
        echo "<script> alert('Succesfully Deleted'); </script>";
        echo "<script> window.location.href='manage_employee.php' </script>";
    }
}
?>
            <br><br>
        </div>
    </div>
</section>
<br><br>