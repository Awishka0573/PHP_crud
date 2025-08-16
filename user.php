<?php

include 'connect.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];


    $sql = "INSERT INTO crud (name, email, mobile, password) 
    VALUES ('$name', '$email', '$mobile', '$password')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.rtl.min.css">
    <title>CRUD</title>
</head>

<body>
    <div class="container my-5" >
        <form method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter your name" autocomplete="off" name="name">
            </div>
           <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email" autocomplete="off" name="email">
            </div>
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile</label>
                <input type="text" class="form-control" id="mobile" placeholder="Enter your mobile number" autocomplete="off" name="mobile">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" id="password"placeholder="Enter your password"autocomplete="off" name="password">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
        </form>


    </div>

</body>

</html>