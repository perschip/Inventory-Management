<?php

$page_title = "Home | Site Statistics";

include('include/files/header.php');

?>

<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Information!</strong> Please be paitent as the site is still a work in progress. Any bugs or issues please email
   <a href="mailto:paul.perschilli@monroe.k12.nj.us" class="alert-link">Paul Perschilli</a>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<!--Statistic Box Layout-->
<div class="container">
  <div class="row">
    <div class="col">
      <div class="inventory">
        Total Technology Devices<br>
        <?php
        $inv = "SELECT * FROM technology";

        $invresult = mysqli_query( $conn, $inv );

        if ( $invresult ) {
          // it return number of rows in the table. 
          $row = mysqli_num_rows( $invresult );

          printf( $row );

          // close the result. 
          mysqli_free_result( $invresult );
        }
        ?>
      </div>
    </div>
    <div class="col">
      <div class="techstaff">
      Total Technology Staff <br>
        <?php
        $techstaff = "SELECT * FROM users";

        $techresult = mysqli_query( $conn, $techstaff );

        if ( $techresult ) {
          // it return number of rows in the table. 
          $row = mysqli_num_rows( $techresult );

          printf( $row );

          // close the result. 
          mysqli_free_result( $techresult );
        }
        ?>
      </div>
    </div>
    <div class="col">
      <div class="districtstaff">
      Total District Staff <br>
        <?php
        $staff = "SELECT * FROM district_staff";

        $staffresult = mysqli_query( $conn, $staff );

        if ( $staffresult ) {
          // it return number of rows in the table. 
          $row = mysqli_num_rows( $staffresult );

          printf( $row );

          // close the result. 
          mysqli_free_result( $staffresult );
        }
        ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="orders">
      Total Orders <br>
        <?php
        $order = "SELECT * FROM orders";

        $orderresult = mysqli_query( $conn, $order );

        if ( $orderresult ) {
          // it return number of rows in the table. 
          $row = mysqli_num_rows( $orderresult );

          printf( $row );

          // close the result. 
          mysqli_free_result( $orderresult );
        }
        ?>
      </div>
    </div>
    <div class="col">
      <div class="tickets">
      Total District Staff <br>
        <?php
        $tickets = "SELECT * FROM tickets";

        $ticketresult = mysqli_query( $conn, $tickets );

        if ( $ticketresult ) {
          // it return number of rows in the table. 
          $row = mysqli_num_rows( $ticketresult );

          printf( $row );

          // close the result. 
          mysqli_free_result( $ticketresult );
        }
        ?>
      </div>
    </div>
  </div>
</div>


<?php

include('include/files/footer.php');

?>