<?php
include('db.php');
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit();
}

// Fetch students for attendance marking
$students = $conn->query("SELECT * FROM students");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $attendance_date = $_POST['date'];

    foreach ($_POST['attendance'] as $student_id => $status) {
        $sql = "INSERT INTO attendance (student_id, date, status) 
                VALUES ('$student_id', '$attendance_date', '$status')";
        $conn->query($sql);
    }
    
    echo "<script>alert('Attendance marked successfully!');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mark Attendance</title>
    <style>
        /* General body styling */
body {
    margin: 0;
    padding: 0;
    font-family: 'Arial', sans-serif;
    background-image: url('pic4.jpg'); /* Replace with your image path */
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    height: 100vh;
    display: flex;
    justify-content: center; /* Centers horizontally */
    align-items: center; /* Centers vertically */
}

/* Container for the content */
.container {
    max-width: 800px;
    width: 100%;
    margin: 0 auto;
    padding: 20px;
    background: rgba(255, 255, 255, 0.9); /* Semi-transparent background */
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

/* Heading styling */
h2 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
}

/* Form and input fields styling */
form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

input[type="date"] {
    padding: 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-bottom: 20px;
    width: 100%;
}

select, button {
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-top: 10px;
    cursor: pointer;
}

/* Button styling */
button {
    background-color: #4CAF50;
    color: white;
    border: none;
    transition: background-color 0.3s;
}

button:hover {
    background-color: orangered;
}

/* Table styling */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    font-size: 16px;
}

table th, table td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: center;
}

table th {
    background-color: #4CAF50;
    color: white;
    font-weight: bold;
}

table tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tr:hover {
    background-color: lightpink;
}

/* Radio button and label styling */
label {
    margin-right: 10px;
}

input[type="radio"] {
    margin-right: 5px;
}

/* Link styling */
a {
    text-decoration: none;
    color: #007bff;
    display: block;
    text-align: center;
    margin-top: 20px;
}

a:hover {
    text-decoration: underline orangered;
    color: #0056b3;
}
</style>
</head>
<body>
    <div class="container">
        <h2>Mark Attendance</h2>
        <form method="POST">
            <!-- Set the date input to today's date by default -->
            <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d'); ?>" required>
            <table>
                <thead>
                    <tr>
                        <th>Roll No</th>
                        <th>Name</th>
                        <th>Branch</th>
                        <th>Semester</th>
                        <th>Attendance</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($student = $students->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $student['roll_no']; ?></td>
                            <td><?php echo $student['name']; ?></td>
                            <td><?php echo $student['branch']; ?></td>
                            <td><?php echo $student['semester']; ?></td>
                            <td>
                                <label>
                                    <input type="radio" name="attendance[<?php echo $student['id']; ?>]" value="Present"> Present
                                </label>
                                <label>
                                    <input type="radio" name="attendance[<?php echo $student['id']; ?>]" value="Absent"> Absent
                                </label>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <button type="submit">Mark Attendance</button>
        </form>
        <a href="dashboard.php">Back to Dashboard</a>
    </div>
</body>
</html>
