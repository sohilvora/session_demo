<?php
require "dbconnect.php";
session_start();
if (!isset($_SESSION['user_email'])) {
    header("location:login.php");
}
if ($_POST) {
    $order_date = date('d-m-y');
    $user_id = $_SESSION['user_id'];
    $product_name = $_POST['p_name'];
    $product_qty = $_POST['p_qty'];
    $order_status = "pending";

    $q = mysqli_query($con, "insert into order_master(order_date,user_id,product_name,product_qty,order_status)values('{$order_date}','{$user_id}','{$product_name}','{$product_qty}','{$order_status}')") or die(mysqli_error($con));

    if ($q) {
        echo "<script>alert('Your Order Place Successfully');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Order</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center mt-3">Add Order</h1>
    <div class="text-center">
        <a href="home.php" class="btn btn-success mt-3">Home</a>
        <a href="manage_order.php" class="btn btn-warning mt-3">Manage Order</a>
        <a href="logout.php" class="btn btn-danger mt-3">Logout</a>
    </div>
    <form action="" method="post" class="text-center mt-3">
        Product Name: <input type="text" name="p_name" id="">
        <br><br>
        Product Qty: <input type="text" name="p_qty" id="">
        <br><br>
        <input type="submit" class="btn btn-primary" value="submit">
    </form>
</body>

</html>