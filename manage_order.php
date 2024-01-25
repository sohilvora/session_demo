<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Employee</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center">View Order</h1>
    <div class="text-center">
        <a href="home.php" class="btn btn-success mt-3">Home</a>
        <a href="add_order.php" class="btn btn-primary mt-3">Add Order</a>
        <a href="logout.php" class="btn btn-danger mt-3">Logout</a>
    </div>
    <table class="table mt-3 border-1">
        <tr>
            <th>No.</th>
            <th>Order_Id</th>
            <th>Order_Date</th>
            <th>Product</th>
            <th>Qty</th>
            <th>Status</th>
        </tr>

        <?php
        require("dbconnect.php");
        session_start();
        if (!isset($_SESSION['user_email'])) {
            header("location:login.php");
        }
        $q = mysqli_query($con, "SELECT * FROM order_master where user_id='{$_SESSION['user_id']}'") or die(mysqli_error($con));
        $i = 1;
        if (mysqli_num_rows($q) != 0) {
            while ($r = mysqli_fetch_array($q)) {
        ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $r['order_id'] ?></td>
                    <td><?= $r['order_date'] ?></td>
                    <td><?= $r['product_name'] ?></td>
                    <td><?= $r['product_qty'] ?></td>
                    <td><?= $r['order_status'] ?></td>

                </tr>
            <?php
                $i++;
            }
        } else {
            ?>
            <tr>
                <td colspan="5">No Records Found</td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>