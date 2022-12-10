<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Update</title>
    <h1 style="font-size:50px;text-align:center;color:#000000;background-color:white">Inventory Management System</h1>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
	include('db.php');
	$id=$_GET['id'];
	$query=mysqli_query($con,"select * from `orders` where order_no='$id'");
	$row=mysqli_fetch_array($query);
    $quantity1=$row['quantity'];
    $name=$row['product_name'];
    $query1=mysqli_query($con,"select * from `products` where name='$name'");
    $row1=mysqli_fetch_array($query1);
    $quantity2=$row['quantity'];
    $quantity = $quantity1+$quantity2;
    mysqli_query($con,"update `products` set quantity='$quantity' where name='$name'");
    mysqli_query($con,"update `orders` set status='completed' where order_no='$id'");
	echo "<div class='form'>
    <h3>Order Recieved</h3><br/>
    <p class='link'>Click here to see products<a href='products.php'>Products</a></p>
    </div>";
?>
</body>
</html>