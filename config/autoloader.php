<?php
spl_autoload_register('database_loader');
spl_autoload_register('render_view');
spl_autoload_register('redirect_page');


//URL Configuration
function url()
{
     //  return $link = "http://localhost/svs_ims/";
         return $link = "http://airizen.com/SVSIMS/";
}

function database_loader()
{
    require 'Database.php';
}

function render_view($folder,$page)
{
    $path = '../src/views/'.$folder.'/'.$page.'.php';
    if(file_exists($path))
    {
        require '../src/views/'.$folder.'/'.$page.'.php';
    }
    else
    {
        echo "<div class='container-fluid'> <h4 style='color:red'> SVS_IMS:".$path." - FILE DOESN'T EXISTS </h4> </div>";
    }

}

function redirect_page($page,$data)
{
    echo "<script> window.location.href='".url()."src/".$page.".php?db=".$data."' </script>";
}
