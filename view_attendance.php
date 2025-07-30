<?php
include('db.php');
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit();
}

$students = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $semester = $_POST['semester'];
    $students = $conn->query("SELECT students.name, students.roll_no, students.branch, students.semester,
        COUNT(attendance.id) AS total_days,
        SUM(CASE WHEN attendance.status = 'Present' THEN 1 ELSE 0 END) AS present_days
        FROM students
        LEFT JOIN attendance ON students.id = attendance.student_id
        WHERE students.semester = '$semester'
        GROUP BY students.id");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Attendance</title>
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
    max-width: 1000px;
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

/* Form and select box styling */
form {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 20px;
}

select {
    padding: 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-right: 20px;
}

button {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
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
        <h2>View Attendance</h2>
        <form method="POST">
            <select name="semester" required>
                <option value="">Select Semester</option>
                <option value="1">1st Semester</option>
                <option value="2">2nd Semester</option>
                <option value="3">3rd Semester</option>
                <option value="4">4th Semester</option>
                <option value="5">5th Semester</option>
                <option value="6">6th Semester</option>
            </select>
            <button type="submit">View Attendance</button>
        </form>

        <?php if (!empty($students)) { ?>
            <table>
                <thead>
                    <tr>
                        <th>Roll No</th>
                        <th>Name</th>
                        <th>Branch</th>
                        <th>Semester</th>
                        <th>Present Days</th>
                        <th>Absent Days</th>
                        <th>Total Days</th>
                        <th>Attendance (%)</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $students->fetch_assoc()) {
                        $percentage = ($row['present_days'] / $row['total_days']) * 100;
                        $grade = $percentage >= 70 ? 'A' : ($percentage >= 50 ? 'B' : 'C');
                        $absent_days = $row['total_days'] - $row['present_days']; // Calculate absent days
                    ?>
                        <tr>
                            <td><?php echo $row['roll_no']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['branch']; ?></td>
                            <td><?php echo $row['semester']; ?></td>
                            <td><?php echo $row['present_days']; ?></td>
                            <td><?php echo $absent_days; ?></td> <!-- Show absent days -->
                            <td><?php echo $row['total_days']; ?></td>
                            <td><?php echo number_format($percentage, 2); ?>%</td>
                            <td><?php echo $grade; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } ?>

        <a href="dashboard.php">Back to Dashboard</a>
    </div>
</body>
</html>
