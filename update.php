<?php

include 'connect.php';

$id = $_GET['updateid'];
$sql = "SELECT * FROM crud WHERE id=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$email = $row['email'];
$mobile = $row['mobile'];
$password = $row['password'];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    // Use prepared statements for security
    $sql = "UPDATE crud SET name=?, email=?, mobile=?, password=? WHERE id=?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi", $name, $email, $mobile, $password, $id);

    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // echo "Data updated successfully";
        header('location:display.php'); 
    } else {
        echo "Error: " . mysqli_error($con);
    }
    mysqli_stmt_close($stmt);
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
                <input type="text" class="form-control" id="name" placeholder="Enter your name" autocomplete="off" name="name" value="<?php echo $name; ?>">
            </div>
           <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email" autocomplete="off" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile</label>
                <input type="text" class="form-control" id="mobile" placeholder="Enter your mobile number" autocomplete="off" name="mobile" value="<?php echo $mobile; ?>">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" id="password"placeholder="Enter your password"autocomplete="off" name="password" value="<?php echo $password; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
        </form>


    </div>

</body>

</html>