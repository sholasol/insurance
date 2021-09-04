 ﻿<?php
include('db.php');

if (isset($_POST['login'])) {
 
   
    
    if(empty($_POST['email'])){
	 header("Location:index.php?err=" . urlencode("Please fill in your email!")); 
    }
 
    $pwd = check_input($_POST["password"]);
    if(empty($_POST['password'])){
	header("Location:index.php?err=" . urlencode("Password is required!"));  
	}
    else{
            $email = check_input($_POST["email"]);
            $pwd = check_input($_POST["password"]);

            $query=$con->query("select * from users where email='$email' "); //admin login query
            $num_rows=$query->num_rows;
            
            

            if($num_rows > 0){
                $row=$query->fetch_array();
                $rol= $row['role_id'];
                $phash=$row['password'];
                $password = password_verify($pwd, $phash);
                if($password){
                    session_start();	
                    $_SESSION["email"] = $row['email']; // setting session
                    $_SESSION["id"] = $row['user_id'];
                    
                    /*
                    $query2=$con->query("select * from role where role_id='$rol' "); //Getting client's role
                    $rr=$query2->fetch_array();
                    $role=['role']; */
                    
                    
                    if($rol==1){
                        header("Location:super/index.php?dashboard"); // take to Admin to the home page
                    }
                    elseif($rol==2){
                        header("Location:admin/home.php"); // take to Customer home page
                    } 
                    elseif($rol==3){
                        header("Location:partner/home.php"); // take to Customer home page
                    }
                    elseif($rol==4){
                        header("Location:customer/home.php"); // take to Customer home page
                    }
                    elseif($rol==5){
                        header("Location:marketer/home.php"); // take to Customer home page
                    }
                }
                else{
                         header("Location:index.php?err=" . urlencode("Incorrect password! Try again")); 
                    } 
            }
            
            else{
                     header("Location:index.php?err=" . urlencode("Incorrect email address! Try again")); 
                } 
               
                 
            
    
        }
}

function check_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
