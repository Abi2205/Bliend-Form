<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $date = htmlspecialchars($_POST['date']);
    $contact = htmlspecialchars($_POST['contact']);
    $email = htmlspecialchars($_POST['email']);
    $dob = htmlspecialchars($_POST['dob']);
    $gender = htmlspecialchars($_POST['gender']);
    $marital_status = htmlspecialchars($_POST['marital-status']);
    $district = htmlspecialchars($_POST['district']);
    $state = htmlspecialchars($_POST['state']);
    $nationality = htmlspecialchars($_POST['nationality']);
    $pincode = htmlspecialchars($_POST['pincode']);
    $current_org = htmlspecialchars($_POST['current-org']);
    $current_desig = htmlspecialchars($_POST['current-desig']);
    $employee_type = htmlspecialchars($_POST['employee-type']);
    $open_positions = htmlspecialchars($_POST['open-positions']);
    $experience = htmlspecialchars($_POST['experience']);
    $education = htmlspecialchars($_POST['education']);
    $ug_percentage = htmlspecialchars($_POST['ug-percentage']);
    $expected_salary = htmlspecialchars($_POST['expected-salary']);
    $smoke = htmlspecialchars($_POST['smoke']);
    $alcohol = htmlspecialchars($_POST['alcohol']);
    $marketing_interest = htmlspecialchars($_POST['marketing-interest']);
    $why_company = htmlspecialchars($_POST['why-company']);

    // Set the recipient email address
    $to = "abiiii20032205@gmail..com"; // Replace with the desired email address

    // Set the subject
    $subject = "Nextgen details from $name";

    // Create the email content
    $message = "
    <html>
    <head>
        <title>New Form Submission</title>
    </head>
    <body>
        <h2>Form Details</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Date:</strong> $date</p>
        <p><strong>Contact No:</strong> $contact</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Date of Birth:</strong> $dob</p>
        <p><strong>Gender:</strong> $gender</p>
        <p><strong>Marital Status:</strong> $marital_status</p>
        <p><strong>District:</strong> $district</p>
        <p><strong>State:</strong> $state</p>
        <p><strong>Nationality:</strong> $nationality</p>
        <p><strong>Pincode:</strong> $pincode</p>
        <p><strong>Current Organisation:</strong> $current_org</p>
        <p><strong>Current Designation:</strong> $current_desig</p>
        <p><strong>Employee Type:</strong> $employee_type</p>
        <p><strong>Open Positions:</strong> $open_positions</p>
        <p><strong>Experience:</strong> $experience</p>
        <p><strong>Education:</strong> $education</p>
        <p><strong>UG Percentage:</strong> $ug_percentage</p>
        <p><strong>Expected Salary:</strong> $expected_salary</p>
        <p><strong>Did you smoke?</strong> $smoke</p>
        <p><strong>Do you consume Alcohol?</strong> $alcohol</p>
        <p><strong>Are you interested in marketing?</strong> $marketing_interest</p>
        <p><strong>Why did you choose our company?</strong></p>
        <p>$why_company</p>
    </body>
    </html>
    ";

    // Set the headers for the email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n"; // Set the "From" address

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully.";
    } else {
        echo "Failed to send email.";
    }
}
?>
