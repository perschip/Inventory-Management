<?php

$page_title = "Technology Users";
$cookie_name = 'users';

$email = $_COOKIE[$cookie_name];

require('include/files/header.php');

$limit = 10;  
if (isset($_GET["page"])) {
	$page  = $_GET["page"]; 
	} 
	else{ 
	$page=1;
	};  
$start_from = ($page-1) * $limit;  
$result = mysqli_query($conn,"SELECT * FROM users ORDER BY ID ASC LIMIT $start_from, $limit");

$permission_result =  mysqli_query($conn, "SELECT PERMISSION_LEVEL FROM users WHERE EMAIL = '$email' ");
$permission_row = $permission_result->fetch_assoc();

$permission_level = (int) $permission_row['PERMISSION_LEVEL'];


if(isset($_GET['error']) && $_GET['error'] == 1) { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Unable to remove user with ID <?php echo $_GET['id']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php 
    } elseif (isset($_GET['error']) && $_GET['error'] == 2 ) {?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Unable to remove user with ID <?php echo $_GET['id']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
   <?php
    } elseif (isset($_GET['error']) && $_GET['error'] == 3 ) {?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> User with ID:  <?php echo $_GET['id']; ?> Has already been removed
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php }

    if(isset($_GET['success']) && $_GET['success'] == 1) { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> User ID: <?php echo $_GET['id']; ?> Has been removed from the system.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    }
    
    elseif(isset($_GET['success']) && $_GET['success'] == 2) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> New User Added!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
        }
?>

<table class="table table-secondary table-striped">

    <thead>
        <tr>
            <th style="color:black; text-align:center">ID</th>
            <th style="color:black; text-align:center">First Name</th>
            <th style="color:black; text-align:center">Last Name</th>
            <th style="color:black; text-align:center">Email</th>
            <th style="color:black; text-align:center">Side of Town</th>
            <?php
                if($permission_level == 3 or $permission_level == 4) { ?>
                    <th style="color:black; text-align:center">Edit User</th>
                    
                <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php  
            while ($row = mysqli_fetch_array($result)) {  

                $id = $row['ID'];
                $side = $row['SCHOOL'];
        ?> 
            <tr>  
				<td><?php echo $row["ID"]; ?></td>  
				<td><?php echo $row["FIRST_NAME"]; ?></td>
				<td><?php echo $row["LAST_NAME"]; ?></td>
				<td><?php echo $row["EMAIL"]; ?></td>
                <?php

                    if($side == "North") { ?>
                        <td>Northside</td>
                <?php  
                     } elseif($side == "South") { ?>
                        <td>Northside</td>
                <?php  
                     } elseif($side == "Middle") { ?>  
                        <td>Middle School</td>
                <?php 
                    } else { ?>
                        <td>High School</td>
                <?php 
                    }
                ?>
                <td><a href="editUser.php?id=<?php echo $id?>"><button type=submit>Edit</button></a> <a href="deleteUser.php?id=<?php echo $id?>"><button type=submit>Delete</button></a></td>	
            </tr>  
        <?php  
            };  
        ?> 
    </tbody>
</table>
<?php

$result_db = mysqli_query($conn,"SELECT COUNT(id) FROM users"); 
$row_db = mysqli_fetch_row($result_db);  
$total_records = $row_db[0];  
$total_pages = ceil($total_records / $limit); 
/* echo  $total_pages; */
$pagLink = "<ul class='pagination'>";  
for ($i=1; $i<=$total_pages; $i++) {
              $pagLink .= "<li class='page-item'><a class='page-link' href='users.php?page=".$i."'>".$i."</a></li>";	
}
echo $pagLink . "</ul>";

require('include/files/footer.php');

?>