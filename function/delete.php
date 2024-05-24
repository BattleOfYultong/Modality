<?php
   

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["loginID"])) {
        $loginID = $_GET["loginID"];
        
        include '../connections.php';      

        $sql = "DELETE FROM cruds WHERE loginID = $loginID";

        if($connections->query($sql) === TRUE){
            header("Location: ../crud.php");
            exit();
        }
        else{
            echo "Error: ". $$sql . "br" .$connections->error;
        }
    
    }
    else{
        echo "Error";
    }

?>