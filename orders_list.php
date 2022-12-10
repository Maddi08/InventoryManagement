<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Orders</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="style1.css"/>
<header>
  <div class="container">
    <nav>
        <ul>
            <li><a href="products.php">Products</a>&nbsp;&nbsp;</li>
            <li><a href="suppliers.php">Suppliers</a>&nbsp;&nbsp;</li>
            <li><a href="sales.php">Sales</a>&nbsp;&nbsp;</li>
            <li><a href="logout.php">Logout</a>&nbsp;&nbsp;</li>
    
        </ul>
    </nav>
        
</div>
</header>
</head>
<body>
<h3 class="login-title" style="font-size:50px;text-align:center">Orders</h1>
<div class = "form">
<?php
    include('session_authentication.php');
    require('db.php');
    $query = "SELECT * from `orders` where status='pending'";
    $result = mysqli_query($con, $query);
    echo "<table border='1'>
    <tr>
    <th>Supplier Name</th>
    <th>Supplier Email</th>
    <th>Product</th>
    <th>Quantity</th>
    <th>Recieved</th>
    <th>Cancel</th>
    </tr>";
    while($row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>".$row['supplier_name']."</td>";
        echo "<td>".$row['supplier_email']."</td>";
        echo "<td>".$row['product_name']."</td>";
        echo "<td>".$row['quantity']."</td>";
 ?>
 <td><a href="orders_recieved.php?id=<?php echo $row['order_no']; ?>">Recieved</a></td>
 <td><a href="orders_cancel.php?id=<?php echo $row['order_no']; ?>">Cancel</a></td>
 <?php
 }


?>
 <p class="link"><a href="home.php">Home</a></p>
 <p class='link'><a href='orders_history.php'>Previous Orders</a></p>
</div>

</body>
</html>