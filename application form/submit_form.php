<?php
// Enable error reporting (disable in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $dbname = "profile_db";
   
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname, );
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Handle file upload
    $resume_path = '';
    if (isset($_FILES['resume']) && $_FILES['resume']['error'] == UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        $resume_path = $upload_dir . basename($_FILES['resume']['name']);
        if (!move_uploaded_file($_FILES['resume']['tmp_name'], $resume_path)) {
            die("Failed to upload file.");
        }
    }
    
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO profiles (name, date, contact, email, dob, gender, marital_status, district, state, nationality, pincode, current_org, current_desig, employee_type, open_positions, experience, education, ug_percentage, expected_salary, smoke, alcohol, marketing_interest, why_company, resume_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("ssssssssssssssssssssssss", $name, $date, $contact, $email, $dob, $gender, $marital_status, $district, $state, $nationality, $pincode, $current_org, $current_desig, $employee_type, $open_positions, $experience, $education, $ug_percentage, $expected_salary, $smoke, $alcohol, $marketing_interest, $why_company, $resume_path);
    
    // Set parameters and execute
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
    
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();
} else {
    // Redirect or show an error message if accessed via GET or other methods
    echo "This page only accepts POST requests.";
}
?>