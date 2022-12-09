<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Sales</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="style1.css"/>
<header>
  <div class="container">
    <nav>
        <ul>
            <li><a href="products.php">Products</a>&nbsp;&nbsp;</li>
            <li><a href="orders.php">Orders</a>&nbsp;&nbsp;</li>
            <li><a href="suppliers.php">Suppliers</a>&nbsp;&nbsp;</li>
            <li><a href="logout.php">Logout</a>&nbsp;&nbsp;</li>
    
        </ul>
    </nav>        
</div>
</header>
</head>
<body>
<h3 class="login-title" style="font-size:50px;text-align:center">Sales</h1>

<?php
    include('session_authentication.php');
    require('db.php');
    if(isset($_POST['sale'])){
        $name = stripslashes($_REQUEST['name']);
        $name = mysqli_real_escape_string($con, $name);
        $sales_date = stripslashes($_REQUEST['sale_date']);
        $sales_date = mysqli_real_escape_string($con, $sales_date);
        $productName = stripslashes($_REQUEST['productName']);
        $productName = mysqli_real_escape_string($con, $productName);
        $quantity = stripslashes($_REQUEST['quantity']);
        $quantity = mysqli_real_escape_string($con, $quantity);
        $query = mysqli_query($con, "select * from `products` where name='$productName'");
        $row = mysqli_fetch_array($query);
        $total_price = (int)$quantity*(int)$row['price'];
        $remaining_quantity = (int)$row['quantity']-(int)$quantity;
        $tax = "7%";
        $total_price_with_tax = $total_price*1.07;
        $query1   = "INSERT into `sales` (name, sale_date, productName, quantity, total_price)
                     VALUES ('$name','$sales_date', '$productName', '$quantity','$total_price_with_tax')";
        $result1   = mysqli_query($con, $query1);

        if ($result1){
            $query2=mysqli_query($con,"update `products` set quantity='$remaining_quantity' where name='$productName'");
            ?>
            <div class="form">
            <?php
            echo "<table border='1'>";
            echo "<tr><td>Quanity-->".$quantity."</td></tr>";
            echo "<tr><td>Price--->".$total_price."</td></tr>";
            echo "<tr><td>tax--->".$tax."</td></tr>";
            echo "<tr><td>Total-->".$total_price_with_tax."</td></tr>";
            echo "<h3>Sale completed</h3><br/>
            <p class='link'>Click here to <a href='sales.php'>sales</a> again.</p>
            </div>"; ?>
            </div>
        <?php    
        } else {
            echo "<div class='form'>
            <h3>Field Missing</h3><br/>
            <p class='link'>Click here to <a href='sales.php'>Sales</a> again.</p>
            </div>";

        }
    }
    else{
        
    ?>
    <form class="form" action="" method="post" name="sales">
    <input type="text" class="login-input" name="name" placeholder="name" required/>
    <input type="date" class="login-input" name="sale_date" placeholder="mm/dd/yyyy" required/>
    <select name="productName" id="productName">
    <?php
    $result = mysqli_query($con, "select * from `products`");
    while($row = mysqli_fetch_array($result))
    {
        echo "<option vaue=$row[name]>$row[name]</option>";
    }
 ?>
    <input type="text" class="login-input"  name="quantity">
    <input type="submit" class="login-button" name="sale" value="sale">
    <p class="link"><a href="sales_list.php">Sales History</a></p>
</form>
<?php
}   
?>
</div>

</body>
</html>
