<?php

$localhost = "localhost";
$root = "root";
$password = "";
$database = "crud_tbl";

$connections = mysqli_connect($localhost, $root, $password, $database);
    if($connections->connect_errno){
        echo "Error: ".$connections->connect_errno;
    }
    else{
       
    }