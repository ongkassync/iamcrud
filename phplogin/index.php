<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM users WHERE username = :username AND password = :password";
    $stmt = $conn->prepare($query);

    $stmt->execute(['username' => $username, 'password' => $password]);

    $count = $stmt->rowCount();

    if ($count > 0){
       $user = $stmt->fetch(\PDO::FETCH_ASSOC);
       $_SESSION['username'] = $user['username'];
       $_SESSION['role'] = $user['role'];

       if ($user['role'] == 'admin') {
        header('Location: admin/');
       }else if ($user['role'] == 'user') {
        header('Location: user/');
       } else {
        $error = "Invalid User Type ";
       }

       exit;
    } else {
        $error = "Invalid username or password ";
       
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div style="text-align: center; margin-top: 3rem;">
        <h1>Login</h1>
        <?php if(isset($error)) echo "<p style='color:red;'>$error</p>";?>
        <form action="" method="POST">
            <label for="username">Username</label>
            <input type="text" name="username" required><br>
            <label for="password">Password</label>
            <input type="password" name="password" required><br><br>
          
            <button type="submit">Login</button>
        </form>
    </div>
    
</body>
</html>