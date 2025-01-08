<?php
session_start();

// Ensure session is secure
session_regenerate_id();

$username = $_POST['username'];
$password = $_POST['password'];

if ($username && $password) {
    include "includes/dbcon.php";  // Ensure your DB connection is secure

    // Use prepared statements to prevent SQL injection
    $stmt = $con->prepare("SELECT id, username, password, names, category FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $dbusername = $row['username'];
        $dbpassword = $row['password'];
        $dbNames = $row['names'];
        $category = $row['category'];

        // Verify password using password_verify (assuming passwords are hashed in the DB)
        if (password_verify($password, $dbpassword)) {
            $_SESSION["user_id"] = $row["id"];
            $_SESSION['username'] = $username;
            $_SESSION["names"] = $dbNames;

            // Redirect based on user category
            switch ($category) {
                case 'Human resource':
                    header("Location: admin_dashboard.php");
                    break;
                case 'Operator':
                    header("Location: accountant_dashboard.php");
                    break;
                case 'Managing director':
                    header("Location: admin_dashboard.php");
                    break;
                case 'CEO':
                    header("Location: ceo_dashboard.php");
                    break;
                default:
                    echo "Unknown category.";
                    break;
            }
            exit();
        } else {
            echo "<center><font color='red' size='+2'>Incorrect password! </font><br> Redirecting in 2 seconds...</center>";
            header("refresh:2; url=index.php");
            exit();
        }
    } else {
        echo "<center><font color='red' size='+2'>User not found!</font><br> Redirecting in 2 seconds...</center>";
        header("refresh:2; url=index.php");
        exit();
    }
} else {
    echo "<center><font color='red' size='+2'>Please enter both username and password!</font><br> Redirecting in 2 seconds...</center>";
    header("refresh:2; url=index.php");
    exit();
}
?>
