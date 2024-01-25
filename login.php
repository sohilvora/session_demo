<?php
session_start();
require("dbconnect.php");
if ($_POST) {
    $user_email = $_POST['email'];
    $user_password = $_POST['ps'];

    $q = mysqli_query($con, "select * from register where user_email='" . $user_email . "' and user_password = '" . $user_password . "' ");
    $count = mysqli_num_rows($q);
    $row = mysqli_fetch_array($q);

    if ($count > 0) {
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['user_email'] = $row['user_email'];
        // echo "<script>window.location='home.php'</script>";
        header('location:home.php');
    } else {
        echo "<script>alert('Could'nt Login');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Login Page</title>
</head>

<body>
    <form action="" method="POST" class="text-center">
        <h1>Login</h1>
        <br><br>
        <input type="text" name="email" id="" placeholder="Enter Email">
        <br><br>
        <input type="password" name="ps" id="" placeholder="Enter password">
        <br><br>
        <input type="Submit" value="Login">
    </form>
</body>

</html>