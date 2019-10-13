<?php

    class Database
    {
        public $con = NULL;

        public function connect()
        {
            /*
             $server = "localhost";
             $user_name = "root";
             $password = "";
             $database_name="svs_ims";
            */

            $server = "localhost";
            $user_name = "svsimsadmin";
            $password = "dbsvsims2018!";
            $database_name="dbsvsims";
           try
           {
                $con = mysqli_connect($server,$user_name,$password,$database_name);
           }
           catch(mysqli_sql_exception $ex)
           {
                throw $ex;
           }
                return $con;
        }
        public function mysql_connection_string()
        {
            // $server = "localhost";
            //  $user_name = "root";
            //  $password = "";
            //  $database_name="svs_ims";
            $server = "localhost";
            $user_name = "svsimsadmin";
            $password = "dbsvsims2018!";
            $database_name="dbsvsims";
             try
             {
                $con = mysql_connect($server,$user_name,$password);
             }
             catch(mysql_sql_exception $ex)
             {
                throw $ex;
             }
             return $con;
        }
    }
?>
