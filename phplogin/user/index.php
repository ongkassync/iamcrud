<?php
    session_start();
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user'){
        header('location: ../');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
</head>
<body>
    <h2>Welcome, User!</h2>
    <p>Hello, <?php echo $_SESSION['username']; ?> You are logged in as a user.</p>
    <a href="logout.php">Logout</a>
    
</body>
</html>
