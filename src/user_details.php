<?php
    require '../config/autoloader.php';
    require '../config/html_lib.php';
    require '../config/redirect.php';
    require '../config/load_models.php';
    session_start();
if($_SESSION['role'] == "superadmin" || $_SESSION['role'] == "admin" || $_SESSION['role'] == "user")
{
?>
<html>
    <head>
        <?php
         load_bootstrap();
         database_loader();
         header_buttons();
         ?>

    </head>
<body>
<?php
//form open
form_open("POST");

//Calling header.php
echo "<section class='fixed-top'>";
//calling header.php
render_view("headers","header1");
render_view("headers","header");
echo "</section>";
echo "<br><br><br><br><br><br><br>";
//write what ever you want here.
render_view("inventory","user_details");

//form close
form_close();

//calling footer.php
render_view("headers","footer");
 ?>

 <?php
            if (isset($_POST['recover-submit']))
            {
                $conn_str = new Database();
                $con = $conn_str->connect();
                $select_emp = "SELECT count(*) FROM login_details WHERE `emp_id`= '".$_POST['txtEmpid']."' OR `email_id` = '".$_POST['txtMailid']."'";
                $execute_emp = mysqli_query($con,$select_emp) or die(mysqli_error($con));
                $result = mysqli_fetch_array($execute_emp);
                if($result[0] == 0)
                {
                
                   echo $user_details ='INSERT INTO `login_details`(`email_id`, `password`, `role`, `first_name`, `last_name`, `gender`, `father_name`, `blood_group`, `date_of_birth`, `emp_id`, `date_of_join`, `adhaar_no`, `pan_no`, `bank_accnt`, `nominee_name`, `dl_no`, `pf_no`, `esi_no`, `pt_no`, `passport_no`, `voter_id`, `mobile_no`, `user_type`, `education`, `previous_exp`, `designation`, `any_other_skills`, `present_address`, `permanent_address`) VALUES
                    ("'.$_POST['txtMailid'].'","'.$_POST['txtPassword'].'","'.$_POST['txtRole'].'","'.$_POST['txtFname'].'","'.$_POST['txtLname'].'","'.$_POST['txtGender'].'","'.$_POST['txtFatherName'].'","'.$_POST['txtBlood'].'",
                    "'.$_POST['txtBirthdate'].'","'.$_POST['txtEmpid'].'","'.$_POST['txtJoindate'].'","'.$_POST['txtAadhar'].'","'.$_POST['txtPAN'].'","'.$_POST['txtBankAcc'].'",
                    "'.$_POST['txtNominee'].'","'.$_POST['txtDL'].'","'.$_POST['txtPF'].'","'.$_POST['txtESI'].'",
                    "'.$_POST['txtPT'].'","'.$_POST['txtPassPort'].'","'.$_POST['txtVoterId'].'","'.$_POST['txtMobile'].'","'.$_POST['txtUsertype'].'","'.$_POST['txtEdu'].'","'.$_POST['txtExper'].'",
                    "'.$_POST['txtDesign'].'","'.$_POST['txtSkills'].'","'.$_POST['txtPreAddress'].'","'.$_POST['txtPerAddress'].'")';
                    
                    $execute_user_details = mysqli_query($con,$user_details) or die(mysqli_error($con));
                    if(!empty($execute_user_details))
                    {
                    
                        echo "<script> alert('Succesfully Inserted'); </script>";
                        echo "<meta http-equiv='refresh' content='0'>";
                    }
                }
                else
                {
                    echo "<script> alert('Employee Id or Email-Id already exists'); </script>";
                } 
            }
            if (isset($_POST['recover-update']))
            {
                $con_obj = new Database();
                $con = $con_obj->connect();
                $update_emp = 'UPDATE `login_details` SET `email_id`="'.$_POST['txtMailid'].'",`password`="'.$_POST['txtPassword'].'",`role`="'.$_POST['txtRole'].'",`first_name`="'.$_POST['txtFname'].'",
                `last_name`="'.$_POST['txtLname'].'",`gender`="'.$_POST['txtGender'].'",`father_name`="'.$_POST['txtFatherName'].'",`blood_group`="'.$_POST['txtBlood'].'",`date_of_birth`="'.$_POST['txtBirthdate'].'",
                `emp_id`="'.$_POST['txtEmpid'].'",`date_of_join`="'.$_POST['txtJoindate'].'",`adhaar_no`="'.$_POST['txtAadhar'].'",`pan_no`="'.$_POST['txtPAN'].'",`bank_accnt`="'.$_POST['txtBankAcc'].'",
                `nominee_name`="'.$_POST['txtNominee'].'",`dl_no`="'.$_POST['txtDL'].'",`pf_no`="'.$_POST['txtPF'].'",`esi_no`="'.$_POST['txtESI'].'",`pt_no`="'.$_POST['txtPT'].'",`passport_no`="'.$_POST['txtPassPort'].'",
                `voter_id`="'.$_POST['txtVoterId'].'",`mobile_no`="'.$_POST['txtMobile'].'",`user_type`="'.$_POST['txtUsertype'].'",`education`="'.$_POST['txtEdu'].'",`previous_exp`="'.$_POST['txtExper'].'",
                `designation`="'.$_POST['txtDesign'].'",`any_other_skills`="'.$_POST['txtSkills'].'",`present_address`="'.$_POST['txtPreAddress'].'",`permanent_address`="'.$_POST['txtPerAddress'].'" WHERE `id`= "'.$_GET['id'].'"';

                $execute_emp = mysqli_query($con,$update_emp) or die(mysqli_error($con));

                if(!empty($execute_emp))
                {
                    
                    
                echo "<script> alert('Succesfully Updated'); </script>";
                echo "<meta http-equiv='refresh' content='0'>";
                }
            }  
              
}
      ?>