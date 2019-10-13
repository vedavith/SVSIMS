
<?php
//FORM GENERATOR
function form_open($method=NULL,$action=NULL)
{
 echo "<form method='".$method."' action='".$action."'>";
}
function form_close()
{
    echo "</form>";
}

//UNIVERSAL TAG GENERATOR
function open_tag($html_tag,$tag_name,$class_name,$id,$value=NULL,$style=NULL,$misc_props=NULL)
{
    echo "<".$html_tag." name='".$tag_name."' class='".$class_name."' id='".$id."' value='".$value."' style='".$style."'".$misc_props.">";
}
function close_tag($close_tag)
{
    echo "</".$close_tag.">";
}
function load_bootstrap()
{
    echo " <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'>".
         " <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>".
         "<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>".
         "<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>";
}
?>
