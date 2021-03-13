<?php
require_once('includes/config/auth_session.php');
require_once('includes/config/functions.php');
require_once('includes/config/db.php');

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value

## Custom Field value
$searchByName = $_POST['searchByName'];
$searchByService = $_POST['searchByService'];
$searchByStatus = $_POST['searchByStatus'];

## Search 
$searchQuery = " ";
if($searchByName != ''){
   $searchQuery .= " and (case_number like '%".$searchByName."%' ) ";
}
if($searchByService != ''){
   $searchQuery .= " and (leads.service_id='".$searchByService."') ";
}
if($searchByStatus != ''){
   $searchQuery .= " and (status='".$searchByStatus."') ";
}
if($searchValue != ''){
   $searchQuery .= " and (name like '%".$searchValue."%' or 
      email like '%".$searchValue."%' or 
      phone like'%".$searchValue."%' ) ";
}

## Total number of records without filtering
$sel = mysqli_query($conn,"select count(*) as allcount from leads");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of records with filtering
$sel = mysqli_query($conn,"select count(*) as allcount from leads WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select * from leads inner join services on leads.service_id = services.service_id WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($conn, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
    $lead_id = $row['lead_id'];
    $data[] = array(
     "name"=>$row['name'],
     "phone"=>$row['phone'],
     "service_id"=>$row['service_name'],
     "case_number"=>$row['case_number'],
     "status"=>$row['status'],
     "action"=> "<a href='edit_lead.php?id=$lead_id' class='btn btn-outline-primary btn-sm mr-1 mb-1'>Edit</a>
				 <button type='submit' class='btn btn-outline-danger btn-sm mr-1 mb-1 remove' name='delete' id='$lead_id'>Delete</button><br/>
				 <select class='form-control' id='update_status' name='status' data-id='$lead_id'>
				 <option value=''>Update Status</option>
				 <option value='Pending'>Pending</option>
				 <option value='Complete'>Complete</option>
				 </select>"
   );
}

## Response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecords,
  "iTotalDisplayRecords" => $totalRecordwithFilter,
  "aaData" => $data
);

echo json_encode($response);
?>