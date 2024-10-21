<?php 

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$databasename = "personaltransaction_db"; 

// CREATE CONNECTION 
$conn = new mysqli($servername, 
    $username, $password, $databasename); 

// GET CONNECTION ERRORS 
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
} 

// SQL QUERY 
$query = "SELECT * FROM dailytransaction;"; 

// FETCHING DATA FROM DATABASE 
$result = $conn->query($query); 

if ($result->num_rows > 0) 
{ 
    // Table
    echo "<table border='1'; style='border-collapse: collapse;'>
            <tr>
                <th>Transaction ID</th>
                <th>Transaction Date</th>
                <th>Transaction Type</th>
                <th>Category</th>
                <th>Sub-Category</th>
                <th>Item Description</th>
                <th>Amount</th>
                <th>Action</th> <!-- Added Action column for delete button -->
            </tr>";
    
    // Display Table with Delete Button
    while($row = $result->fetch_assoc()){
        echo "<tr>
                <td>" . $row["TransactionID"] . "</td>
                <td>" . $row["TransactionDate"] . "</td>
                <td>" . $row["TransactionType"] . "</td>
                <td>" . $row["Category"] . "</td>
                <td>" . $row["Subcategory"] . "</td>
                <td>" . $row["ItemDescription"] . "</td>
                <td>" . $row["Amount"] . "</td>
                <td>
                    <form action='DeleteTransaction.php' method='post'>
                        <input type='hidden' name='TransactionID' value='" . $row["TransactionID"] . "'>
                        <input type='submit' value='Delete'>
                    </form>
                </td>
              </tr>"; 
    }
    echo "</table>";
} 
else { 
    echo "0 results"; 
}

echo "<a href='index.html' class='back-button'>Back to Home</a>";

$conn->close(); 

?>
