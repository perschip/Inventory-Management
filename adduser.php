<?php

$page_title = "New Technology User";

require('include/files/header.php');


$query = "SELECT ID FROM users ORDER BY ID DESC LIMIT 1";
$result = mysqli_query($conn, $query) or die (mysqi_error());
$row = mysqli_fetch_assoc($result);

if(isset($_GET['error']) && $_GET['error'] == 1) { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Unable to add new user!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php 
    }

?>


<div class="container">
    <form action="new_user.php" method="POST" style="width:50%; display:inline-block; padding-top:5%">
    <div class="form-group">
        <label for='userID'>ID</label>
        <input type="number" class="form-control" name="userID" id="userOD" value=<?php echo $row['ID']+1 ; ?> readonly>
    </div>
    <div class="form-group">
        <label for="firstName">First Name</label>
        <input type="text" class="form-control" name="firstName" id="firstName" placeholder="John" required>
    </div>
    <div class="form-group">
        <label for="lastName">Last Name</label>
        <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Doe" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="john.doe@domain.com" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="*********" required>
    </div>
    <div class="form-group">
        <label for="permLvl">Position</label>
        <select class="form-select" aria-label="Select User Position" name="permLvl" id="permLvl">
            <option selected>Select Permission Level</option>
            <option value="1">Part Time</option>
            <option value="2">Workstation Specialist</option>
            <option value="3">Network Operations Manager</option>
            <option value="4">Director of Information Technology</option>
        </select>
    </div>
    <div class="form-group">
        <label for="side">Side of Town</label>
        <select class="form-select" aria-label="Select Side of town" name="side" id="side">
            <option selected>Select Side of Town</option>
            <option value="North">Northside</option>
            <option value="South">Southside</option>
            <option value="Middle">Middle School</option>
            <option value="High">High School</option>
        </select>
    </div>
        <button type="submit" class="btn2" name="insert" id="insert" style="display:inline-block;">Add User</button>
    </form>
</div>