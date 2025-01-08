<?php
session_start();

if (isset($_POST['save'])) {
    include('dbcon.php');

    // Collect and sanitize inputs
    $item = mysqli_real_escape_string($con, $_POST['item']);
    $quantity = intval($_POST['quantity']);
    $prevqty = intval($_POST['prevqty']);
    $previtem = mysqli_real_escape_string($con, $_POST['previtem']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $sprice = floatval($_POST['sprice']);
    $id = intval($_POST['id']);
    
    $amount = $sprice * $quantity;

    // Begin transaction
    mysqli_begin_transaction($con);

    try {
        // Update raw material entry
        $stmt = $con->prepare("UPDATE rawmaterialentry SET rawmaterial=?, quantity=?, sprice=?, amount=?, date=? WHERE id=?");
        $stmt->bind_param("siddsi", $item, $quantity, $sprice, $amount, $date, $id);
        $stmt->execute();

        // Check stock and update accordingly
        $stmt = $con->prepare("SELECT qty FROM rawmaterialstock WHERE rawmaterial=?");
        $stmt->bind_param("s", $item);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Update stock for the current item
            $stmt = $con->prepare("UPDATE rawmaterialstock SET qty=qty-? WHERE rawmaterial=?");
            $stmt->bind_param("is", $prevqty, $item);
            $stmt->execute();

            $stmt = $con->prepare("UPDATE rawmaterialstock SET qty=qty+? WHERE rawmaterial=?");
            $stmt->bind_param("is", $quantity, $item);
            $stmt->execute();
        } else {
            // Revert stock for the previous item if necessary
            $stmt = $con->prepare("UPDATE rawmaterialstock SET qty=qty+? WHERE rawmaterial=?");
            $stmt->bind_param("is", $prevqty, $previtem);
            $stmt->execute();

            // Insert new stock for the item
            $stmt = $con->prepare("INSERT INTO rawmaterialstock (rawmaterial, qty) VALUES (?, ?)");
            $stmt->bind_param("si", $item, $quantity);
            $stmt->execute();
        }

        // Commit the transaction
        mysqli_commit($con);
        $_SESSION['message'] = "Data successfully updated.";
    } catch (Exception $e) {
        // Rollback in case of an error
        mysqli_rollback($con);
        $_SESSION['message'] = "Failed to update data: " . $e->getMessage();
    }

    header('Location: rawentry_operator.php');
    exit();
}
?>
