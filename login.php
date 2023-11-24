<?php
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
   if (isset($_POST['gmail']) && isset($_POST['password'])) {
      $gmail = $_POST['gmail'];
      $password = $_POST['password'];
      $query = "SELECT * FROM signup WHERE gmail='$gmail' AND password='$password'";
      $result = mysqli_query($conn, $query);
      if (mysqli_num_rows($result) == 1) {
        header("Location: main.html");
        exit();
      } else {
         echo "Invalid Login Credentials.";
      }
   }
?>
