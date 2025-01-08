<?php
session_start();

if (isset($_POST['save'])) {
    include('dbcon.php');

    // Fetch data from the form
    $items = $_POST['item'];
    $quantities = $_POST['quantity'];
    $sprices = $_POST['sprice'];
    $date = $_POST['date'];
    $checked = $_POST['chk'];

    // Check if required data exists
    if (empty($items) || empty($quantities) || empty($sprices) || empty($date)) {
        $_SESSION['message'] = "Please fill in all required fields.";
        header('location: rawentry.php');
        exit();
    }

    // Loop through each checked row
    for ($i = 0; $i < count($checked); $i++) {
        $item = mysqli_real_escape_string($con, $items[$i]);
        $quantity = (int)$quantities[$i];
        $sprice = (float)$sprices[$i];
        $amount = $quantity * $sprice;

        // Insert into raw material entry table
        $query1 = "
            INSERT INTO rawmaterialentry 
            (id, rawmaterial, quantity, sprice, amount, date, user) 
            VALUES 
            (NULL, '$item', '$quantity', '$sprice', '$amount', '$date', '{$_SESSION['username']}')
        ";
        if (!mysqli_query($con, $query1)) {
            die("Error inserting into rawmaterialentry: " . mysqli_error($con));
        }

        // Check if raw material exists in stock
        $query2 = "SELECT * FROM rawmaterialstock WHERE rawmaterial = '$item'";
        $stockResult = mysqli_query($con, $query2);

        if (!$stockResult) {
            die("Error checking stock: " . mysqli_error($con));
        }

        if (mysqli_num_rows($stockResult) > 0) {
            // Update existing stock
            $query3 = "
                UPDATE rawmaterialstock 
                SET qty = qty + '$quantity' 
                WHERE rawmaterial = '$item'
            ";
            if (!mysqli_query($con, $query3)) {
                die("Error updating stock: " . mysqli_error($con));
            }
        } else {
            // Insert new stock entry
            $query4 = "
                INSERT INTO rawmaterialstock 
                (id, another_field, rawmaterial, qty) 
                VALUES 
                (NULL, '', '$item', '$quantity')
            ";
            if (!mysqli_query($con, $query4)) {
                die("Error inserting into rawmaterialstock: " . mysqli_error($con));
            }
        }
    }

    // Set success message and redirect
    $_SESSION['message'] = "Data saved successfully.";
    header('location: rawentry_operator.php');
    exit();
}
?>
