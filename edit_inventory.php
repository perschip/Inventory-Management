<?php

$page_title = "Edit | Inventory";
$cookie_name = 'users';

$email = $_COOKIE[$cookie_name];

require('include/files/header.php');
require("include/files/dbconnect.php");

$idGlobal = $_GET['id'];


if (!empty($_GET['id'])) {
	
	$query = "SELECT * FROM technology WHERE ID='" . $_GET['id'] . "'";
	$result = mysqli_query( $conn, $query );
    $row = mysqli_fetch_assoc($result);
	
	if (isset( $_POST[ 'itemId' ], $_POST[ 'deviceName' ], $_POST[ 'deviceIP' ], $_POST[ 'serial' ], $_POST[ 'builder' ], $_POST['model'], $_POST['side'])) {
	

	$id = $_REQUEST['itemID'];
    $name = $_REQUEST[ 'deviceName' ];
    $ip = $_REQUEST[ 'deviceIP' ];
    $serial = $_REQUEST[ 'serial' ];
    $builder = $_REQUEST['builder'];
	$model = $_REQUEST[ 'model' ];
	$side = $_REQUEST['side'];
		
		
$sql = "UPDATE technology SET DEVICE_NAME='$name', DEVICE_IP='$ip', MANUFACTURER='$builder'. DEVICE_MODEL='$model', DEVICE_SERIAl='$serial', DEVICE_LOCATION='$side' WHERE ID='$id'";
		
		 if (mysqli_query( $conn, $sql ) ) {
			 header( "Location: inventory.php" );
		 } else {
			 header( "Location: edit_inventory.php?id=$id" );
		 }
		mysqli_close($conn);
	}
}


?>

<div class="container">
    <form action="edit_inventory.php?id=<?php echo $_GET['id']?>" method="POST" style="width:50%; display:inline-block; padding-top:5%">
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
        <button type="submit" class="btn2" name="insert" id="insert" style="display:inline-block;">Update Device</button>
    </form>
</div>

<?php

require('include/files/footer.php');

?>