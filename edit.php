<?php
// Include config file
require_once "config.php";

    if(isset($_POST["submit"])){

       
        $id = $_POST["id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $lastname = $_POST["lastname"];
        $phonenumber = $_POST["phonenumber"];
    
        $sql = "UPDATE students set name = '$name' , lastname = '$lastname' ,
         email =  '$email', phonenumber = '$phonenumber' where id = '$id'";
        $result = $link->query($sql);
        if($result){
            header("location:index.php");
        }else{
            echo "error";

        }

    }

?>