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
            <li><a href="products.php">Products</a>&nbsp;&nbsp;</li>
            <li><a href="orders.php">Orders</a>&nbsp;&nbsp;</li>
            <li><a href="logout.php">Logout</a>&nbsp;&nbsp;</li>
    
        </ul>
    </nav>
        
</div>
</header>
</head>
<body>
<h3 class="login-title" style="font-size:50px;text-align:center">Sales</h1>
<div class = "form">
<?php
    include('session_authentication.php');
    require('db.php');
    $query = "SELECT * from `sales`";
    $result = mysqli_query($con, $query);
    echo "<table border='1'>
    <tr>
    <th>Name</th>
    <th>Date</th>
    <th>total</th>
    </tr>";
    while($row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['sale_date']."</td>";
        echo "<td>".$row['total_price']."</td>";
 ?>

 <?php
    }
?>
 <p class="link"><a href="sales.php">Sales</a></p>
</div>

</body>
</html>