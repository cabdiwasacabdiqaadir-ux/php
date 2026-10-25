<?php
require_once "function.php";

$errors = "";
$fullName = "";
$accountNumber = "";
$gender = "";
$accountType = "";
$transactionType = "";
$openingBalance = 0;
$transactionAmount = 0;
$duration = 0;
$uploadedFileName = "";
$uploadedFileType = "";
$uploadedFileSize = 0;
$uploadStatus = "";

if (!isset($_POST["full_name"])) {
    $errors = "Please submit the banking form first.";
} else {
    // Read submitted form fields.
    if (isset($_POST["full_name"])) {
        $fullName = $_POST["full_name"];
    }
    if (isset($_POST["Account_Number"])) {
        $accountNumber = $_POST["Account_Number"];
    }
    if (isset($_POST["gender"])) {
        $gender = $_POST["gender"];
    }
    if (isset($_POST["Account_Type"])) {
        $accountType = $_POST["Account_Type"];
    }
    if (isset($_POST["Transaction_Type"])) {
        $transactionType = $_POST["Transaction_Type"];
    }
    if (isset($_POST["Opening_Balance"]) && $_POST["Opening_Balance"] !== "") {
        $openingBalance = $_POST["Opening_Balance"];
    }
    if (isset($_POST["transaction_amount"]) && $_POST["transaction_amount"] !== "") {
        $transactionAmount = $_POST["transaction_amount"];
    }
    if (isset($_POST["duration"]) && $_POST["duration"] !== "") {
        $duration = $_POST["duration"];
    }

    if (empty($fullName)) {
        $errors .= "Customer full name is required.<br>";
    }
    if (empty($accountNumber)) {
        $errors .= "Account number is required.<br>";
    }
    if (empty($gender)) {
        $errors .= "Please select a gender.<br>";
    } elseif ($gender != "Male" && $gender != "Female") {
        $errors .= "Please select a valid gender.<br>";
    }
    if (empty($accountType)) {
        $errors .= "Please select an account type.<br>";
    } elseif ($accountType != "Savings" && $accountType != "Current" && $accountType != "Business") {
        $errors .= "Please select a valid account type.<br>";
    }
    if ($openingBalance === "" || $openingBalance < 0) {
        $errors .= "Opening balance must be zero or greater.<br>";
    }
    if (empty($transactionType)) {
        $errors .= "Please select a transaction type.<br>";
    } elseif ($transactionType != "Deposit" && $transactionType != "Withdrawal") {
        $errors .= "Please select a valid transaction type.<br>";
    }
    if ($transactionAmount === "" || $transactionAmount <= 0) {
        $errors .= "Transaction amount must be greater than zero.<br>";
    }
    if ($duration === "" || $duration < 0 || $duration != floor($duration)) {
        $errors .= "Account duration must be a non-negative whole number.<br>";
    }

    if (!empty($transactionType) && $transactionAmount > 0) {
        $transactionFee = calculateTransactionFee($transactionType, $transactionAmount);
    } else {
        $transactionFee = 0;
    }

    if ($transactionType == "Withdrawal" && $transactionAmount > 0 && ($transactionAmount + $transactionFee) > $openingBalance) {
        $errors .= "Withdrawal amount plus transaction fee must not exceed the opening balance.<br>";
    }

    if (!isset($_FILES["customer_document"]) || $_FILES["customer_document"]["error"] == 4) {
        $errors .= "Please select an identification document.<br>";
    } elseif ($_FILES["customer_document"]["error"] != 0) {
        $errors .= "The file upload failed. Please select the document again.<br>";
    } else {
        $uploadedFileName = $_FILES["customer_document"]["name"];
        $uploadedFileSize = $_FILES["customer_document"]["size"];
        $uploadedFileType = $_FILES["customer_document"]["type"];
        $temporaryFileName = $_FILES["customer_document"]["tmp_name"];

        if ($uploadedFileSize > 2097152) {
            $errors .= "The identification document must not be larger than 2 MB.<br>";
        }
        if (empty($uploadedFileName)) {
            $errors .= "The uploaded document must have a filename.<br>";
        }
        if (file_exists("uploads/" . $uploadedFileName)) {
            $errors .= "A file with this name already exists. Rename your file and try again.<br>";
        }
    }

    if (empty($errors)) {
        if (move_uploaded_file($temporaryFileName, "uploads/" . $uploadedFileName)) {
            $uploadStatus = "Successful";

            if ($transactionType == "Deposit") {
                $transactionBalance = calculateDeposit($openingBalance, $transactionAmount);
            } else {
                $transactionBalance = calculateWithdrawal($openingBalance, $transactionAmount);
            }

            $totalCharges = calculateTotalCharges($transactionFee);
            $finalBalance = calculateFinalBalance($openingBalance, $transactionAmount, $transactionType, $totalCharges);
            $accountStatus = checkAccountStatus($finalBalance);

            if ($accountType == "Savings") {
                $interestRate = "5%";
            } elseif ($accountType == "Current") {
                $interestRate = "2%";
            } else {
                $interestRate = "3%";
            }

            $interest = calculateInterest($accountType, $finalBalance, $duration);
            $futureBalance = calculateFutureBalance($finalBalance, $accountType, $duration);
        } else {
            $errors = "The document could not be saved. Check that the uploads folder is writable.";
        }
    }
}

