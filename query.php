<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "query";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failure: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $query = $_POST['query'];

    $sql = "INSERT INTO query (name, email, query)
            VALUES ('$name', '$email', '$query')";

    if (mysqli_query($conn, $sql)) {
        echo "Query Submitted. ";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
