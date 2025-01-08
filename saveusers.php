<?php
session_start();

if (isset($_POST['save'])) {
    include('dbcon.php');
    include('functions.php');

    // Sanitize inputs
    $names = mysqli_real_escape_string($con, $_POST['names']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = $_POST['password'];
    $category = $_POST['category'];

    // Hash the password securely
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if the username already exists
    $stmt = $con->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['message'] = "Username already exists!";
        header('Location: users.php');
        exit();
    } else {
        // Insert new user using a prepared statement
        $stmt = $con->prepare("INSERT INTO users (names, username, password, category) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $names, $username, $hashedPassword, $category);

        if ($stmt->execute()) {
            $_SESSION['message'] = "Data saved successfully!";
            header('Location: users.php');
        } else {
            $_SESSION['message'] = "Failed to save data!";
            header('Location: users.php');
        }
    }

    $stmt->close();
    $con->close();
}
?>
