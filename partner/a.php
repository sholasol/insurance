<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>Customer Registration</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <link href="../res/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="../res/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
        <link href="../res/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../res/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="../res/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>	
        <link href="../res/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>	
        <link href="../res/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>	
        <link href="../res/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
        <link href="../res/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>	
        <link href="../res/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css"/>
        <link href="../res/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>
        
        <!-- Theme Styles -->
        <link href="../res/css/modern.css" rel="stylesheet" type="text/css"/>
        <link href="../res/css/themes/white.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="../res/css/custom.css" rel="stylesheet" type="text/css"/>
        
        <script src="../res/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="../res/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
       
    </head>
    <?php
    include 'nav.php';
    if(isset($_POST['submit'])){
        
        if(empty($_POST['product'])){
        $e="Please select a product"; 
        echo  " <script>alert('$e'); window.location='a.php'</script>";
	}
        elseif(empty($_POST['plan'])){
        $e="Please select a plan"; 
        echo  " <script>alert('$e'); window.location='a.php'</script>";
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
        $p_id=$gr['product_id'];
        //Getting the insurance ID from the product selected
        $inD=$con->query("SELECT insurance_id FROM product_setup WHERE product_id='$p_id' ");
        $ir=$inD->fetch_array();
        $in_id=$ir['insurance_id'];
        
        $ra=$con->query("SELECT commission FROM rate WHERE partner_id ='$uid' AND product_id='$prod' AND plan='$plan' AND insurance_id='$in_id'");
        $p=$ra->fetch_array();
        $comm = $p['commission'];
        $c_rate = $comm/100;
        $c_amt = $prm * $c_rate;
        
        $type = check_input($_POST["type"]); 
        $start = check_input($_POST["start"]); 
        $term = check_input($_POST["term"]); 
        $freq = check_input($_POST["freq"]);
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
        
        
        $comm2=$con->query("INSERT INTO commission SET insurance_id='$i_id', plan_id ='$plan', partner_id = '$uid', product_id ='$prod',  policy ='$pol_no',premium='$prm', commission_rate='$comm', commission_percentage='$c_rate', commission_value ='$c_amt', created =now() ");
        if($comm2){
            $e="Customer Registration is Successful!"; 
            echo  " <script>alert('$e'); window.location='manageC.php'</script>";
        }else{
            $e="Unable to process the commission!"; 
            echo  " <script>alert('$e'); window.location='a.php'</script>";
        }
        
        /*
         //Checking if the customer already exists on the system
        $chk=$con->query("SELECT count(user_id) AS count, user_id, email FROM users WHERE email='$email' ");
        $rr=$chk->num_rows;
        $ro=$chk->fetch_array();
        $count=$ro['count'];
        $usr = $ro['user_id'];
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
                
                
                $tr=$con->query("INSERT INTO transaction SET user_id='$idd',insurance_id='$insurance', partner_id ='$uid', product='$prod', plan='$plan',  policy='$pol_no', start_date='$start', end_date='$end', premium ='$prm', sum_assured='$sma',  
               payment_freq='$freq', underwriting_year='$year', transaction_date='$start', captured_by='$user_id', duration='$term', chasis_no='$chasis',     
                car_make='$make', car_model='$model', reg_no_car='$regno', status='Opened',  is_renewal='No'  
                ");
                
                $comm=$con->query("INSERT INTO commission SET plan_id ='$plan', partner_id= '$uid', product='$prod',  policy='$pol_no', commission_value='$com_amt', created=now() ");
                
                $inn=$con->query("INSERT INTO  pcustomer SET partner_id ='$uid', user_id= '$idd'");
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
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        else{
            //Registering Existing customer
            $tr=$con->query("INSERT INTO transaction SET user_id='$usr',insurance_id='$insurance', partner_id ='$uid', product='$prod', plan='$plan',  policy='$pol_no', start_date='$start', end_date='$end', premium ='$prm', sum_assured='$sma',  
               payment_freq='$freq', underwriting_year='$year', transaction_date='$start', captured_by='$user_id', duration='$term', chasis_no='$chasis',     
                car_make='$make', car_model='$model', reg_no_car='$regno', status='Opened',  is_renewal='No'  
                ");
            //Checking if the customer has exisiting policy with the same issurance company
            $ch_icustomer=$con->query("SELECT count(customer_id) AS counts FROM icustomer WHERE insurance_id ='$insurance' AND customer_id= '$usr' ");  
            $ry=$ch_icustomer->fetch_array();
            $check=$ry['counts'];
            
            if($check < 1){
                //Ckecking if the customer had been profiled for the same partner
                $ch_pcustomer=$con->query("SELECT count(user_id) AS counts FROM pcustomer WHERE partner_id ='$uid' AND user_id= '$usr' ");  
                $rp=$ch_pcustomer->fetch_array();
                $checkP=$rp['counts'];
                if($checkP > 0){
                    //Checking if the same customer had been profiled for the same partner in the past
                    $inn=$con->query("INSERT INTO  icustomer SET insurance_id ='$insurance', customer_id= '$idd'");
                    $benf2=$con->query("INSERT INTO beneficiary SET policy='$pol_no', firstname='$bfname', lastname='$blname', email='$bemail', phone_no='$bphone', address='$baddress'");
                    $benf3=$con->query("INSERT INTO beneficiary SET policy='$pol_no', firstname='$nfname', lastname='$nlname', email='$nemail', phone_no='$nphone', address='$naddress'");
                    if($benf2){
                        $e="Customer Registration is Successful!"; 
                        echo  " <script>alert('$e'); window.location='manageC.php'</script>";
                    }else{
                        $e="Could not pair add beneficiary to this policy!"; 
                        echo  " <script>alert('$e'); window.location='customer.php'</script>";
                    }
                }
                elseif($checkP < 1){
                    //Checking if the same customer had not been profiled for the same partner in the past
                    $inn=$con->query("INSERT INTO  icustomer SET insurance_id ='$insurance', customer_id= '$idd'");
                    $inP=$con->query("INSERT INTO  pcustomer SET partner_id ='$uid', customer_id= '$usr'");
                    $benf2=$con->query("INSERT INTO beneficiary SET policy='$pol_no', firstname='$bfname', lastname='$blname', email='$bemail', phone_no='$bphone', address='$baddress'");
                    $benf3=$con->query("INSERT INTO beneficiary SET policy='$pol_no', firstname='$nfname', lastname='$nlname', email='$nemail', phone_no='$nphone', address='$naddress'");
                    if($benf2){
                        $e="Customer Registration is Successful!"; 
                        echo  " <script>alert('$e'); window.location='manageC.php'</script>";
                    }else{
                        $e="Could not pair add beneficiary to this policy!"; 
                        echo  " <script>alert('$e'); window.location='customer.php'</script>";
                    }
                }
                   
            }
            elseif($check > 0){
                //Ckecking if the customer had been profiled for the same partner
                $ch_pcustomer=$con->query("SELECT count(user_id) AS counts FROM pcustomer WHERE partner_id ='$uid' AND user_id= '$usr' ");  
                $rp=$ch_pcustomer->fetch_array();
                $checkP=$rp['counts'];
                if($checkP > 0){
                    
                    $benf4=$con->query("INSERT INTO beneficiary SET policy='$pol_no', firstname='$bfname', lastname='$blname', email='$bemail', phone_no='$bphone', address='$baddress'");
                    $benf5=$con->query("INSERT INTO beneficiary SET policy='$pol_no', firstname='$nfname', lastname='$nlname', email='$nemail', phone_no='$nphone', address='$naddress'");
                    if($benf2){
                        $e="Customer Registration is Successful!"; 
                        echo  " <script>alert('$e'); window.location='manageC.php'</script>";
                    }else{
                        $e="Could not pair add beneficiary to this policy!"; 
                        echo  " <script>alert('$e'); window.location='customer.php'</script>";
                    }
                }
                elseif($checkP < 1){
                    
                    $inP=$con->query("INSERT INTO  pcustomer SET partner_id ='$uid', customer_id= '$usr'");
                    $benf4=$con->query("INSERT INTO beneficiary SET policy='$pol_no', firstname='$bfname', lastname='$blname', email='$bemail', phone_no='$bphone', address='$baddress'");
                    $benf5=$con->query("INSERT INTO beneficiary SET policy='$pol_no', firstname='$nfname', lastname='$nlname', email='$nemail', phone_no='$nphone', address='$naddress'");
                    if($benf2){
                        $e="Customer Registration is Successful!"; 
                        echo  " <script>alert('$e'); window.location='manageC.php'</script>";
                    }else{
                        $e="Could not pair add beneficiary to this policy!"; 
                        echo  " <script>alert('$e'); window.location='customer.php'</script>";
                    }
                }
            } 
                
                 
        }
         
        */
        }
}
function check_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
    ?>
         
             <div class="page-inner">
                <div class="page-title">
                    <h3> Registration</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="#">Customer Registration</a></li>
                        </ol>
                    </div>
                </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <div id="rootwizard">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#tab1" data-toggle="tab"><i class="fa fa-user m-r-xs"></i>Customer Information</a></li>
                                            <li role="presentation"><a href="#tab2" data-toggle="tab"><i class="fa fa-book m-r-xs"></i>Policy Information</a></li>
                                            <li role="presentation"><a href="#tab3" data-toggle="tab"><i class="fa fa-male m-r-xs"></i>Beneficiary & Next of Kin</a></li>
                                            <li role="presentation"><a href="#tab4" data-toggle="tab"><i class="fa fa-file m-r-xs"></i>Supporting Document</a></li>
                                        </ul>
                          
                                    
                                        <div class="progress progress-sm m-t-sm">
                                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                            </div>
                                        </div>
                                        <form id="wizardForm" method="post" action="">
                                            <div class="tab-content">
                                                <div class="tab-pane active fade in" id="tab1">
                                                    <div class="row m-b-lg">
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="exampleInputName">First Name *</label>
                                                                    <input type="text" class="form-control" name="fname" id="exampleInputName" placeholder="First Name" >
                                                                </div>
                                                                <div class="form-group  col-md-6">
                                                                    <label for="exampleInputName2">Last Name *</label>
                                                                    <input type="text" class="form-control col-md-6" name="lname" id="exampleInputName2" placeholder="Last Name" >
                                                                </div>
                                                                
                                                                <div class="form-group col-md-6">
                                                                    <label for="exampleInputEmail">Email address *</label>
                                                                    <input type="email" class="form-control" name="email" id="exampleInputEmail" placeholder="Enter email" />
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="exampleInputEmail">Password *</label>
                                                                    <input type="password" class="form-control" name="password" id="password" placeholder="Create a password" />
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="exampleInputName">Phone *</label>
                                                                    <input type="number" class="form-control" name="phone" id="phone" placeholder="Telephone Number" >
                                                                </div>
                                                                <div class="form-group  col-md-6">
                                                                    <label for="exampleInputName2">Date of Birth *</label>
                                                                    <input type="text" class="form-control col-md-6 date-picker" name="dob" id="dob" placeholder="Date of Birth" />
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="exampleInputEmail">Home address</label>
                                                                    <input type="text" class="form-control" name="address" id="address" placeholder="Residential Address" />
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="exampleInputEmail">Office address *</label>
                                                                    <input type="text" class="form-control" name="oaddress" id="exampleInputEmail" placeholder="Office Address" >
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <ul class="pager wizard">
                                                        <li class="previous"><a href="#" class="btn btn-default">Previous</a></li>
                                                        <li class="next"><a href="#" class="btn btn-default">Next</a></li>
                                                    </ul>
                                                </div>
                                                <div class="tab-pane fade" id="tab2">
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <div class="form-group col-md-6">
                                                                    <label for="exampleInputName">Product *</label>
                                                                    <select class="form-control"  name="product" id="product" required>
                                                                        <option value="">Select Product</option>
                                                                        <?php 
                                                                        $pro= $con->query("SELECT * FROM product_setup WHERE insurance_id='$i_id'");
                                                                        while($rr=$pro->fetch_array()){
                                                                            $proID=$rr['product_id'];
                                                                            $prod_name=$rr['product_name'];
                                                                            echo "<option value='".$proID."' >".$prod_name."</option>";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="exampleInputName">Plan *</label>
                                                                    <select class="form-control" name="plan" id="plan" required>
                                                                        <option value=""> Select Plan</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="exampleInputName">Payment Frequency *</label>
                                                                    <select class="form-control" name="freq" id="freq" >
                                                                        <option value=""> Select Payment Frequency</option>
                                                                        <option>Monthly</option>
                                                                        <option>Quarterly</option>
                                                                        <option>Biannual</option>
                                                                        <option>Annually</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="exampleInputName">Type</label>
                                                                    <select class="form-control" name="type" id="type" >
                                                                        <option value=""> Select Type</option>
                                                                        <option value="Life"> Life</option>
                                                                        <option value="Motor"> Motor</option>
                                                                        <option value="Livestock"> Livestock</option>
                                                                    </select>
                                                                </div>
                                                                <!--<div class="form-group col-md-6">
                                                                    <label for="exampleInputProductId">Premium</label>
                                                                    <input type="text" name="premium" id="premium" class="form-control" placeholder="Premium" />
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="exampleInputProductId">Sum Assured</label>
                                                                    <input type="text" name="assured" id="assured" class="form-control" placeholder="Sum Assured" />
                                                                </div>-->
                                                                    <div class="form-group col-md-6">
                                                                        <label for="exampleInputProductName">Start *</label>
                                                                        <input type="text" class="form-control date-picker" name="start" id="exampleInputProductName" placeholder="Start" >
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="exampleInputProductId">Term *</label>
                                                                        <select class="form-control" name="term" >
                                                                                <option value=""> Select Term</option>
                                                                                <option value="1"> 1 year</option>
                                                                                <option value="2"> 2 years</option>
                                                                                <option value="3"> 3 year</option>
                                                                                <option value="4"> 4 year</option>
                                                                                <option value="5"> 5 year</option>
                                                                            </select>
                                                                    </div>
                                                                 <div id="motor">   
                                                                    <div class="form-group col-md-6">
                                                                        <label for="exampleInputProductId">Car Make *</label>
                                                                        <select class="form-control" name="make" >
                                                                                <option value=""> Select Car Make</option>
                                                                                <option>ACURA </option>
                                                                                <option>AUDI </option>
                                                                                <option>BMW </option>
                                                                                <option>Chevrolet </option>
                                                                                <option>FIAT </option>
                                                                                <option>FORD </option>
                                                                                <option>Honda</option>
                                                                                <option>ISUZU </option>
                                                                                <option> KIA</option>
                                                                                <option> MAZDA</option>
                                                                                <option> MERCEDEZ BENZ</option>
                                                                                <option>MITSUBISHI </option>
                                                                                <option>NISSAN </option>
                                                                                <option>TOYOTA </option>
                                                                                <option>VOLKSWAGEN </option>
                                                                                <option>VOLVO</option>
                                                                            </select>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="exampleInputProductId">Car Model *</label>
                                                                        <select class="form-control" name="model" >
                                                                                <option value=""> Select Car Model</option>
                                                                                <option>A3 </option>
                                                                                <option>A4 </option>
                                                                                <option>A4 Wagon </option>
                                                                                <option>1 Series </option>
                                                                                <option>2 Series</option>
                                                                                <option>3 Series </option>
                                                                                <option>4 Series </option>
                                                                                <option>5 Series </option>
                                                                                <option>6 Series </option>
                                                                                <option>500</option>
                                                                                <option>500 L </option>
                                                                                <option>500 X  </option>
                                                                                <option>Expedition</option>
                                                                                <option>Explorer </option>
                                                                                <option>Accord </option>
                                                                                <option>Civic </option>
                                                                                <option>Odyssey </option>
                                                                                <option>Pilot </option>
                                                                                <option>Rio </option>
                                                                                <option>Rondo </option>
                                                                                <option>Optima </option>
                                                                                <option>B Series</option>
                                                                                <option>CX - 3 </option>
                                                                                <option>Cx - 5 </option>
                                                                                <option>CX -7 </option>
                                                                                <option>Mazda 2 </option>
                                                                                <option>Mazda 3 </option>
                                                                                <option>Mazda 4 </option>
                                                                                <option>A Class </option>
                                                                                <option>C Class </option>
                                                                                <option>Eclipse </option>
                                                                                <option>Endeavor </option>
                                                                                <option>Galant </option>
                                                                                <option>Lancer </option>
                                                                                <option>Outlander </option>
                                                                                <option>Amanda </option>
                                                                                <option>Frontier </option>
                                                                                <option>Maxima </option>
                                                                                <option>Pathfinder </option>
                                                                                <option>4 Runner </option>
                                                                                <option>Avalon </option>
                                                                                <option>Camry </option>
                                                                                <option>Corolla </option>
                                                                                <option>Highlander </option>
                                                                                <option>C30 </option>
                                                                                <option>C70 </option>
                                                                                <option>S40 </option>
                                                                                <option>S60 </option>
                                                                                <option>Golf </option>
                                                                                <option>Jetta </option>
                                                                                <option>Passat </option>
                                                                            </select>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="exampleInputProductId">Registration No.</label>
                                                                        <input type="text" name="regno" class="form-control" placeholder="registration number" />
                                                                    </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="exampleInputProductId">Chasis No.</label>
                                                                <input type="text" name="chasis" class="form-control" placeholder="Chasis number" />
                                                            </div>
                                                            
                                                         </div> 
                                                        </div>
                                                    </div>
                                                    <ul class="pager wizard">
                                                        <li class="previous"><a href="#" class="btn btn-default">Previous</a></li>
                                                        <li class="next"><a href="#" class="btn btn-default">Next</a></li>
                                                    </ul>
                                                </div>
                                                <div class="tab-pane fade" id="tab3">
                                                    <div class="row">
                                                        <label class="col-md-12 btn btn-primary"> Beneficiary Information</label>
                                                        <div class="col-md-12">
                                                            <div class="form-group col-md-6">
                                                                <label for="exampleInputName">First Name *</label>
                                                                <input type="text" class="form-control" name="bfname" id="exampleInputName" placeholder="First Name" >
                                                            </div>
                                                            <div class="form-group  col-md-6">
                                                                <label for="exampleInputName2">Last Name *</label>
                                                                <input type="text" class="form-control col-md-6" name="blname" id="exampleInputName2" placeholder="Last Name" >
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="exampleInputEmail">Email address </label>
                                                                <input type="email" class="form-control" name="bemail" id="exampleInputEmail" placeholder="Enter email" />
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="exampleInputName">Phone *</label>
                                                                <input type="number" class="form-control" name="bphone" id="exampleInputName" placeholder="Telephone Number" >
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label for="exampleInputHolder">Address</label>
                                                                <input type="text" class="form-control" name="baddress" id="exampleInputHolder" placeholder="Next of Kin Address">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-md-12 btn btn-primary">Next of Kin</label>
                                                        <div class="col-md-12">
                                                            <div class="form-group col-md-6">
                                                                <label for="exampleInputName">First Name *</label>
                                                                <input type="text" class="form-control" name="nfname" id="exampleInputName" placeholder="First Name" >
                                                            </div>
                                                            <div class="form-group  col-md-6">
                                                                <label for="exampleInputName2">Last Name *</label>
                                                                <input type="text" class="form-control col-md-6" name="nlname" id="exampleInputName2" placeholder="Last Name" >
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="exampleInputEmail">Email address</label>
                                                                <input type="email" class="form-control" name="nemail" id="exampleInputEmail" placeholder="Enter email">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="exampleInputName">Phone *</label>
                                                                <input type="number" class="form-control" name="nphone" id="exampleInputName" placeholder="Telephone Number" >
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label for="exampleInputHolder">Address</label>
                                                                <input type="text" class="form-control" name="naddress" id="exampleInputHolder" placeholder="Next of Kin Address">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <ul class="pager wizard">
                                                        <li class="previous"><a href="#" class="btn btn-default">Previous</a></li>
                                                        <li class="next"><a href="#" class="btn btn-default">Next</a></li>
                                                    </ul>
                                                </div>
                                                <div class="tab-pane fade" id="tab4">
                                                    <div class="form-group col-md-6">
                                                        <label for="exampleInputName">National ID</label>
                                                        <input type="file" class="form-control" name="natid" id="exampleInputName" placeholder="National Identification">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="exampleInputName">Voter's Card</label>
                                                        <input type="file" class="form-control" name="votid" id="exampleInputName" placeholder="Voter's Card">
                                                    </div>
                                                    <ul class="pager wizard">
                                                        <li class="previous"><a href="#" class="btn btn-default">Previous</a></li>
                                                        <li class="next"><button type="submit" name="submit" class="btn btn-primary pull-right">Submit</button></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
                <div class="page-footer">
                    <p class="no-s">2018 &copy; ITH <span class="pull-right">Powered By IT Horizons.</span></p>
                </div>
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
        <nav class="cd-nav-container" id="cd-nav">
            <header>
                <h3>Navigation</h3>
                <a href="#0" class="cd-close-nav">Close</a>
            </header>
            <ul class="cd-nav list-unstyled">
                <li class="cd-selected" data-menu="index">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-home"></i>
                        </span>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li data-menu="profile">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <p>Profile</p>
                    </a>
                </li>
                <li data-menu="inbox">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-envelope"></i>
                        </span>
                        <p>Mailbox</p>
                    </a>
                </li>
                <li data-menu="#">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-tasks"></i>
                        </span>
                        <p>Tasks</p>
                    </a>
                </li>
                <li data-menu="#">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-cog"></i>
                        </span>
                        <p>Settings</p>
                    </a>
                </li>
                <li data-menu="calendar">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                        <p>Calendar</p>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="cd-overlay"></div>
	

        <!-- Javascripts -->
        <script src="../res/plugins/jquery/jquery-2.1.3.min.js"></script>
        <script src="../res/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="../res/plugins/pace-master/pace.min.js"></script>
        <script src="../res/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../res/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="../res/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="../res/plugins/switchery/switchery.min.js"></script>
        <script src="../res/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="../res/plugins/offcanvasmenueffects/js/classie.js"></script>
        <script src="../res/plugins/offcanvasmenueffects/js/main.js"></script>
        <script src="../res/plugins/waves/waves.min.js"></script>
        <script src="../res/plugins/3d-bold-navigation/js/main.js"></script>
        <script src="../res/plugins/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
        <script src="../res/plugins/jquery-validation/jquery.validate.min.js"></script>
        <script src="../res/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="../res/js/modern.min.js"></script>
        <script src="../res/js/pages/form-wizard.js"></script>
        <script>
            /*
            $(document).on('keyup',"#product",function(){
                var val = $(this).val();
                if(val.length == 0)
                {
                     $("#motor").hide();
                }
                else
                {
                     $("#motor").show();
                }
           })
           
           */
          
          
          $(function() {
            $('#motor').hide(); 
            $('#type').change(function(){
                if($('#type').val() == 'Motor') {
                    $('#motor').show(); 
                } else {
                    $('#motor').hide(); 
                } 
            });
        });
       
        </script>
         <script type="text/javascript">
        $(document).ready(function(){

            $("#product").change(function(){
                var prodid = $(this).val();

                $.ajax({
                    url: 'getPlan.php',
                    type: 'post',
                    data: {prod:prodid},
                    dataType: 'json',
                    success:function(response){

                        var len = response.length;

                        $("#plan").empty();
                        for( var i = 0; i<len; i++){
                            var id = response[i]['id'];
                            var name = response[i]['name'];

                            $("#plan").append("<option value='"+id+"'>"+name+"</option>");

                        }
                    }
                });
            });

        });
    </script>
   <!-- <script type="text/javascript"s>
        $.ajax({
            url: 'json.php',
            type: 'post',
            dataType:'json',
            data: {
                plan: plan
            }   
        }).done(function(data){
            $('#premium').val(data.premium);
            $('#assured').val(data.assured);
        });
    </script>-->
    </body>
</html>