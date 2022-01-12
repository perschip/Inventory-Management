<?php

require 'include/files/dbconnect.php';
session_start();

$cookie_name = 'users';

//Checks to see if cookie is set
if(!isset($_COOKIE[$cookie_name])) {
    Header( 'Location: login.php?failed=3' );
} 

$permission_result =  mysqli_query($conn, "SELECT PERMISSION_LEVEL FROM users WHERE EMAIL = '$_COOKIE[$cookie_name]' ");
$permission_row = $permission_result->fetch_assoc();

$permission_level = (int) $permission_row['PERMISSION_LEVEL'];
?>

<!doctype html>

<HTML>

<head>

    <title><?php echo $page_title; ?> </title>

    <!--Loads Bootstrap and Custom CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="include/css/style.css">
   <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    <meta charset="UTF-8">
</head>



<body>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-secondary">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">

            <!--Text Logo-->
                <div class="logo">
                    <h4 style="color: mediumslateblue; ">Monroe Township</h4>
                    <h4 style="color: goldenrod;">Technology Department</h4>
                </div>

                  <!--Home Nav Button-->
                  <div class="dropdown pb-4" >
                    <a href="index.php" class="d-flex align-items-center text-white text-decoration-none">
                        <span class="d-none d-sm-inline mx-1">Home</span>
                    </a>
                </div>
                <!--Inventory Nav Menu-->
                <div class="dropdown pb-4" >
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownInventory" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="d-none d-sm-inline mx-1">Inventory</span>
                    </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="inventory.php">Show Inventory</a></li>
                            <li><a class="dropdown-item" href="addinventory.php">Add Inventory</a></li>
                        </ul>
                </div>

                <!--Orders Nav Menu-->
                <div class="dropdown pb-4" >
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownOrders" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="d-none d-sm-inline mx-1">Orders</span>
                    </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="#">Show Orders</a></li>
                            <li><a class="dropdown-item" href="#">Add Order</a></li>
                            <li><a class="dropdown-item" href="#">Complete Order</a></li>
                            <li><a class="dropdown-item" href="#">Completed Order</a></li>
                        </ul>
                </div>

                <!--Buildings Nav Menu-->
                <div class="dropdown pb-4" >
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownBuildings" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="d-none d-sm-inline mx-1">Buildings</span>
                    </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="buildings.php">Show Buildings</a></li>
                            <li><a class="dropdown-item" href="addbuilding.php">Add Buildings</a></li>
                            <li><a class="dropdown-item" href="buildinggroup.php">Buildings Group</a></li>
                            <li><a class="dropdown-item" href="addbuildinggroup.php">Add Buildings Group</a></li>
                        </ul>
                </div>

                <!--User Nav Menu-->
                <div class="dropdown pb-4" >
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUsers" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="d-none d-sm-inline mx-1">Users</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="users.php">Show Users</a></li>
                        <?php
                             if($permission_level == 3 or $permission_level == 4) { ?>
                        <li><a class="dropdown-item" href="adduser.php">Add Users</a></li>

                        <?php } ?>
                    </ul>
                </div>

                <!--District Staff Nav Menu-->
                <div class="dropdown pb-4" >
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUsers" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="d-none d-sm-inline mx-1">District Staff</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="staff.php">Show Staff</a></li>
                        <li><a class="dropdown-item" href="addstaff.php">Add Staff</a></li>
                    </ul>
                </div>
                <hr>

                <!--Signed in User Menu-->
                <div class="dropdown pb-4" style="position:fixed; bottom:0">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="include/img/profilepic.png" alt="profile" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1"> <?php echo $_COOKIE[$cookie_name];?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col py-3">
        <center><h2><?php echo $page_title ?></h2></center>
        <hr>