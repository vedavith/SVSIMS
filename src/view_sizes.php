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
    <body>
    <?php
//form open
form_open("POST");

echo "<section class='fixed-top'>";
//calling header.php
render_view("headers","header1");
render_view("headers","header");
echo "</section>";

echo "<br><br><br><br><br><br><br><br><br>";
//write what ever you want here
database_loader();
render_view("inventory","view_sizes");

//form close
form_close();

//calling footer.php
render_view("headers","footer");
?>
<?php
}
else
{
    require '../404.php';
    echo "<script> window.location='".url()."src' </script>";
}
/* HEADER BUTTON NAVIGATION */

/*
 * This works if the page name similar as the post value -> from redirect.php
 */
     header_buttons();
 ?>
</body>
</html>