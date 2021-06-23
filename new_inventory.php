<?php

require("include/files/dbconnect.php");

// Check if Submit button is pressed
if(isset($_POST['insert'])) {
    //Check if all fields are filled out
    if (isset($_POST['itemID'], $_POST['deviceName'], $_POST['deviceIP'], $_POST['serial'], $_POST['builder'], $_POST['model'], $_POST['side'])) {
        // Declare Variable with value from form
        $ID = $_POST['itemID'];
        $DEVICE_NAME = $_POST['deviceName'];
        $DEVICE_IP = $_POST['deviceIP'];
        $MANUFACTURER = $_POST['builder'];
        $DEVICE_MODEL = $_POST['model'];
        $DEVICE_SERIAL = $_POST['serial'];
        $SIDE = $_POST['side'];

        //SQL Statement to Insert data into database
        $query = "INSERT INTO technology (ID, DEVICE_NAME, DEVICE_IP, MANUFACTURER, DEVICE_MODEL, DEVICE_SERIAL, DEVICE_LOCATION) 
        VALUES ('$ID', '$DEVICE_NAME', '$DEVICE_IP', '$MANUFACTURER', '$DEVICE_MODEL', '$DEVICE_SERIAL', '$SIDE')";

        //Run SQL Query
        if (mysqli_query($conn, $query)) {
            Header( 'Location: inventory.php?success=2');
        } else {
            //Header( 'Location: adduser.php?error=1');
            echo mysqli_error( $conn );
        }
        //Close SQL Connection
        mysqli_close( $conn );
    }
}

?>