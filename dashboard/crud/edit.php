<?php

    include '../../registration/db.php';

    $id = $_GET['id'];

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $usertype = $_POST['usertype'];

        $sql = "UPDATE `users` SET `username`='$username', `password`='$password', `usertype`='$usertype' WHERE id = $id"; 

        $result = mysqli_query($con, $sql);

        if($result) {
            header("Location: ../tables-data.php?msg=Data updated successfully");
        } 
        else{
            echo("Failed:" . mysqli_error($con));
        }
    }


?>

<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
    
    <div class="container">

        <?php 
            $id = $_GET['id'];
            $sql = "SELECT * FROM `users` WHERE id = $id LIMIT 1";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
        ?>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">

                <div class="row">
                    <div class="col">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $row['username'] ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">password</label>
                        <input type="text" class="form-control" name="password" value="<?php echo $row['password'] ?>">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Usertype</label>
                    <input type="usertype" class="form-control" name="usertype" value="<?php echo $row['usertype'] ?>">
                </div>

              
                <div>
                    <button type="submit" class="btn btn-primary" name="submit">Save</button>
                    <a href="tables-data.php" class="btn btn-danger">Cansel</a>
                </div>


            </form>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body> 
</html>