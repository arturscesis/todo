<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = $_POST['username'];    // removes backslashes
        $password = $_POST['password'];
        $query = "SELECT * FROM `users` WHERE username='$username' AND password='$password'";
        $result = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
        foreach($result as $row){
            $_SESSION['id'] = $row['id'];
        }
        if($result){
            header("Location: todo.php");
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="register.php">Register here</a></p>
  </form>
<?php
    }
?>
</body>
</html>