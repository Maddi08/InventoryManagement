<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <h1 style="font-size:50px;text-align:center;color:#000000;background-color:white">Inventory Management System</h1>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
require('db.php');
if(isset($_REQUEST['username'])){
 $name = stripslashes($_REQUEST['name']);
 $name = mysqli_real_escape_string($con, $name);
 $email = stripslashes($_REQUEST['email']);
 $email = mysqli_real_escape_string($con, $email);
 $username = stripslashes($_REQUEST['username']);
 $username = mysqli_real_escape_string($con, $username);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($con, $password);
 $query = "INSERT into `users`(name, email,username,password)
            VALUES ('$name','$email','$username','$password')";
 $result =mysqli_query($con, $query);
 if ($result){
    echo "<div class='form'>
          <h3> Registered successfully</h3><br/>
          <p class='link'><a href='index.php'>Login</a></p>
          </div>";
 }
 else{
    echo "<div class='form'>
          <h3>Registration not completed</h3></br>
          <p class='link'><a href='register.php'>Registration</a></p>
          </div>";
 }
}
else {
?>

<title style="font-size:50px;text-align:center;color:#000000">Inventory Management System</title>
    <form class="form" method="post" name="register">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="name" placeholder="Name" required/>
        <input type="text" class="login-input" name="email" placeholder="Email" required/>
        <input type="text" class="login-input" name="username" placeholder="Username" required/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Register" name="submit" class="login-button"/>
        <p class="link"><a href="index.php">Login</a><p>
</form>
<?php
}
?>
</body>
</html>