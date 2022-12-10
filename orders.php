<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Add Products</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="style1.css"/>
<header>
  <div class="container">
    <nav>
        <ul>
            <li><a href="products.php">Products</a>&nbsp;&nbsp;</li>
            <li><a href="orders.php">Orders</a>&nbsp;&nbsp;</li>
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
<?php
include('session_authentication.php');
require('db.php');
if(isset($_POST['order'])){
    $supplier_name = stripslashes($_REQUEST['supplier_name']);
    $supplier_name = mysqli_real_escape_string($con, $supplier_name);
    $supplier_email = stripslashes($_REQUEST['supplier_email']);
    $supplier_email = mysqli_real_escape_string($con, $supplier_email);
    $productName = stripslashes($_REQUEST['productName']);
    $productName = mysqli_real_escape_string($con, $productName);
    echo $productName;
    $quantity = stripslashes($_REQUEST['quantity']);
    $quantity = mysqli_real_escape_string($con, $quantity);
    $query   = "INSERT into `orders` (supplier_name, supplier_email, product_name, quantity, status)
                 VALUES ('$supplier_name','$supplier_email', '$productName', '$quantity','pending')";
    $result   = mysqli_query($con, $query);

    if ($result){
        echo "<div class='form'>
        <h3>You order created successfully</h3><br/>
        <p class='link'>Click here to <a href='orders.php'>Orders</a> again.</p>
        </div>";
        
    } else {
        echo "<div class='form'>
        <h3>Field Missing</h3><br/>
        <p class='link'>Click here to <a href='orders.php'>Orders</a> again.</p>
        </div>";

    }
}
else{
?>
<form class = "form" method="post" name="order">
<?php
    
    $name=$_GET['name'];
    $query=mysqli_query($con,"select * from `suppliers` where name='$name'");
	$row=mysqli_fetch_array($query);
    
 ?>
    <label>Supplier Name</label><input type="text" class="login-input" value="<?php echo $row['name']; ?>" name="supplier_name">
	<label>Supplier Email</label><input type="text" class="login-input" value="<?php echo $row['email']; ?>" name="supplier_email">
    <select name="productName" id="productName">
    <?php
    $result = mysqli_query($con, "select * from `products`");
    while($row = mysqli_fetch_array($result))
    {
        echo "<option vaue=$row[name]>$row[name]</option>";
    }
 ?>
    <input type="text" class="login-input" name="quantity" placeholder="Quantity" required/>
   <input type="submit" class="login-button" name="order" value="order">
 
</form>
<?php
}
?>
</body>
</html>