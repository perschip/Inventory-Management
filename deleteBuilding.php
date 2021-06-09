<?php
require("include/files/dbconnect.php");

$id = $_GET['id'];

if (empty( $_GET[ 'id' ])) {
    Header( 'Location: buildings.php?error=1&id=' .$id);
} else {

    $result = mysqli_query($conn, "SELECT * FROM buildings WHERE ID='" . $_GET['id'] . "' LIMIT 1");
    $num_rows = mysqli_num_rows($result);

    if ($num_rows > 0) {
        $sql = "DELETE FROM users where ID='" . $_GET[ 'id' ] . "'";  
        if ( mysqli_query( $conn, $sql ) ) {
            Header( 'Location: buildings.php?success=1&id=' .$id);
        } else {
            Header( 'Location: buildings.php?error=2&id=' .$id);
        }
        mysqli_close( $conn );  
      }
      else {
        Header( 'Location: buildings.php?error=3&id=' .$id);
      }

}

?>