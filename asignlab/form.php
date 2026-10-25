
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking Registration System</title>
</head>
<body>
    <h2>account Registration Form</h2>
    <form action="process.php" method="POST"
          enctype="multipart/form-data" >
        <label>Customer Full Name:</label>
        <input type="text" name="full_name" required>
        <br><br>

        <label>Account Number</label>
        <input type="text" name="Account_Number" required>
        <br><br>

        <label>Gender:</label>
        <input type="radio" name="gender" value="Male" required> Male
        <input type="radio" name="gender" value="Female"> Female
        <br><br>
        <label>Account Type:</label>
        <select name="Account_Type" required>
            <option value="">Select type</option>
            <option value="Savings">Savings</option>
            <option value="Current">Current</option>
            <option value="Business">Business</option>
        </select>
        <br><br>
        <label>Opening Balance:</label>
        <input type="number" name="Opening_Balance"
               min="0.01" step="0.01" required>
        <br><br>
        <label>customer Document:</label>
        <input type="file" name="customer_document" required>
        <br><br>
        <label>Transaction Type:</label>
        <input type="radio" name="Transaction_Type" value="Deposit" required> Deposit
        <input type="radio" name="Transaction_Type" value="Withdraw"> Withdraw
        <br><br>
        <label for="transaction_amount">Transaction Amount ($)</label>
        <input type="number" id="transaction_amount" name="transaction_amount" min="0.01" step="0.01" placeholder="0.00" required>
        <br><br>
        <label for="duration">Account Duration (Years)</label>
        <input type="number" id="duration" name="duration" min="0" step="1" placeholder="e.g. 2" required>
        <br><br>
        <button type="submit">Process Transaction</button>
        <button type="reset">Reset</button>
    </form>
</body>
</html>
