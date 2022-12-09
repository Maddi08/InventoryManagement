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
            <li><a href="logout.php">Logout</a>&nbsp;&nbsp;</li>
    
        </ul>
    </nav>
        
</div>
</header>
</head>
<body>
<h3 style="font-size:50px;text-align:center">Products</h1>
<?php
 include('session_authentication.php');
 require('db.php');
    if(isset($_POST['submit'])){
        $name = stripslashes($_REQUEST['name']);
        $name = mysqli_real_escape_string($con, $name);
        $quantity = stripslashes($_REQUEST['quantity']);
        $quantity = mysqli_real_escape_string($con, $quantity);
        $price = stripslashes($_REQUEST['price']);
        $price = mysqli_real_escape_string($con, $price);
        $imageName = $_FILES['productImg']['name'];
        $destination = 'productImages/'. $imageName;
        move_uploaded_file($_FILES['productImg']['tmp_name'], $destination);

        $query    = "INSERT into `products` (name, price, quantity, image)
                     VALUES ('$name','$price', '$quantity', '$imageName')";
        $result   = mysqli_query($con, $query);
        if ($result){
            echo "<div class='form'>
            <h3>You haved added product successfully</h3><br/>
            <p class='link'>Click here to <a href='addProducts.php'>Add Products</a> again.</p>
            </div>";
            
        } else {
            echo "<div class='form'>
            <h3>Field Missing</h3><br/>
            <p class='link'>Click here to <a href='addProducts.php'>Add Products</a> again.</p>
            </div>";

        }
    }
    else{
?>
    <form class="form" action="" method="post" name="addproducts" enctype="multipart/form-data">
        <h3 class="login-title">Add Product</h3>
        <input type="file" class="login-input" name="productImg" placeholder="Product Image"/>
        <input type="text" class="login-input" name="name" placeholder="Product Name" required/>
        <input type="text" class="login-input" name="quantity" placeholder="Quantity" required/>
        <input type="text" class="login-input" name="price" placeholder="Price" required>
        <input type="submit" value="Add Product" name="submit" class="login-button"/>
        <p class="link"><a href="home.php">Home</a></p>
  </form>
<?php
}
?>
</body>
</html>