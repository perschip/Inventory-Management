
<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="include/css/login.css">
<meta charset="UTF-8">
<title>Login</title>
</head>

<body>
<div class="content">
  <div class="logo">
	  <h1 style="color: mediumslateblue;">Monroe Township</h1>
    <h1 style="color: goldenrod;">Technology Department</h1>
	<br>
  </div>
  <form action="login_handle.php" method="POST">
    <div class="box">
      <h1>Login</h1>
      <?php

          if ( isset($_GET['failed']) && $_GET['failed'] == 1 )
          {
              // Display Error message
              echo "<h3 style=color:red;>Please enter both Email/Password</h3>";
          } elseif ( isset($_GET['failed']) && $_GET['failed'] == 2 ) {
            echo "<h3 style=color:red;>Invalid Email/Password</h3>";
          } elseif ( isset($_GET['failed']) && $_GET['failed'] == 3)  {
            echo "<h3 style=color:red;>Session Expired</h3>";
          }

          if(isset($_GET['success']) && $_GET['success'] == 2) {
            echo "<h3 style=color:Green;>Logged Out</h3>";
          }
        ?> 
      <input type="email" name="email" placeholder="example@email.com"  class="email" />
      <input type="password" name="password" placeholder="******" class="password" />
      <center>
        <button class="btn" type="submit" name="login" style="float: none">Sign In</button>
      </center>
    </div>
  </form>
</div>
</body>
</html>
