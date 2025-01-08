<?php session_start();

if (isset($_POST['delete'])) {
    include('dbcon.php');

    $id = $_POST['id1'];
    $query1 = mysqli_query($con, "select rawmaterial,quantity as qty from rawmaterialentry where id='$id'") or die(mysqli_error($con));
    while($row=mysqli_fetch_array($query1)) {
        $rawmaterial=$row['rawmaterial'];
    $qty= $row["qty"];
    }
    mysqli_query($con, "update rawmaterialstock set qty=qty-'$qty' where rawmaterial='$rawmaterial'") or die(mysqli_error($con));
    $k = mysqli_query($con, "delete from rawmaterialentry where id='$id'") or die(mysqli_error($con));
    if ($k) {
        $_SESSION['message'] = "One Record successfully removed";
        header('location:rawentry.php');

    } else {
        $_SESSION['error'] = "Failed to Delete record";
        header('location:rawentry.php');
    }
}


