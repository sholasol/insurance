<?php
include_once "../db.php";
if(isset($_POST['submit'])){
    if(empty($_POST['name'])){
        $e="Please fill in company name!"; 
        echo  " <script>alert('$e'); window.location='index.php?company'</script>";
	}
        elseif(empty($_POST['prefix'])){
        $e="Please enter 2 letters prefix"; 
        echo  " <script>alert('$e'); window.location='index.php?company'</script>";
	}
        elseif(empty($_POST['rc'])){
        $e="Please fil in company registration number!"; 
        echo  " <script>alert('$e'); window.location='index.php?company'</script>";
	}
        elseif(empty($_POST['phone'])){
        $e="Please fil in your phone number!"; 
        echo  " <script>alert('$e'); window.location='index.php?company'</script>";
	}
        elseif(empty($_POST['email'])){
        $e="Please fil in your email address!"; 
        echo  " <script>alert('$e'); window.location='index.php?company'</script>";
	}
       
        elseif(empty($_POST['bank'])){
        $e="Please fill in company's bank account number"; 
        echo  " <script>alert('$e'); window.location='index.php?company'</script>";
	}
        elseif(empty($_POST['address'])){
        $e="Please fill in company's office address"; 
        echo  " <script>alert('$e'); window.location='index.php?company'</script>";
	}
        else{
    
        $name = check_input($_POST["name"]);
        $prefix = check_input($_POST["prefix"]);
        $phone = check_input($_POST["phone"]); 
        $email = check_input($_POST["email"]); 
        $rc = check_input($_POST["rc"]);
        $bank = check_input($_POST["bank"]);
        $address = check_input($_POST["address"]);
        $userid= check_input($_POST["user"]);
        
        $chk=$con->query("SELECT email FROM insurance_company WHERE email='$email' ");
        $rr=$chk->num_rows;
        if($rr < 1){
            $reg = $con->query("INSERT INTO insurance_company SET company_name='$name', prefix='$prefix', rc_no='$rc', phone_no='$phone', address='$address', acct_no='$bank', email='$email', created=now(), created_by='$userid'");
            if($reg){
                $e="Company registration is successful"; 
                echo  " <script>alert('$e'); window.location='index.php?insurance'</script>";
            }else{
               $e="Processing error. Please try again"; 
                echo  " <script>alert('$e'); window.location='index.php?company'</script>"; 
            }
        }
        else{
            $e="This email already exists"; 
                echo  " <script>alert('$e'); window.location='index.php?company'</script>";
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
