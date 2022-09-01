<?php
  
    $con = mysqli_connect("localhost","root","root","admin_panel");
  
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>