<?php
include "index.php";


$plan = $_POST['plan']; 
echo json_encode($plan);
die();

if (isset($plan)){

$qry = "SELECT * FROM plan_setup WHERE plan_id = '".$plan."'";

$result = mysqli_query($con, $qry); 

while ($row = mysqli_fetch_array($result, MYSQL_BOTH)) {
     array_push($response, $row);
}

echo json_encode($data);
}   
?>
