<?php 
if(isset($_POST['submit'])){
        if(empty($_POST['fname'])){
        $e="Please fill in partner's name!"; 
        echo  " <script>alert('$e'); window.location='marketer.php'</script>";
	}
        elseif(empty($_POST['lname'])){
        $e="Please fill in partner's registration number!"; 
        echo  " <script>alert('$e'); window.location='marketer.php'</script>";
	}
        elseif(empty($_POST['phone'])){
        $e="Please fil in partner's phone number!"; 
        echo  " <script>alert('$e'); window.location='marketer.php'</script>";
	}
        elseif(empty($_POST['email'])){
        $e="Please fil in partner's email address!"; 
        echo  " <script>alert('$e'); window.location='marketer.php'</script>";
	}
       
        elseif(empty($_POST['password'])){
        $e="Please fill in partner's password"; 
        echo  " <script>alert('$e'); window.location='marketer.php'</script>";
	}
        elseif(empty($_POST['address'])){
        $e="Please fill in company's office address"; 
        echo  " <script>alert('$e'); window.location='marketer.php'</script>";
	}
        else{
        $user = check_input($_POST["user"]);
        $fname = check_input($_POST["fname"]);
        $lname = check_input($_POST["lname"]);
        $phone = check_input($_POST["phone"]); 
        $email = check_input($_POST["email"]); 
        $pass = check_input($_POST["password"]);
        $address = check_input($_POST["address"]);
        $dob = check_input($_POST["dob"]);
        $role= 5;
        
        $chk=$con->query("SELECT email FROM users WHERE email='$email' ");
        $rr=$chk->num_rows;
        if($rr < 1){
            //Password Encryption
            $pas=$pass;
            $options = [
                'cost' => 12,
            ];
            $hash= password_hash($pas, PASSWORD_BCRYPT, $options);
        
            $reg = $con->query("INSERT INTO users SET telephone='$phone', email='$email', address='$address', dob='$dob',lastname='$lname',  firstname='$fname', password='$hash',role_id =5, created=now(), createdby='$user'");
            if($reg){
                //Mpping users to an insurance//
                $detail=$con->query("SELECT * FROM users WHERE email='$email'");
                $xw=$detail->fetch_array();
                $idd=$xw['user_id'];
                
                $inn=$con->query("INSERT INTO imarketer SET insurance_id ='$user', user_id= '$idd'");
                if($inn){
                    $e="Marketer's registration is successful"; 
                    echo  " <script>alert('$e'); window.location='manage_marketer.php'</script>";
                }else{
                  $e="Unable to map marketer to an insurance company"; 
                  echo  " <script>alert('$e'); window.location='marketer.php'</script>";  
                }
            }else{
               $e="Processing error. Please try again"; 
                echo  " <script>alert('$e'); window.location='marketer.php'</script>"; 
            }
        }
        else{
            $e="This email already exists"; 
                echo  " <script>alert('$e'); window.location='marketer.php'</script>";
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