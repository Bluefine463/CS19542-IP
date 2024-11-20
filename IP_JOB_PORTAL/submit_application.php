<?php
// Database configuration
$host = 'localhost'; // Database host
$db_name = 'job_seeker'; // Database name
$db_user = 'root'; // Database username
$db_password = ''; // Database password

// Create a connection
$conn = new mysqli($host, $db_user, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO applications (full_name, dob, education, address, email, phone, company_name, job_title, description, reference1_name, reference1_email, reference1_phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssssss", $fullName, $dob, $education, $address, $email, $phone, $companyName, $jobTitle, $description, $reference1Name, $reference1Email, $reference1Phone);

// Set parameters and execute
$fullName = $_POST['fullName'];
$dob = $_POST['dob'];
//$gender = $_POST['gender'];
$education = $_POST['education'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$companyName = $_POST['companyName'];
$jobTitle = $_POST['jobTitle'];
//$startDate = $_POST['startDate'];
$description = $_POST['description'];
$reference1Name = $_POST['reference1Name'];
$reference1Email = $_POST['reference1Email'];
$reference1Phone = $_POST['reference1Phone'];

if ($stmt->execute()) {
    echo "<h1> It's done. Break a leg! </h1>";
    header("Refresh: 8; url=index1.html");
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting...</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 20%;
            background-color: #f4f4f4;
            color: #333;
        }
        .message {
            font-size: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="message">
        Keep knocking until one opens...

        You will be redirected to the doors in a few seconds...
    </div>
    <div class="loader"></div>
</body>
</html>
