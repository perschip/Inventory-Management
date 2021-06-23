<?php

require("include/files/dbconnect.php");

// Check if Submit button is pressed
if(isset($_POST['insert'])) {
    //Check if all fields are filled out
    if (isset($_POST['buildingID'], $_POST['buildingName'], $_POST['address'], $_POST['city'], $_POST['state'], $_POST['zip'])) {
        // Declare Variable with value from form
        $ID = $_POST['buildingID'];
        $BUILDING_NAME = $_POST['buildingName'];
        $BUILDING_ADDRESS = $_POST['address'];
        $BUILDING_CITY = $_POST['city'];
        $BUILDING_STATE = $_POST['state'];
        $BUILDING_ZIP = $_POST['zip'];
        //SQL Statement to Insert data into database
        $query = "INSERT INTO buildings (ID, NAME, ADDRESS, CITY, STATE, ZIPCODE) 
        VALUES ('$ID', '$BUILDING_NAME', '$BUILDING_ADDRESS', '$BUILDING_CITY', '$BUILDING_STATE', '$BUILDING_ZIP')";

        //Run SQL Query
        if (mysqli_query($conn, $query)) {
            Header( 'Location: buildings.php?success=2');
        } else {
            //Header( 'Location: adduser.php?error=1');
            echo mysqli_error( $conn );
        }
        //Close SQL Connection
        mysqli_close( $conn );
    }
}

?>