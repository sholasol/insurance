<?php
include "index.php";

    $term=4;
 //Calculating End date from start date
        $startDate= date('Y-m-d');
        $days = $term * 365 ;
        $dayStr = $days == 1 ? 'day' : 'days';
        $end = date('Y-m-d', strtotime('+ '.$days. ' '.$dayStr, strtotime($startDate )));
        
        echo  " <script>alert('$end'); window.location='cust.php'</script>";
/*
if(isset($_POST['submit'])){
        if(empty($_POST['fname'])){
        $e="Please fill in first name!"; 
        echo  " <script>alert('$e'); window.location='customer.php'</script>";
	}
        if(empty($_POST['lname'])){
        $e="Please fill in last name!"; 
        echo  " <script>alert('$e'); window.location='customer.php'</script>";
	}
        elseif(empty($_POST['phone'])){
        $e="Please fil in your phone number!"; 
        echo  " <script>alert('$e'); window.location='customer.php'</script>";
	}
        elseif(empty($_POST['email'])){
        $e="Please fil in your email address!"; 
        echo  " <script>alert('$e'); window.location='customer.php'</script>";
	}
       
        elseif(empty($_POST['password'])){
        $e="Please fill in user's password"; 
        echo  " <script>alert('$e'); window.location='customer.php'</script>";
	}
        elseif(empty($_POST['address'])){
        $e="Please fill in company's office address"; 
        echo  " <script>alert('$e'); window.location='customer.php'</script>";
	}
        
        elseif(empty($_POST['product'])){
        $e="Please select a product"; 
        echo  " <script>alert('$e'); window.location='customer.php'</script>";
	}
        elseif(empty($_POST['plan'])){
        $e="Please select a plan"; 
        echo  " <script>alert('$e'); window.location='customer.php'</script>";
	}
        elseif(empty($_POST['dob'])){
        $e="Please select a date of birth"; 
        echo  " <script>alert('$e'); window.location='customer.php'</script>";
	}
        elseif(empty($_POST['start'])){
        $e="Please select a start date"; 
        echo  " <script>alert('$e'); window.location='customer.php'</script>";
	}
        elseif(empty($_POST['term'])){
        $e="Please select a plan term "; 
        echo  " <script>alert('$e'); window.location='customer.php'</script>";
	}
        else{
        // $userid = check_input($_POST["user"]);
        $fname = check_input($_POST["fname"]);
        $lname = check_input($_POST["lname"]);
        $phone = check_input($_POST["phone"]); 
        $email = check_input($_POST["email"]); 
        $dob = check_input($_POST["dob"]); 
        $pass = check_input($_POST["password"]);
        $address = check_input($_POST["address"]);
        $oaddress = check_input($_POST["oaddress"]);
        //Next of kin
        $nfname = check_input($_POST["nfname"]);
        $nlname = check_input($_POST["nlname"]);
        $nemail = check_input($_POST["nemail"]);
        $nphone = check_input($_POST["nphone"]);
        $naddress = check_input($_POST["naddress"]);
        //Beneficiary
        $bfname = check_input($_POST["bfname"]);
        $blname = check_input($_POST["blname"]);
        $bemail = check_input($_POST["bemail"]);
        $bphone = check_input($_POST["bphone"]);
        $baddress = check_input($_POST["baddress"]);
        //Product
        $prod = check_input($_POST["product"]);
        $plan = check_input($_POST["plan"]); 
        //Getting Sum assured and Premium from the plan
        $gt=$con->query("SELECT premium, sum_assured, product_id FROM plan_setup WHERE plan_id='$plan'");
        $gr=$gt->fetch_array();
        $prm=$gr['premium'];
        $sma=$gr['sum_assured'];
        $p_id =$gr['product_id'];
        
        $type = check_input($_POST["type"]); 
        $start = check_input($_POST["start"]); 
        $term = check_input($_POST["term"]); 
        //$premium = check_input($_POST["premium"]);
        //$sumAss = check_input($_POST["assured"]);
        
        //Motor Product
        $chasis = check_input($_POST["chasis"]);
        $make = check_input($_POST["make"]);
        $model = check_input($_POST["model"]);
        $regno = check_input($_POST["regno"]);
        
        //Converting dob date picker from string to date e.g 12/11/2018
        $birth = strtotime($dob);
        $newdob = date('Y-m-d',$birth);
        $dobb=  $newdob;
        
        //Converting date picker from string to date e.g 12/11/2018
        $time = strtotime($start);
        $newformat = date('Y-m-d',$time);
        $start=  $newformat;

       //Calculating End date from start date
        $startDate= $start;
        $days = $term * 365 ;
        $dayStr = $days == 1 ? 'day' : 'days';
        $end = date('Y-m-d', strtotime('+ '.$days. ' '.$dayStr, strtotime($startDate )));
        
        $year=date('Y');
        $role= 4;
        
        //Getting Insurance Prefix From Product Information
        $t=$con->query("SELECT insurance_id FROM product_setup WHERE product_id='$p_id'");
        $rt=$t->fetch_array();
        $insurance = $rt['insurance_id'];
        //Prefix
        $pr=$con->query("SELECT prefix FROM insurance_company WHERE company_id='$insurance'");
        $rp=$pr->fetch_array();
        $pf = $rp['prefix'];
        
        //Auto Generate Policy Number
        function random_num($size) {
            $length = $size;
            $key = '';
            $keys = range(0, 5);

                for ($i = 0; $i < $length; $i++) {
                        $key .= $keys[array_rand($keys)];
                }
                return  $key;
        }
        $pol_no= 'MI/'.$pf."/".random_num(5);
        
        
        //New Customer Registration
        $chk=$con->query("SELECT count(user_id) AS count, email FROM users WHERE email='$email' ");
        $rr=$chk->num_rows;
        $ro=$chk->fetch_array();
        $count=$ro['count'];
        if($count < 1){
            //Password Encryption
            $pas=$pass;
            $options = [
                'cost' => 12,
            ];
            $hash= password_hash($pas, PASSWORD_BCRYPT, $options);
        
            $reg = $con->query("INSERT INTO users SET telephone='$phone', email='$email', address='$address',dob='$dobb', lastname='$lname', firstname='$fname', password='$hash',role_id ='$role',
             nfname='$nfname', nlname='$nlname', nphone='$nphone', nemail='$nemail', naddress='$naddress', created=now(), createdby='$user_id'");
            if($reg){
                //Mpping users to an insurance//
                $detail=$con->query("SELECT * FROM users WHERE email='$email'");
                $xw=$detail->fetch_array();
                $idd=$xw['user_id'];
                
                
                $tr=$con->query("INSERT INTO transaction SET user_id='$idd',insurance_id='$insurance',  product='$prod', plan='$plan',  policy='$pol_no', start_date='$start', end_date='$end', premium ='$prm', sum_assured='$sma',  
                underwriting_year='$year', transaction_date='$start', captured_by='$user_id', duration='$term', chasis_no='$chasis',     
                car_make='$make', car_model='$model', reg_no_car='$regno', status='Opened',  is_renewal='No'  
                ");
                
                $inn=$con->query("INSERT INTO  icustomer SET insurance_id ='$insurance', customer_id= '$idd'");
                if($tr && $inn){
                    
                    //Getting d transaction id
                    $trID=$con->query("SELECT transaction_id FROM transaction WHERE user_id='$idd' AND start_date='$start'");
                    $rt=$trID->fetch_array();
                    $policy = $rt['transaction_id'];
                    
                    //Updating the beneficiary ttable
                    $bn=$con->query("INSERT INTO beneficiary SET policy='$pol_no', firstname='$bfname', lastname='$blname', email='$bemail', phone_no='$bphone', address='$baddress'");
                    
                    $e="Customer's registration is successful"; 
                    echo  " <script>alert('$e');window.location='manageC.php' </script>";
                    //echo  " <script>alert('$e'); window.location='index.php?insurance_user&comp=$company'</script>";
                }else{
                  $e="Unable to map the user to an insurance company"; 
                  echo  " <script>alert('$e'); window.location='customer.php'</script>";  
                }
            }else{
               $e="Processing error. Please try again"; 
                echo  " <script>alert('$e'); window.location='customer.php'</script>"; 
            }
        }
        if($count > 0){
            //Getting Sum assured and Premium from the plan
        $gt=$con->query("SELECT premium, sum_assured, product_id FROM plan_setup WHERE plan_id='$plan'");
        $gr=$gt->fetch_array();
        $prm=$gr['premium'];
        $sma=$gr['sum_assured'];
        $p_id =$gr['product_id'];
            
            
            
            $u_id = $ro['user_id'];
            $tr2=$con->query("INSERT INTO transaction SET user_id='$u_id',insurance_id='$insurance', start_date='$start', end_date='$end', premium ='$premium', sum_assured='$sumAss',  
                underwriting_year='$year', transaction_date='$start', captured_by='$user_id', duration='$term', chasis_no='$chasis',     
                car_make='$make', car_model='$model', reg_no_car='$regno', status='Opened',  is_renewal='No'  
                ");
            
            //Checking if the user is already mapped with the same insurance company
            $ichk = $con->query("SELECT count(id) AS num FROM icustomer WHERE insurance_id ='$insurance' AND customer_id= '$u_id' ");
            $ry=$ichk->fetch_array();
            $rcount=$ry['num'];
            if($rcount < 1){
                $inn2=$con->query("INSERT INTO  icustomer SET insurance_id ='$insurance', customer_id= '$u_id'");
                if($tr2 && $inn2){
                    
                    //Getting d transaction id
                    $trID=$con->query("SELECT transaction_id FROM transaction WHERE user_id='$u_id' AND start_date='$start'");
                    $rt=$trID->fetch_array();
                    $policy = $rt['transaction_id'];
                    
                    //Updating the beneficiary ttable
                    $bn=$con->query("INSERT INTO beneficiary SET firstname='$bfname', lastname='$blname', email='$bemail', phone_no='$bphone', address='$baddress'");
                    
                    $e="Customer's registration is successful"; 
                    echo  " <script>alert('$e'); window.location='index.php?dashboard' </script>";
                    //echo  " <script>alert('$e'); window.location='index.php?insurance_user&comp=$company'</script>";
                }else{
                  $e="Unable to map the user to an insurance company"; 
                  echo  " <script>alert('$e'); window.location='customer.php'</script>";  
                }
            }else{
                if($tr2){
                    //When customer had been paired with the same insurance company
                    //Getting d transaction id
                    $trID=$con->query("SELECT transaction_id FROM transaction WHERE user_id='$u_id' AND start_date='$start'");
                    $rt=$trID->fetch_array();
                    $policy = $rt['transaction_id'];
                    
                    //Updating the beneficiary ttable
                    $bn=$con->query("INSERT INTO beneficiary SET firstname='$bfname', lastname='$blname', email='$bemail', phone_no='$bphone', address='$baddress'");
                    
                    $e="Customer's registration is successful"; 
                    echo  " <script>alert('$e'); window.location='index.php?dashboard' </script>";
                    //echo  " <script>alert('$e'); window.location='index.php?insurance_user&comp=$company'</script>";
                }else{
                  $e="Unable to create the transaction"; 
                  echo  " <script>alert('$e'); window.location='customer.php'</script>";  
                }
            }
                
                
        }
        
        }
}
function check_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

*/
?>
        