<?php

  session_start();
if ($_SESSION['store'] == true) {
        echo "<h2>Access Approved!! Welcome to your account.</h2>";
} 
else {
   header("Location:project1/index.html");
    exit();
  }


?>
