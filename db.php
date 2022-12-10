<?php
    // Enter your host name, database username, password, and database name.
    // If you have not set database password on localhost then set empty.
    //mysql://b61f85b58ead2a:76af0a4d@us-cdbr-east-06.cleardb.net/heroku_fb1f4cf96cceae5?reconnect=true
    //$con = mysqli_connect("127.0.0.1","root","","inventory");
    $con=mysqli_connect("us-cdbr-east-06.cleardb.net","b61f85b58ead2a","76af0a4d","heroku_fb1f4cf96cceae5");
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>
