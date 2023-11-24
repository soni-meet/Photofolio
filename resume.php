<?php
// Define database connection parameters
$host = "localhost";
$username = "root";
$password = "";
$dbname = "resume";

// Create database connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check for database connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$birthdate = $_POST['birthdate'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$experience = $_POST['experience'];
$education = $_POST['education'];
$skills = $_POST['skills'];
$portfolio = $_POST['portfolio'];
$references = $_POST['references'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

// Validate passwords match
if ($password !== $password2) {
    die("Error: Passwords do not match");
}

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepare SQL statement to insert data into the database
$sql = "INSERT INTO resumes (name, email, birthdate, address, gender, experience, education, skills, portfolio, references, password)
        VALUES ('$name', '$email', '$birthdate', '$address', '$gender', '$experience', '$education', '$skills', '$portfolio', '$references', '$hashed_password')";

// Execute SQL statement and check for errors
if ($conn->query($sql) === TRUE) {
    echo "Resume submitted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();
?>
