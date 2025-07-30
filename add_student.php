<?php
include('db.php');
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $roll_no = $_POST['roll_no'];
    $year = $_POST['year'];
    $branch = $_POST['branch'];
    $semester = $_POST['semester'];

    $sql = "INSERT INTO students (name, roll_no, year, branch, semester) VALUES ('$name', '$roll_no', '$year', '$branch', '$semester')";

    if ($conn->query($sql)) {
        echo "<script>alert('Student added successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Students</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: url('pic4.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            max-width: 500px;
            width: 100%;
            text-align: center;
        }

        h2 {
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        form input {
            width: 100%;
            margin-bottom: 15px;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: border-color 0.3s ease;
        }

        form input:focus {
            border-color: #4CAF50;
            outline: none;
        }

        form button {
            width: 100%;
            padding: 15px;
            font-size: 18px;
            font-weight: bold;
            background: linear-gradient(45deg, #4CAF50, #388E3C);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        form button:hover {
            background: orangered;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        a {
            display: inline-block;
            margin-top: 20px;
            font-size: 16px;
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        a:hover {
            color: orangered;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Students</h2>
        <form method="POST">
            <input type="text" name="name" placeholder="Student Name" required>
            <input type="text" name="roll_no" placeholder="Roll No" required>
            <input type="text" name="year" placeholder="Year" required>
            <input type="text" name="branch" placeholder="Branch" required>
            <input type="text" name="semester" placeholder="Semester" required>
            <button type="submit">Add Student</button>
        </form>
        <a href="dashboard.php">Back to Dashboard</a>
    </div>
</body>
</html>
