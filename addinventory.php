<?php

$page_title = "New Technology Device";

require('include/files/header.php');


$query = "SELECT ID FROM technology ORDER BY ID DESC LIMIT 1";
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
    <form action="new_inventory.php" method="POST" style="width:50%; display:inline-block; padding-top:5%">
    <div class="form-group">
        <label for='itemID'>ID</label>
        <input type="number" class="form-control" name="itemID" id="itemID" value=<?php echo $row['ID']+1 ; ?> readonly>
    </div>
    <div class="form-group">
        <label for="deviceName">Device Name</label>
        <input type="text" class="form-control" name="deviceName" id="deviceName" placeholder="JDOEDELL" required>
    </div>
    <div class="form-group">
        <label for="deviceIP">Device IP</label>
        <input type="text" class="form-control" name="deviceIP" id="deviceIP" placeholder="127.0.0.1" required>
    </div>
    <div class="form-group">
        <label for="serial">Serial Number</label>
        <input type="text" class="form-control" name="serial" id="serial" placeholder="DMP547FX" required>
    </div>
    <div class="form-group">
        <label for="builder">Manufactuer</label>
        <input type="text" class="form-control" name="builder" id="builder" placeholder="Dell" required>
    </div>
    <div class="form-group">
        <label for="model">Device Model</label>
        <input type="text" class="form-control" name="model" id="model" placeholder="Latitude 7400" required>
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
        <button type="submit" class="btn2" name="insert" id="insert" style="display:inline-block;">Add Device</button>
    </form>
</div>