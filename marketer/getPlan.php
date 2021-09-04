<?php
include "index.php";

$pid = $_POST['prod'];   // product id

$sql = "SELECT plan_id, name, premium, sum_assured FROM plan_setup WHERE product_id=".$pid;

$result = mysqli_query($con,$sql);

$users_arr = array();

while( $row = mysqli_fetch_array($result) ){
    $userid = $row['plan_id'];
    $name = $row['name'];
    $prem= $row['premium'];
    $sum= $row['sum_assured'];

    $users_arr[] = array("id" => $userid, "name" => $name, "assured" => $sum, "premium" => $prem);
}

// encoding array to json format
echo json_encode($users_arr);
