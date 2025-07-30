<?php
include('db.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admins WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        if (password_verify($password, $admin['password'])) {
            $_SESSION['admin'] = $username;
            header('Location: dashboard.php');
        } else {
            echo "<script>alert('Invalid password!');</script>";
        }
    } else {
        echo "<script>alert('Admin not found!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('img.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        h1 {
            font-size: 30px;
            margin-bottom: 20px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            color: black;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
        }

        .container {
            background: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        form input, form button, form a {
            width: 100%;
            margin-bottom: 15px;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        form input:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        form button {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
        }

        form button:hover {
            background-color: orangered;
            transform: scale(1.02);
        }

        form a {
            text-align: center;
            display: block;
            color: #007bff;
            text-decoration: none;
            font-size: 14px;
        }

        form a:hover {
            text-decoration: underline orangered;
        }
    </style>
</head>
<body>
    <h1>Attendance and Grade Management System</h1>
    <div class="container">
        <h2>Admin Login</h2>
        <form method="POST" action="index.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
            <a href="register.php">Register as Admin</a>
        </form>
    </div>
</body>
</html>
