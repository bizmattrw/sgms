<?php session_start();

if (isset($_POST['delete'])) {
    include('dbcon.php');

    $id = $_POST['id1'];
    
    $query1 = mysqli_query($con, "select package,quantity as qty from packagesexit where id='$id'") or die(mysqli_error($con));
    while($row=mysqli_fetch_array($query1)) {
        $rawmaterial=$row['package'];
    $qty= $row["qty"];
    }
    mysqli_query($con, "update packagesstock set qty=qty-'$qty' where package='$rawmaterial'") or die(mysqli_error($con));
    $k=mysqli_query($con, "update packagesexit set status='Approved' where id='$id'") or die(mysqli_error($con));
    if ($k) {
        $_SESSION['message'] = "One Record successfully Approved";
        header('location:packageexitapproval.php');

    } else {
        $_SESSION['error'] = "Failed to Delete record";
        header('location:packageexitapproval.php');
    }
}


