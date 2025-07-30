<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit();
}

$admin_username = $_SESSION['admin'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: url('pic3.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }

        h1 {
            font-size: 30px;
            color: whitesmoke;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            margin-bottom: 20px;
        }

        .container {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(230, 230, 250, 0.8));
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            text-align: center;
            max-width: 450px;
            width: 100%;
        }

        h2 {
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        a {
            display: inline-block;
            width: 100%;
            margin: 10px 0;
            padding: 15px;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            color: white;
            background: linear-gradient(45deg, #4CAF50, #388E3C);
            border: none;
            border-radius: 30px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        a:hover {
            background: orangered;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        a:active {
            transform: translateY(0);
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($admin_username); ?> !</h1>
    <div class="container">
        <h2>Admin Dashboard</h2>
        <a href="add_student.php"><span>Add Students</span></a>
        <a href="mark_attendance.php"><span>Mark Attendance</span></a>
        <a href="view_attendance.php"><span>View Attendance</span></a>
        <a href="logout.php"><span>Logout</span></a>
    </div>
</body>
</html>
