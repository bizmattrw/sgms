<?php
include "./dbcon.php";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["q"];
    $sql = "SELECT * FROM rawmaterialstock WHERE rawmaterial='$id'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // print_r($row);
        echo json_encode($row);
    }
}
?>