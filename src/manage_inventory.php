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
        <?php load_bootstrap(); ?>
    </head>
<?php
//form open
form_open("POST");

//calling header.php

echo "<section class='fixed-top'>";
//calling header.php
render_view("headers","header1");
render_view("headers","header");
echo "</section>";
echo "<br><br><br><br><br><br><br><br><br><br>";
render_view("inventory","inventory_home");
//form_close
form_close();
//calling footer.php
render_view("headers","footer");
?>
 </html>
<?php
/* HEADER BUTTON NAVIGATION */

/*
 * This works if the page name is similar as the post value -> from redirect.php
 */
}
else
{
    require '../404.php';
    echo "<script> window.location='".url()."src' </script>";
}
  header_buttons();
  inventory_buttons();
?>
