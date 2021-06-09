<?php

//Require Database connection
require ('include/files/dbconnect.php');

//Start Session
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {

    //Check if email is set
    if(isset($_POST["email"]) and isset($_POST["password"])) {

        //Email & Password from Form
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']); 

        //Checks if login is valid
        $sql = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);

        if($count == 1) {
            //Set Session
            $_SESSION['login_user'] = $email;

            //Set cookie
            setcookie("users", $email, time()+3600, "/","", 0);
            
            header("location: index.php");
         }else {
            Header( 'Location: login.php?failed=2' );
         }
      }

    } 
    elseif (!isset($_POST["email"]) or !isset($_POST["password"])) {
        //Redirects if Email or Password is not entered
        Header( 'Location: login.php?failed=1' );
    }





?>