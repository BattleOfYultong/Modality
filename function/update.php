<?php

    include '../connections.php';

    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $loginID = $_POST['loginID'];

    $sql = "UPDATE cruds SET Name = '$Name' , Email = '$Email', Password = '$Password' WHERE loginID = $loginID ";

        if($connections->query($sql) === TRUE){
            header("Location: ../crud.php");
            exit();
        }
        else{
            echo "Error: ".$sql. "br" .$connections->error;
        }
