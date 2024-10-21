<?php 

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$databasename = "personaltransaction_db"; 

// CREATE CONNECTION 
$conn = new mysqli($servername, $username, $password, $databasename); 

// GET CONNECTION ERRORS 
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
} 

if (isset($_POST['TransactionID'])) {
    $transactionID = $_POST['TransactionID'];

    // DELETE QUERY
    $query = "DELETE FROM dailytransaction WHERE TransactionID = ?";
    
    // Prepare statement to prevent SQL injection
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $transactionID);

    // Execute and check if successful
    if ($stmt->execute()) {
        echo "<script>
                alert('Record deleted successfully.');
                window.location.href = 'dbconnect.php'; // Redirect to the table page
              </script>";
    } else {
         echo "<script>
                alert('Error deleting record: " . $conn->error . "');
                window.location.href = 'dbconnect.php';
              </script>";
    }
    $stmt->close();
} else {
    echo "<script>
            alert('No TransactionID provided.');
            window.location.href = 'view_transactions.php';
          </script>";
}

$conn->close();

// Redirect back to the table page after deletion (optional)
header("Location: dbconnect.php"); // Change to the page where your table is displayed
exit();

?>

