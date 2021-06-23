<?php

$page_title = "New Building";

require('include/files/header.php');


$query = "SELECT ID FROM buildings ORDER BY ID DESC LIMIT 1";
$result = mysqli_query($conn, $query) or die (mysqi_error());
$row = mysqli_fetch_assoc($result);

if(isset($_GET['error']) && $_GET['error'] == 1) { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Unable to add new building!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php 
    }

?>


<div class="container">
    <form action="new_building.php" method="POST" style="width:50%; display:inline-block; padding-top:5%">
    <div class="form-group">
        <label for='buildingID'>ID</label>
        <input type="number" class="form-control" name="buildingID" id="buildingID" value=<?php echo $row['ID']+1 ; ?> readonly>
    </div>
    <div class="form-group">
        <label for="buildingName">Building Name</label>
        <input type="text" class="form-control" name="buildingName" id="buildingName" placeholder="High School" required>
    </div>
    <div class="form-group">
        <label for="address">Building Address</label>
        <input type="text" class="form-control" name="address" id="address" placeholder="157 Main Steet" required>
    </div>
    <div class="form-group">
        <label for="city">Building City</label>
        <input type="text" class="form-control" name="city" id="city" placeholder="Trenton" required>
    </div>
    <div class="form-group">
        <label for="state">Building State</label>
        <input type="text" class="form-control" name="state" id="state" placeholder="NJ" required>
    </div>
    <div class="form-group">
        <label for="zip">Building Zip Code</label>
        <input type="text" class="form-control" name="zip" id="zip" placeholder="08831" required>
    </div>
        <button type="submit" class="btn2" name="insert" id="insert" style="display:inline-block;">Add Building</button>
    </form>
</div>