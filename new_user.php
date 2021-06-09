<?php

require("include/files/dbconnect.php");

// Check if Submit button is pressed
if(isset($_POST['insert'])) {
    //Check if all fields are filled out
    if (isset($_POST['userID'], $_POST['email'], $_POST['firstName'], $_POST['lastName'], $_POST['password'], $_POST['permLvl'], $_POST['side'])) {
        // Declare Variable with value from form
        $ID = $_POST['userID'];
        $FIRST_NAME = $_POST['firstName'];
        $LAST_NAME = $_POST['lastName'];
        $EMAIL = $_POST['email'];
        $PASSWORD = $_POST['password'];
        $PERMISSION_LEVEL = $_POST['permLvl'];
        $SIDE = $_POST['side'];

        //SQL Statement to Insert data into database
        $query = "INSERT INTO users (ID, EMAIL, PASSWORD, FIRST_NAME, LAST_NAME, PERMISSION_LEVEL, SCHOOL) 
        VALUES ('$ID', '$EMAIL', SHA1('$PASSWORD'), '$FIRST_NAME', '$LAST_NAME', '$PERMISSION_LEVEL', '$SIDE')";

        //Run SQL Query
        if (mysqli_query($conn, $query)) {
            Header( 'Location: users.php?success=2');
        } else {
            //Header( 'Location: adduser.php?error=1');
            echo mysqli_error( $conn );
        }
        //Close SQL Connection
        mysqli_close( $conn );
    }
}

?>