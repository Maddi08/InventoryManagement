<?php
    $name=$_GET['name'];
    include('db.php');
    $result = mysqli_query($con, "SELECT * from `products` where name='$name'");
    $row=mysqli_fetch_array($result);
    unlink("productImages/".$row['image']);
    mysqli_query($con,"delete from `products` where name='$name'");
    echo "<div class='form'>
    <h3>Deleted succesfully</h3><br/>
    <p class='link'>Click here to see products<a href='products.php'>Products</a></p>
    </div>";
?>