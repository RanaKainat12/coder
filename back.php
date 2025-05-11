
<?php
// Database connection settings
$host = "localhost";
$user = "root";
$pass = ""; // Change if you have a password
$dbname = "connect";

// Connect to the database
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname  = $_POST['lastname'];
    $number    = $_POST['number'];
    $email     = $_POST['email'];
    $message   = $_POST['message'];

    // Prepare statement
    $stmt = $conn->prepare("INSERT INTO contact (firstname, lastname, number, email, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $firstname, $lastname, $number, $email, $message);

    if ($stmt->execute()) {
        header("location:index.php");
        exit();
        // echo "Message sent successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
<br>
<style>
		


</style>
              <a href="index.php" class="btn"> Back</a>
	
	
	
	
	
	
	
	
	
	
	
	
	