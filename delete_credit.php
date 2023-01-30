<?php session_start();

if (isset($_POST['delete'])) {
    include('dbcon.php');


    $id = $_POST['id1'];

    $k = mysqli_query($con, "delete from credits where id='$id'") or die(mysqli_error($con));
    if ($k) {
        $_SESSION['message'] = "One Record successfully removed";
        header('location:credits.php');

    } else {
        $_SESSION['error'] = "Failed to Delete record";
        header('location:credits.php');
    }
}


