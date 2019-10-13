<?php

spl_autoload_register('load_model');

function load_model($page)
{
    $path = '../models/'.$page.'.php';
    if(file_exists($path))
    {
        require '../models/'.$page.'.php';
    }
    else
    {
        echo "<div class='container-fluid'> <h4 style='color:red'> SVS_IMS:".$path." - FILE DOESN'T EXISTS </h4> </div>";
    }
   
}