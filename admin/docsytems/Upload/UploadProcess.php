<?php
    include '../connection.php';

    if (isset($_POST['submit'])) {
        
     
        $filevarietyName = $_POST['varietyName']; 
        $filequantity = $_POST['quantity'];
        $filespecs = $_POST['specs'];
        $price = $_POST['price'];
        $supplier = $_POST['supplier'];
        $DueDate = $_POST['DueDate'];
        // Additional security measures

        if ($con) {
            $query = "INSERT INTO requests (varietyName,quantity,specs,price,supplier,DueDate) " .
                     "VALUES ('$filevarietyName', '$filequantity','$filespecs','$price','$supplier','$DueDate')";
            mysqli_query($con, $query) or die('Error, query failed');
            mysqli_close($con);
            header('supplier:Success.php');
        } else {
            header('../../index.php');
        }
    }
?>
