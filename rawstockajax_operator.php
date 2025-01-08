<?php

include 'includes/session.php';
include 'dbcon.php';

## Read value
$columns = array(
    'id', 'rawmaterial', 'quantity','sprice', 'date'
);
$date = date("Y-m-d");
$draw = isset($_POST['draw']) ? intval($_POST['draw']) : 0;
$row = isset($_POST['start']) ? intval($_POST['start']) : 0;
$rowperpage = isset($_POST['length']) ? intval($_POST['length']) : 10; // Rows per page
$columnIndex = isset($_POST['order'][0]['column']) ? intval($_POST['order'][0]['column']) : 0; // Column index
$columnName = isset($_POST['columns'][$columnIndex]['data']) ? $_POST['columns'][$columnIndex]['data'] : 'id'; // Column name
$columnSortOrder = isset($_POST['order'][0]['dir']) ? $_POST['order'][0]['dir'] : 'asc'; // Sort order
$searchValue = isset($_POST['search']['value']) ? mysqli_real_escape_string($con, $_POST['search']['value']) : ''; // Search value

## Search Query
$searchQuery = '';
if ($searchValue != '') {
    $searchQuery = " AND (rawmaterial LIKE '%$searchValue%' OR date LIKE '%$searchValue%')";
}

## Total number of records without filtering
$totalRecordsQuery = "SELECT COUNT(*) AS allcount FROM rawmaterialentry";
$totalRecordsResult = mysqli_query($con, $totalRecordsQuery) or die("Error: " . mysqli_error($con));
$totalRecords = mysqli_fetch_assoc($totalRecordsResult)['allcount'];

## Total number of records with filtering
$totalFilteredQuery = "SELECT COUNT(*) AS allcount FROM rawmaterialentry WHERE 1 $searchQuery";
$totalFilteredResult = mysqli_query($con, $totalFilteredQuery) or die("Error: " . mysqli_error($con));
$totalRecordwithFilter = mysqli_fetch_assoc($totalFilteredResult)['allcount'];

## Fetch records
$empQuery = "
    SELECT * FROM rawmaterialentry 
    WHERE date='$date' and user='$_SESSION[username]' 
    ORDER BY id desc
    LIMIT $row, $rowperpage
";
$empRecords = mysqli_query($con, $empQuery) or die("Error: " . mysqli_error($con));
$data = array();
$i = $row + 1;

while ($row = mysqli_fetch_assoc($empRecords)) {
    // Update Button
    $updateButton = "<a href='#edit' data-toggle='modal' class='btn btn-success btn-sm edit btn-flat' data-id='" . htmlspecialchars($row['id']) . "'><i class='fa fa-edit'></i> Edit</a>";

    // Delete Button
    $deleteButton = "<a href='#delete' data-toggle='modal' class='btn btn-danger btn-sm delete btn-flat' data-id='" . htmlspecialchars($row['id']) . "'><i class='fa fa-trash'></i> Delete</a>";

    $data[] = array(
        "id" => $i,
        "rawmaterial" => htmlspecialchars($row['rawmaterial']),
        "quantity" => htmlspecialchars($row['quantity']),
        "sprice" => htmlspecialchars($row['sprice']),
        "date" => htmlspecialchars($row['date']),
        "button1" => $updateButton,
        "button2" => $deleteButton,
    );
    $i++;
}

## Response
$response = array(
    "draw" => $draw,
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data,
);

echo json_encode($response);
exit;
