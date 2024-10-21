<!DOCTYPE html>
<html>
<body>

<h2>New Transaction</h2>
<form action="AddTransaction.php" method="post">
  Transaction Type: <input type="text" name="TransactionType" required><br><br>
  Category: <input type="text" name="Category" required><br><br>
  Sub-Category: <input type="text" name="Subcategory" required><br><br>
  Item Description: <input type="text" name="ItemDescription" required><br><br>
  Amount: <input type="number" name="Amount" required><br><br>
  <input type="submit" value="Add Transaction">
</form>
<a href='index.html' class='back-button'>Back to Home</a>

</body>
</html>
