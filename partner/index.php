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
    
    $ins_comp=$con->query("SELECT insurance_id FROM ipartner WHERE partner_id='$uid'");
    $ra=$ins_comp->fetch_array();
    $i_id=$ra['insurance_id'];
    
    
}else{
    header('Location:../index.php');
}



//include_once "head.php";
//include_once "side.php";
/*
if (isset($_GET['dashboard'])){
    include_once "home.php";
}
elseif (isset($_GET['customer'])){
    include_once "customer.php";
}
elseif (isset($_GET['custApi'])){
    include_once "custApi.php";
}
elseif (isset($_GET['summary'])){
    include_once "summary.php";
}
elseif (isset($_GET['product'])){
    include_once "product.php";
}
elseif (isset($_GET['manageP'])){
    include_once "manageP.php";
}
elseif (isset($_GET['product_plan'])){
    include_once "product_plan.php";
}
elseif (isset($_GET['manageP'])){
    include_once "manageP.php";
}
elseif (isset($_GET['manageC'])){
    include_once "manageC.php";
}
elseif (isset($_GET['manageProd'])){
    include_once "manageProd.php";
}
elseif (isset($_GET['partner'])){
    include_once "partner.php";
}
elseif (isset($_GET['managePartner'])){
    include_once "manageP.php";
}
elseif (isset($_GET['report'])){
    include_once "report.php";
}
elseif (isset($_GET['claim'])){
    include_once "claim.php";
}
elseif (isset($_GET['pclaim'])){
    include_once "pclaim.php";
}
elseif (isset($_GET['approveC'])){
    include_once "approveC.php";
}
elseif (isset($_GET['policy'])){
    include_once "policy.php";
}
elseif (isset($_GET['customer'])){
    include_once "customer.php";
}

elseif (isset($_GET['createM'])){
    include_once "marketer.php";
}
elseif (isset($_GET['manageM'])){
    include_once "manage_marketer.php";
}
else{
    include_once "admin.php";
}
*/

?>