function displayValue($value)
{
    $value = str_replace("&", "&amp;", $value);
    $value = str_replace("<", "&lt;", $value);
    $value = str_replace(">", "&gt;", $value);
    $value = str_replace('"', "&quot;", $value);
    $value = str_replace("'", "&#039;", $value);
    return $value;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking Transaction Receipt</title>
</head>
<body>
    <main >
        <?php if (!empty($errors)) { ?>
            <section >
                <div class="status-icon error-icon">!</div>
                <p class="eyebrow">TRANSACTION NOT PROCESSED</p>
                <h1>Check Your Information</h1>
                <div class="alert error-alert"><?php echo $errors; ?></div>
                <a class="primary-button link-button" href="form.php">Back to Banking Form</a>
            </section>
        <?php } else { ?>
            <section >
                <div>&#10003;</div>
                <p>DEMO TRANSACTION COMPLETE</p>
                <h1>Banking Transaction Receipt</h1>
                <p>The submitted information passed validation. This is a simulated transaction receipt.</p>

                <div >
                    <span>Final Account Balance</span>
                    <strong>$<?php echo number_format($finalBalance, 2); ?></strong>
                    <small><?php echo displayValue($accountStatus); ?></small>
                </div>

                <div>
                    <table>
                        <tbody>
                            <tr><th>Customer Full Name</th><td><?php echo displayValue($fullName); ?></td></tr>
                            <tr><th>Account Number</th><td><?php echo displayValue($accountNumber); ?></td></tr>
                            <tr><th>Gender</th><td><?php echo displayValue($gender); ?></td></tr>
                            <tr><th>Account Type</th><td><?php echo displayValue($accountType); ?></td></tr>
                            <tr><th>Opening Balance</th><td>$<?php echo number_format($openingBalance, 2); ?></td></tr>
                            <tr><th>Transaction Type</th><td><?php echo displayValue($transactionType); ?></td></tr>
                            <tr><th>Transaction Amount</th><td>$<?php echo number_format($transactionAmount, 2); ?></td></tr>
                            <tr><th>Transaction Fee</th><td>$<?php echo number_format($transactionFee, 2); ?></td></tr>
                            <tr><th>Total Banking Charges</th><td>$<?php echo number_format($totalCharges, 2); ?></td></tr>
                            <tr><th>Final Balance</th><td>$<?php echo number_format($finalBalance, 2); ?></td></tr>
                            <tr><th>Account Status</th><td><?php echo displayValue($accountStatus); ?></td></tr>
                            <tr><th>Account Duration</th><td><?php echo displayValue($duration); ?> year(s)</td></tr>
                            <tr><th>Interest Rate</th><td><?php echo displayValue($interestRate); ?></td></tr>
                            <tr><th>Calculated Interest</th><td>$<?php echo number_format($interest, 2); ?></td></tr>
                            <tr><th>Projected Future Balance</th><td>$<?php echo number_format($futureBalance, 2); ?></td></tr>
                            <tr><th>Document Name</th><td><?php echo displayValue($uploadedFileName); ?></td></tr>
                            <tr><th>File Type</th><td><?php echo displayValue($uploadedFileType); ?></td></tr>
                            <tr><th>File Size</th><td><?php echo number_format($uploadedFileSize); ?> bytes</td></tr>
                            <tr><th>Upload Status</th><td><span ="status-label"><?php echo displayValue($uploadStatus); ?></span></td></tr>
                        </tbody>
                    </table>
                </div>
                <a href="form.php">Back to Banking Form</a>
                <p >For coursework demonstration only. No real funds were transferred.</p>
            </section>
        <?php } ?>
    </main>
</body>
</html>
