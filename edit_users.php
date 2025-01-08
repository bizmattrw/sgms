<?php
session_start();

if (isset($_POST['save'])) {
    include('dbcon.php');
    include('functions.php');

    // Sanitize inputs
    $id = intval($_POST['id']); // Assuming 'id' is passed as a hidden input
    $names = mysqli_real_escape_string($con, $_POST['names']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = $_POST['password']; // Raw password for hashing if provided
    $category = $_POST['category'];

    try {
        // Retrieve the current hashed password for the user
        $stmt = $con->prepare("SELECT password FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            throw new Exception("User not found.");
        }

        $row = $result->fetch_assoc();
        $hashedPassword = $row['password']; // Keep the current password by default

        // If a new password is provided, hash it
        if (!empty($password)) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        }

        // Update user details
        $stmt = $con->prepare("UPDATE users SET names = ?, username = ?, password = ?, category = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $names, $username, $hashedPassword, $category, $id);

        if ($stmt->execute()) {
            $_SESSION['message'] = "Data updated successfully.";
        } else {
            throw new Exception("Failed to update data.");
        }

        header('location:users.php');
    } catch (Exception $e) {
        $_SESSION['error'] = $e->getMessage();
        header('location:users.php');
    } 
        // Close resources
        $stmt->close();
        $con->close();
    
}
?>
