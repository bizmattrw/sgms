<?php
include 'dbcon.php';
//include 'includes/header.php';
## Read value
$column = array(
    'id', 'date','idno', 'names', 'phone', 'amount'
);

$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = mysqli_real_escape_string($con, $_POST['search']['value']); // Search value

## Search 
$searchQuery = " ";
if ($searchValue != '') {
    $searchQuery = " and (members.names like '%" . $searchValue . "%' or m.idcard like '%" . $searchValue . "%' or m.phone like '%" . $searchValue . "%' ) ";
}

## Total number of records without filtering
$sel = mysqli_query($con, "select count(*) as allcount from payments");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of records with filtering
$sel = mysqli_query($con, "select count(*) as allcount from payments WHERE 1 " . $searchQuery) or die(mysqli_error($con));
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select c.date,c.id,m.names,m.idcard,m.phone,c.amount from members m,payments c WHERE 1  ".$searchQuery."  and m.id=c.pin order by c.date desc  limit " . $row . "," . $rowperpage;
$empRecords = mysqli_query($con, $empQuery) or die(mysqli_error($con));
$data = array();
$i = 1;
while ($row = mysqli_fetch_array($empRecords)) {

    // Update Button
    $updateButton = "<a href='#edit' data-toggle='modal' class='btn btn-success btn-sm edit btn-flat' data-id='" . $row['id'] . "'><i class='fa fa-edit'></i> Edit</a>";
    // Delete Button
    $deleteButton = "<a href='#delete' data-toggle='modal' class='btn btn-danger btn-sm delete btn-flat' data-id='" . $row['id'] . "'><i class='fa fa-trash'></i> Delete</a>";

    $action1 = $updateButton;
    $action2 = $deleteButton;

    $data[] = array(

        "id" => $i,
        "date" => $row['date'],
        "names" => $row['names'],
        "idno" => $row['idcard'],

        "phone" => $row['phone'],
        "amount" => $row['amount'],
        "action1" => $action1,
        "action2" => $action2,

    );
    $i++;
}

## Response
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
);

echo json_encode($response);
exit;
