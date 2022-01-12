<?php

$page_title = "Edit | Building";
$cookie_name = 'users';

$email = $_COOKIE[$cookie_name];

require('include/files/header.php');
require("include/files/dbconnect.php");

$idGlobal = $_GET['id'];


if (!empty($_GET['id'])) {
	
	$query = "SELECT * FROM buildings WHERE ID='" . $_GET['id'] . "'";
	$result = mysqli_query( $conn, $query );
    $row = mysqli_fetch_assoc($result);
	
	if (isset( $_POST[ 'buildingID' ], $_POST[ 'Name' ], $_POST[ 'Address' ], $_POST[ 'city' ], $_POST[ 'state' ], $_POST['zip'])) {
	

	$id = $_REQUEST['buildingID'];
    $name = $_REQUEST[ 'Name' ];
    $address = $_REQUEST[ 'Address' ];
    $city = $_REQUEST[ 'city' ];
    $state = $_REQUEST['state'];
	$zip = $_REQUEST[ 'zip' ];
		
				echo $id;
		echo $name;
		echo $address;
		echo $city;
		echo $state;
		echo $zip;
		
		
$sql = "UPDATE buildings SET NAME='$name', ADDRESS='$address', CITY='$city'. STATE='$state', ZIPCODE='$zip' WHERE ID='$id'";
	
	//$sql = "UPDATE users SET FIRST_NAME='" . $first_name . "', LAST_NAME='" . $last_name . "', EMAIL='" . $email . "', PERMISSION_LEVEL='" . $permLvl . "', SCHOOL='" .$side . "' WHERE ID='" . $id . "'";
		
		 if (mysqli_query( $conn, $sql ) ) {
			 header( "Location: buildings.php" );
		 } else {
			 //header( "Location: edit_building.php?id=$id" );
		 }
		mysqli_close($conn);
	}
}


?>

<div class="container">
    <form action="edit_building.php?id=<?php echo $_GET['id']?>" method="POST" style="width:50%; display:inline-block; padding-top:5%">
    <div class="form-group">
        <label for="buildingID">ID</label>
        <input type="number" class="form-control" name="buildingID" id="buildingID" value=<?php echo $row['ID'] ; ?> readonly>
    </div>
    <div class="form-group">
        <label for="Name">Building Name</label>
        <input type="text" class="form-control" name="Name" id="Name" value=<?php echo $row['NAME'];?> required>
    </div>
    <div class="form-group">
        <label for="Address">Building Address</label>
        <input type="text" class="form-control" name="Address" id="Address" value=<?php echo $row['ADDRESS'];?> required>
    </div>
    <div class="form-group">
        <label for="city">City</label>
        <input type="text" class="form-control" name="city" id="city" value=<?php echo $row['CITY'];?> required>
    </div>
    <div class="form-group">
        <label for="state">State</label>
        <input type="text" class="form-control" name="state" id="state" value=<?php echo $row['STATE'];?> required>
    </div>
    <div class="form-group">
        <label for="zip">Zipcode</label>
        <input type="text" class="form-control" name="zip" id="zip" value=<?php echo $row['ZIPCODE'];?> required>
    </div>
        <button type="submit" class="btn2" name="update" id="update" style="display:inline-block;">Update Building</button>
    </form>
</div>

<?php

require('include/files/footer.php');

?>