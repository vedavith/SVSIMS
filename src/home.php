<?php
require '../config/autoloader.php';
require '../config/html_lib.php';
require '../config/redirect.php';
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
    render_view("headers","header1");
    //calling header.php
    render_view("headers","header");

    //write what ever you want here
    //render_view("folder","file");
    database_loader();
echo "<br><br><br><br><br>";
render_view('home','home');
echo "<br><br><br>";
    //calling footer.php
    render_view("headers","footer");
    
    //form close
    form_close();

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
 * This works if the page name similar as the post value. 
 */
     header_buttons();
 ?>
<script>
  (function (global) { 
if(typeof (global) === "undefined") {
    throw new Error("window is undefined");
}

var _hash = "!";
var noBackPlease = function () {
    global.location.href += "#";

    // making sure we have the fruit available for juice (^__^)
    global.setTimeout(function () {
        global.location.href += "!";
    }, 50);
};

global.onhashchange = function () {
    if (global.location.hash !== _hash) {
        global.location.hash = _hash;
    }
};

global.onload = function () {            
noBackPlease();

    // disables backspace on page except on input fields and textarea..
    document.body.onkeydown = function (e) {
        var elm = e.target.nodeName.toLowerCase();
        if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
            e.preventDefault();
        }
        // stopping event bubbling up the DOM tree..
        e.stopPropagation();
    };          
}
})(window);
</script>