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
//opening form
form_open("POST");

//loading header
            echo "<section class='fixed-top'>";
            render_view("headers","header1");
            render_view("headers","header");
            echo "</section>";

//loading databse class
database_loader();
echo "<br><br><br><br><br><br><br><br>";
render_view('reports','reports');

//loading footer
render_view('headers','footer');

//closing form
form_close();
 ?>

  </body>
</html>

<?php
/* HEADER BUTTON NAVIGATION */

/*
 * This works if the page name similar as the post value -> from redirect.php
 */
}
else
{
    require '../404.php';
    echo "<script> window.location='".url()."src' </script>";
}
     header_buttons();
 ?>