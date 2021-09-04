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
}else{
    header('Location:../index.php');
}



//include_once "head.php";
//include_once "side.php";

if (isset($_GET['dashboard'])){
    include_once "home.php";
}
elseif (isset($_GET['insurance'])){
    include_once "insurance.php";
}
elseif (isset($_GET['insurance_user'])){
    include_once "insurance_user.php";
}
elseif (isset($_GET['company'])){
    include_once "company.php";
}
elseif (isset($_GET['e_company'])){
    include_once "editC.php";
}
elseif (isset($_GET['custApi'])){
    include_once "custApi.php";
}

elseif (isset($_GET['manageP'])){
    include_once "manageP.php";
}

elseif (isset($_GET['manageP'])){
    include_once "manageP.php";
}
elseif (isset($_GET['manageC'])){
    include_once "manageC.php";
}

elseif (isset($_GET['managePartner'])){
    include_once "manageP.php";
}
elseif (isset($_GET['report'])){
    include_once "report.php";
}

elseif (isset($_GET['policy'])){
    include_once "policy.php";
}
elseif (isset($_GET['customer'])){
    include_once "customer.php";
}
elseif (isset($_GET['e_user'])){
    include_once "e_user.php";
}
else{
    include_once "home.php";
}


?>


