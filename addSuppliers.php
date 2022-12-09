<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Add Suppliers</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="style1.css"/>
<header>
  <div class="container">
    <nav>
        <ul>
            <li><a href="products.php">Products</a>&nbsp;&nbsp;</li>
            <li><a href="orders.php">Orders</a>&nbsp;&nbsp;</li>
            <li><a href="sales.php">Sales</a>&nbsp;&nbsp;</li>
            <li><a href="logout.php">Logout</a>&nbsp;&nbsp;</li>
    
        </ul>
    </nav>
        
</div>
</header>
</head>
<body>
<h3 style="font-size:50px;text-align:center">Suppliers</h1>
<?php
 include('session_authentication.php');
 require('db.php');
    if(isset($_POST['submit'])){
        $name = stripslashes($_REQUEST['name']);
        $name = mysqli_real_escape_string($con, $name);
        $address = stripslashes($_REQUEST['address']);
        $address = mysqli_real_escape_string($con, $address);
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($con, $email);
        $phonenum = stripslashes($_REQUEST['phonenum']);
        $phonenum = mysqli_real_escape_string($con, $phonenum);
       
        $query    = "INSERT into `suppliers` (name, address, email, phonenum)
                     VALUES ('$name','$address', '$email', '$phonenum')";
        $result   = mysqli_query($con, $query);
        if ($result){
            echo "<div class='form'>
            <h3>You have added supplier successfully</h3><br/>
            <p class='link'>Click here to <a href='addSuppliers.php'>Add Suppliers</a> again.</p>
            </div>";
            
        } else {
            echo "<div class='form'>
            <h3>Field Missing</h3><br/>
            <p class='link'>Click here to <a href='addSuppliers.php'>Add Suppliers</a> again.</p>
            </div>";

        }
    }
    else{
?>
    <form class="form" action="" method="post" name="addsuppliers">
        <h3 class="login-title">Add Supplier</h3>
        <input type="text" class="login-input" name="name" placeholder="Name" required/>
        <input type="text" class="login-input" name="address" placeholder="Address" required/>
        <input type="text" class="login-input" name="email" placeholder="Email" required/>
        <input type="text" class="login-input" name="phonenum" placeholder="Phone Number" required>
        <input type="submit" value="Add Supplier" name="submit" class="login-button"/>
        <p class="link"><a href="suppliers.php">Suppliers</a></p>
  </form>
<?php
}
?>
</body>
</html>