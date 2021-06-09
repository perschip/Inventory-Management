<?php
session_start();
if(isset($_COOKIE[session_name()])):
    setcookie(session_name(), '', time()-7000000, '/');
endif;
if(isset($_COOKIE['users'])):
    setcookie('users', '', time()-7000000, '/');
endif;
header("Location:login.php?success=2");
?>
