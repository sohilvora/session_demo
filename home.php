<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>HomePage</title>
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION['user_email'])) {
        header("location:login.php");
    }
    ?>
    <h1 class='p-4 text-center'> This is Home Page</h1>
    <h1 class='text-center'>Welcome&nbsp;<?= $_SESSION['user_name'] ?></h1>
    <div class='text-center'>
        <a href=add_order.php class='btn btn-primary'>Add Order</a>
        <a href=manage_order.php class='btn btn-info'>Manage Order</a>
        <a href=logout.php class='btn btn-danger'>Logout</a>
    </div>
</body>
</html>