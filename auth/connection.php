<?php
    function connect(){
        $dbHost = "localhost";
        $user = "root";
        $password = ""; 
        $dbname = "inventory1"; 

        $conn = new mysqli($dbHost, $user, $password, $dbname); 

        return $conn;
    }


    function closeConnect($cn){
        $cn->close();
    }
   
?>