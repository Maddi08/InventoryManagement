<?php
    $id=$_GET['id'];
    include('db.php');
    $result = mysqli_query($con, "DELETE from `orders` where order_no='$id'");
    echo "<div class='form'>
    <h3>Canceled succesfully</h3><br/>
    <p class='link'>Click here to see Orders<a href='orders_list.php'>Orders</a></p>
    </div>";
?>