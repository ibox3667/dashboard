<?php

    include '../../registration/db.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM `users` WHERE id = $id";
    $result = mysqli_query($con, $sql);

    if($result){
        header("Location: tables-data.php?msg=Record Delete successfully");
    }
    else {
        echo "Failed: " . mysqli_error($con);
    }

?>