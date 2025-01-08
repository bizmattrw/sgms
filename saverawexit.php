<?php
session_start();

if (isset($_POST['save'])) {
    include('dbcon.php'); // Include database connection

    // Retrieve POST data
    $items = $_POST['item']; // Array of items
    $quantities = $_POST['qty']; // Array of quantities
    $dates = $_POST['date']; // Date of exit
    $chk = $_POST['chk']; // Checked rows
    $sprices = $_POST['sprice']; // Array of selling prices

    // Loop through each checked row
    for ($i = 0; $i < count($chk); $i++) {
        $item = mysqli_real_escape_string($con, $items[$i]);
        $quantity = (int) $quantities[$i];
        $sprice = (float) $sprices[$i];
        $amount = $quantity * $sprice;

        // Insert data into `rawmaterialexit`
        $insertQuery = "INSERT INTO rawmaterialexit (id, rawmaterial, quantity, sprice,amount,date, user, status) 
                        VALUES (NULL, '$item', '$quantity','$sprice','$amount', '$dates', '$_SESSION[username]', 'Pending')";

        if (!mysqli_query($con, $insertQuery)) {
            die("Failed to insert into rawmaterialexit: " . mysqli_error($con));
        }

        // Update stock in `rawmaterialstock`
        $updateQuery = "UPDATE rawmaterialstock 
                        SET qty = qty - '$quantity' 
                        WHERE rawmaterial = '$item'";

        if (!mysqli_query($con, $updateQuery)) {
            die("Failed to update rawmaterialstock: " . mysqli_error($con));
        }
    }

    // Set success message and redirect
    $_SESSION['message'] = "Data saved successfully!";
    header('Location: rawexit.php');
    exit(); // Ensure no further processing occurs
}
?>
