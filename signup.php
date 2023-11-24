<?php
// Connect to the database
$host = "localhost";
$username = "root";
$password = "";
$dbname = "signup";

$conn = new mysqli($host, $username, $password, $dbname);
  
// Check connection
if ($conn->connect_error) {
    die("Connection failure: " 
        . $conn->connect_error);
} 



// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $surname = $_POST["surname"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $birthdate = $_POST["birthdate"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $phonenumber = $_POST["phonenumber"];
    $gmail = $_POST["gmail"];
    $password = $_POST["password"];

    // Insert form data into the database
    $sql = "INSERT INTO signup (surname, firstname, lastname, birthdate, gender, address, phonenumber, gmail, password)
            VALUES ('$surname', '$firstname', '$lastname', '$birthdate', '$gender', '$address', '$phonenumber', '$gmail', '$password')";

    if (mysqli_query($conn, $sql)) {
        
        header("Location: login.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
