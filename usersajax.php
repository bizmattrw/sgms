<?php
include 'dbcon.php';
//include 'includes/header.php';
## Read value
$column = array(
    'id','names','username','password','category'
);

$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = mysqli_real_escape_string($con,$_POST['search']['value']); // Search value

## Search 
$searchQuery = " ";
if($searchValue != ''){
	$searchQuery = " and (names like '%".$searchValue."%' or username like '%".$searchValue."%' or password like '%".$searchValue."%' or category like '%".$searchValue."%' ) ";
}

## Total number of records without filtering
$sel = mysqli_query($con,"select count(*) as allcount from users");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of records with filtering
$sel = mysqli_query($con,"select count(*) as allcount from users WHERE 1 ".$searchQuery) or die(mysqli_error($con));
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select * from users WHERE 1 ".$searchQuery." order by id desc  limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($con, $empQuery)or die(mysqli_error($con));
$data = array();
$i=1;
while ($row = mysqli_fetch_array($empRecords)) {
                			 
        // Update Button
  $updateButton = "<a href='#edit' data-toggle='modal' class='btn btn-success btn-sm edit btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</a>";
        // Delete Button
        $deleteButton = "<a href='#delete' data-toggle='modal' class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['id']."'><i class='fa fa-trash'></i> Delete</a>";
        
        $action1 =$updateButton;
		$action2=$deleteButton;

    $data[] = array(
    		
			"id"=>$i,
    		"names"=>$row['names'],
			"username"=>$row['username'],  	
			"password"=>$row['password'],
            "category"=>$row['category'],
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
