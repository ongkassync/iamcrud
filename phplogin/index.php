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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            max-width: 350px;
            margin: 0 auto;
            padding: 35px;   
            border: 1px solid #ccc;
            border-radius: 30px;
            background-color: #fff;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 80%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"]   
 {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color:#0069d9;
        }

        p {
            color: red;
            text-align: center;
        }
    </style>
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