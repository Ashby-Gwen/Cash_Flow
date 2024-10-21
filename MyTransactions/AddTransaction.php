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

// GET DATA FROM FORM
$transaction_type = $_POST['TransactionType'];
$category = $_POST['Category'];
$subcategory = $_POST['Subcategory'];
$item_description = $_POST['ItemDescription'];
$amount = $_POST['Amount'];

// SQL QUERY TO INSERT DATA
$query = "INSERT INTO dailytransaction (TransactionType, Category, Subcategory, ItemDescription, Amount) 
          VALUES ('$transaction_type', '$category', '$subcategory', '$item_description', '$amount')";

if ($conn->query($query) === TRUE) { 
    echo "New transaction added successfully!";
	echo "<a href='index.html' class='back-button'>Back to Home</a>";
} else { 
    echo "Error: " . $query . "<br>" . $conn->error; 
} 

$conn->close(); 

?>
