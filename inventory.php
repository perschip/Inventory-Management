<?php

$page_title = "District Technology";
$cookie_name = 'users';

$email = $_COOKIE[$cookie_name];

require("include/files/header.php");

$limit = 10;  
if (isset($_GET["page"])) {
	$page  = $_GET["page"]; 
	} 
	else{ 
	$page=1;
	};  
$start_from = ($page-1) * $limit;  
$result = mysqli_query($conn,"SELECT * FROM technology ORDER BY ID ASC LIMIT $start_from, $limit");

$permission_result =  mysqli_query($conn, "SELECT PERMISSION_LEVEL FROM users WHERE EMAIL = '$email' ");
$permission_row = $permission_result->fetch_assoc();

$permission_level = (int) $permission_row['PERMISSION_LEVEL'];

if(isset($_GET['error']) && $_GET['error'] == 1) { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Unable to remove device with ID <?php echo $_GET['id']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php 
    } elseif (isset($_GET['error']) && $_GET['error'] == 2 ) {?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Unable to remove device with ID <?php echo $_GET['id']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
   <?php
    } elseif (isset($_GET['error']) && $_GET['error'] == 3 ) {?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Device with ID:  <?php echo $_GET['id']; ?> Has already been removed
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php }

    if(isset($_GET['success']) && $_GET['success'] == 1) { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Device ID: <?php echo $_GET['id']; ?> Has been removed from the system.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    } elseif(isset($_GET['success']) && $_GET['success'] == 2) { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Device Has been added.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    }


?>

<table class="table table-secondary table-striped">

    <thead>
        <tr>
            <th style="color:black; text-align:center">ID</th>
            <th style="color:black; text-align:center">Device Name</th>
            <th style="color:black; text-align:center">Device IP</th>
            <th style="color:black; text-align:center">Manufacturer</th>
            <th style="color:black; text-align:center">Device Model</th>
            <th style="color:black; text-align:center">Device Serial</th>
            <th style="color:black; text-align:center">Device Location</th>
            <?php
                if($permission_level == 2 or $permission_level == 3 or $permission_level == 4) { ?>
                    <th style="color:black; text-align:center">Edit Device</th>
                    
                <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php  
            while ($row = mysqli_fetch_array($result)) {  

                $id = $row['ID'];

                $ip = $row['DEVICE_IP'];

        ?> 
            <tr>  
				<td><?php echo $row["ID"]; ?></td>  
				<td><?php echo $row["DEVICE_NAME"]; ?></td>
				<td><?php echo $row["DEVICE_IP"]; ?></td>
				<td><?php echo $row["MANUFACTURER"]; ?></td>
                <td><?php echo $row["DEVICE_MODEL"]; ?></td>
                <td><?php echo $row["DEVICE_SERIAL"]; ?></td>
                <td><?php echo $row["DEVICE_LOCATION"]; ?></td>
                <?php
                if($permission_level == 2 or $permission_level == 3 or $permission_level == 4) { ?>
                <td><a href="edit_inventory.php?id=<?php echo $id?>"><button type=submit>Edit</button></a> <a href="deleteInventory.php?id=<?php echo $id?>"><button type=submit>Delete</button></a></td>	
                <?php } ?>
            </tr>  
        <?php  
            };  
        ?> 
    </tbody>
</table>

<?php

$result_db = mysqli_query($conn,"SELECT COUNT(id) FROM technology"); 
$row_db = mysqli_fetch_row($result_db);  
$total_records = $row_db[0];  
$total_pages = ceil($total_records / $limit); 
/* echo  $total_pages; */
$pagLink = "<ul class='pagination'>";  
for ($i=1; $i<=$total_pages; $i++) {
              $pagLink .= "<li class='page-item'><a class='page-link' href='inventory.php?page=".$i."'>".$i."</a></li>";	
}
echo $pagLink . "</ul>";

require('include/files/footer.php');


?>