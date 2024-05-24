<?php

include '../connections.php';

$name = $_POST['Name'];
$email = $_POST['Email'];
$password = $_POST['Password'];

$sql = "INSERT INTO cruds (Name, Email, Password) VALUES ('$name', '$email', '$password')";

if($connections->query($sql) === TRUE){
    header("Location: ../crud.php ");
    exit();
}
else{
    echo "Error:" .$sql . "br" .$connections->error;
}