<?php
include_once "../db.php";
session_start();

if (isset($_SESSION["id"])){
    $user_id = $_SESSION["id"];
    $userQuery = "SELECT * FROM users WHERE user_id = '$user_id'";
    $result = mysqli_query($con, $userQuery);
    $user = mysqli_fetch_assoc($result);
    $name=$user['firstname']." ".$user['lastname'];
    $uid=$user['user_id'];
    $email=$user['email'];
    $phone=$user['telephone'];
    
    $ins_comp=$con->query("SELECT insurance_id FROM icustomer WHERE customer_id='$uid'");
    $ra=$ins_comp->fetch_array();
    $insura=$ra['insurance_id'];
    
    $p_comp=$con->query("SELECT partner_id FROM pcustomer WHERE user_id='$uid'");
    $ry=$p_comp->fetch_array();
    $pat_id=$ry['partner_id'];
    
    
    $cc=$con->query("SELECT company_name FROM insurance_company WHERE company_id='$insura'");
    $ar=$cc->fetch_array();
}else{
    header('Location:../index.php');
}






?>


