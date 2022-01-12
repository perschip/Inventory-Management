<?php

$page_title = "Edit | Technology Users";
$cookie_name = 'users';

$email = $_COOKIE[$cookie_name];

require('include/files/header.php');
require("include/files/dbconnect.php");

$idGlobal = $_GET['id'];


if (!empty($_GET['id'])) {
	
	echo $_GET['id'];
	
	$query = "SELECT * FROM users WHERE ID='$idGlobal'";
	$result = mysqli_query( $conn, $query );
    $row = mysqli_fetch_assoc($result);
	
	if (isset( $_POST[ 'userID' ], $_POST[ 'firstName' ], $_POST[ 'lastName' ], $_POST[ 'email' ], $_POST[ 'permLvl' ], $_POST['side'])) {
	

	$id = $_POST['userID'];
    $first_name = $_POST[ 'firstName' ];
    $last_name = $_POST[ 'lastName' ];
    $email = $_POST[ 'email' ];
    $permLvl = $_POST['perm'];
	$side = $_POST[ 'side' ];
		
				echo $id;
		echo $first_name;
		echo $last_name;
		echo $email;
		echo $permLvl;
		echo $side;
		
		
$sql = "UPDATE users SET FIRST_NAME='$first_name', LAST_NAME='$last_name', EMAIL='$email'. PERMISSION_LEVEL='$permLvl', SCHOOL='$side' WHERE ID='$id'";
	
	//$sql = "UPDATE users SET FIRST_NAME='" . $first_name . "', LAST_NAME='" . $last_name . "', EMAIL='" . $email . "', PERMISSION_LEVEL='" . $permLvl . "', SCHOOL='" .$side . "' WHERE ID='" . $id . "'";
		
		 if (mysqli_query( $conn, $sql ) ) {
			 header( "Location: users.php" );
		 } else {
			 header( "Location: edit_user.php?id=$id" );
		 }
		mysqli_close($conn);
	}
}


?>

<div class="container">
    <form action="edit_user.php?id=<?php echo $_GET['id']?>" method="POST" style="width:50%; display:inline-block; padding-top:5%">
    <div class="form-group">
        <label for="userID">ID</label>
        <input type="number" class="form-control" name="userID" id="userID" value=<?php echo $row['ID'] ; ?> readonly>
    </div>
    <div class="form-group">
        <label for="firstName">First Name</label>
        <input type="text" class="form-control" name="firstName" id="firstName" value=<?php echo $row['FIRST_NAME'];?> required>
    </div>
    <div class="form-group">
        <label for="lastName">Last Name</label>
        <input type="text" class="form-control" name="lastName" id="lastName" value=<?php echo $row['LAST_NAME'];?> required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" value=<?php echo $row['EMAIL'];?> required>
    </div>
    <div class="form-group">
        <label for="permLvl">Position</label>
        <select class="form-select" aria-label="Select User Position" name="perm" id="perm">
            <option selected>Select Permission Level</option>
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
        <button type="submit" class="btn2" name="update" id="update" style="display:inline-block;">Updat User</button>
    </form>
</div>

<?php

require('include/files/footer.php');

?>