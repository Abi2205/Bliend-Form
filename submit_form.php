<?php
$servername = "localhost";
$username = "root";  // Default XAMPP username
$password = "";      // Default XAMPP password
$dbname = "profile_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$date = $_POST['date'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$marital_status = $_POST['marital-status'];
$district = $_POST['district'];
$state = $_POST['state'];
$nationality = $_POST['nationality'];
$pincode = $_POST['pincode'];
$current_org = $_POST['current-org'];
$current_desig = $_POST['current-desig'];
$employee_type = $_POST['employee-type'];
$open_positions = $_POST['open-positions'];
$experience = $_POST['experience'];
$education = $_POST['education'];
$ug_percentage = $_POST['ug-percentage'];
$expected_salary = $_POST['expected-salary'];
$smoke = $_POST['smoke'];
$alcohol = $_POST['alcohol'];
$marketing_interest = $_POST['marketing-interest'];
$why_company = $_POST['why-company'];

// Handle file upload
$resume = $_FILES['resume'];
$resume_path = "uploads/" . basename($resume["name"]);
move_uploaded_file($resume["tmp_name"], $resume_path);

// Insert data into the database
$sql = "INSERT INTO profiles (name, date, contact, email, dob, gender, marital_status, district, state, nationality, pincode, current_org, current_desig, employee_type, open_positions, experience, education, ug_percentage, expected_salary, smoke, alcohol, marketing_interest, why_company, resume_path) VALUES ('$name', '$date', '$contact', '$email', '$dob', '$gender', '$marital_status', '$district', '$state', '$nationality', '$pincode', '$current_org', '$current_desig', '$employee_type', '$open_positions', '$experience', '$education', '$ug_percentage', '$expected_salary', '$smoke', '$alcohol', '$marketing_interest', '$why_company', '$resume_path')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
