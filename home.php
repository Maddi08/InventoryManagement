<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Products</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="style1.css"/>
<header>
  <div class="container">
    <nav>
        <ul>
            <li><a href="addProducts.php">Products</a>&nbsp;&nbsp;</li>
            <li><a href="suppliers.php">Suppliers</a>&nbsp;&nbsp;</li>
            <li><a href="orders.php">Orders</a>&nbsp;&nbsp;</li>
            <li><a href="sales.php">Sales</a>&nbsp;&nbsp;</li>
            <li><a href="logout.php">Logout</a>&nbsp;&nbsp;</li>
    
        </ul>
    </nav>
        
</div>
</header>
</head>
<body>
<h3 class="login-title" style="font-size:50px;text-align:center">Products</h1>
<div class = "form">
<?php
    include('session_authentication.php');
    require('db.php');
    $query = "SELECT * from `products`";
    $result = mysqli_query($con, $query);
    echo "<table border='1'>
    <tr>
    <th>Product Image</th>
    <th>Product Name</th>
    <th>Quantity</th>
    <th>Price</th>
    <th>Edit</th>
    <th>Delete</th>
    </tr>";
    while($row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td><img src='productImages/{$row['image']}' width='100'></td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['quantity']."</td>";
        echo "<td>".$row['price']."</td>";
 ?>
 <td><a href="edit.php?name=<?php echo $row['name']; ?>">Edit</a></td>
 <td><a href="delete.php?name=<?php echo $row['name']; ?>">Delete</a></td>
 <?php
 }
 ?>
 <p class="link"><a href="addProducts.php">addProducts</a></p>
</div>

</body>
</html>