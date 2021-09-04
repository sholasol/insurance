<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>New Policy Registration</title>
        
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
    $prd=$_GET['prd'];
    $id=$_GET['id'];
    $pln=$_GET['pln'];
    
    $pl=$con->query("SELECT * FROM plan_setup WHERE product_id='$prd'");
    $or=$pl->fetch_array();
    $prem=$or['premium'];
    
    $plln= $con->query("SELECT * FROM plan_setup WHERE plan_id='$pln'");
    $rr=$plln->fetch_array();
    $plnn=$rr['name'];
    
    if(isset($_POST['submit'])){
        if(empty($_POST['product'])){
        $e="Please select a product"; 
        echo  " <script>alert('$e'); window.location='policy.php?prd=$prd'</script>";
	}
        elseif(empty($_POST['plan'])){
        $e="Please select a plan"; 
        echo  " <script>alert('$e'); window.location='policy.php?prd=$prd'</script>";
	}
        elseif(empty($_POST['start'])){
        $e="Please select a start date"; 
        echo  " <script>alert('$e'); window.location='policy.php?prd=$prd'</script>";
	}
        elseif(empty($_POST['term'])){
        $e="Please select a plan term "; 
        echo  " <script>alert('$e'); window.location='policy.php?prd=$prd'</script>";
	}
        else{
            $comp= check_input($_POST["comp"]);
         $userid = check_input($_POST["usr"]);
         $pID = check_input($_POST["partner"]);
        //Beneficiary
        $bfname = check_input($_POST["bfname"]);
        $blname = check_input($_POST["blname"]);
        $bemail = check_input($_POST["bemail"]);
        $bphone = check_input($_POST["bphone"]);
        $baddress = check_input($_POST["baddress"]);
        
        $bfname2 = check_input($_POST["bfname2"]);
        $blname2 = check_input($_POST["blname2"]);
        $bemail2 = check_input($_POST["bemail2"]);
        $bphone2 = check_input($_POST["bphone2"]);
        $baddress2 = check_input($_POST["baddress2"]);
        
        //Product
        $prod = check_input($_POST["prdt"]);
        $plan = check_input($_POST["plan"]); 
       
         
        $start = check_input($_POST["start"]); 
        $term = check_input($_POST["term"]); 
        $premium = check_input($_POST["premium"]);
        $sumAss = check_input($_POST["assured"]);
        
        //Motor Product
        $chasis = check_input($_POST["chasis"]);
        $make = check_input($_POST["make"]);
        $model = check_input($_POST["model"]);
        $regno = check_input($_POST["regno"]);
        
        
        
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
        
        
        //Getting Insurance Prefix From Product Information
        $pr=$con->query("SELECT prefix FROM insurance_company WHERE company_id='$comp'");
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
        
            $tr=$con->query("INSERT INTO transaction SET user_id='$userid',insurance_id='$comp', partner_id ='$pID', product='$prd', plan='$plan',  policy='$pol_no', start_date='$start', end_date='$end', premium ='$premium', sum_assured='$sumAss',  
            underwriting_year='$year', transaction_date='$start',  duration='$term', chasis_no='$chasis',     
            car_make='$make', car_model='$model', reg_no_car='$regno', status='Opened',  is_renewal='No'");

            
            if($tr){
                
                //Updating the beneficiary table
                $bn=$con->query("INSERT INTO beneficiary SET policy='$pol_no', firstname='$bfname', lastname='$blname', email='$bemail', phone_no='$bphone', address='$baddress'");
                if(empty($_POST['bfname2']) || empty($_POST['blname2'])){ }
                else{
                    $bn2=$con->query("INSERT INTO beneficiary SET policy='$pol_no', firstname='$bfname2', lastname='$blname2', email='$bemail2', phone_no='$bphone2', address='$baddress2'");
                }
                if($bn){
                    $e="Your policy has been successfully submitted. An email has been sent to you."; 
                    echo  " <script>alert('$e');window.location='viewC.php?policy=$pol_no' </script>";
                    //echo  " <script>alert('$e'); window.location='index.php?insurance_user&comp=$company'</script>";
                }
            }else{
              $e="Unable to process the beneficiry information"; 
              echo  " <script>alert('$e'); window.location='policy.php?prd=$prd'</script>";  
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
         
            <div class="page-inner">
                <div class="page-title">
                    <h3> Registration</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="company.php">Companies</a></li>
                            <li><a href="#"> Registration</a></li>
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
                                            <li role="presentation" class="active"><a href="#tab1" data-toggle="tab"><i class="fa fa-briefcase m-r-xs"></i>Policy Information</a></li>
                                            <li role="presentation"><a href="#tab2" data-toggle="tab"><i class="fa fa-male m-r-xs"></i>Beneficiary & Next of Kin</a></li>
                                        </ul>
                          
                                    
                                        <div class="progress progress-sm m-t-sm">
                                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                            </div>
                                        </div>
                                        <form id="wizardForm" method="post" action="">
                                            <div class="tab-content">
                                                
                                                <div class="tab-pane active fade in" id="tab1">
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <input type="hidden" name="comp" value="<?php echo $id; ?>" />
                                                            <input type="hidden" name="usr" value="<?php echo $uid; ?>" />
                                                            <input type="hidden" name="partner" value="<?php echo $pat_id; ?>" />
                                                            <input type="hidden" name="prdt" value="<?php echo $prd; ?>" />
                                                            <div class="form-group col-md-6">
                                                                    <label for="exampleInputName">Product</label>
                                                                    <select class="form-control"  name="product" id="product" required>
                                                                        <?php 
                                                                        $pro= $con->query("SELECT * FROM product_setup WHERE product_id='$prd'");
                                                                        while($rr=$pro->fetch_array()){
                                                                            $proID=$rr['product_id'];
                                                                            $prod_name=$rr['product_name'];
                                                                            echo "<option value='".$proID."' >".$prod_name."</option>";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="exampleInputName">Plan</label>
                                                                    <select class="form-control" name="plan" required>
                                                                        <option> <?php echo $plnn; ?></option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="exampleInputProductId">Premium</label>
                                                                    <input type="text" name="premium" id="premium" class="form-control" value="<?php echo $prem; ?>" />
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="exampleInputProductId">Sum Assured</label>
                                                                    <input type="text" name="assured" id="assured" class="form-control" placeholder="Sum Assured" />
                                                                </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="exampleInputProductName">Start</label>
                                                                        <input type="text" class="form-control date-picker" name="start" id="exampleInputProductName" placeholder="Start" required>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="exampleInputProductId">Term</label>
                                                                        <select class="form-control" name="term" required>
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
                                                                        <label for="exampleInputProductId">Car Make</label>
                                                                        <select class="form-control" name="make" required>
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
                                                                        <label for="exampleInputProductId">Car Model</label>
                                                                        <select class="form-control" name="model" required>
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
                                                <div class="tab-pane fade" id="tab2">
                                                    <div class="row">
                                                        <label class="col-md-12 btn btn-primary">1st Beneficiary Information</label>
                                                        <div class="col-md-12">
                                                            <div class="form-group col-md-6">
                                                                <label for="exampleInputName">First Name</label>
                                                                <input type="text" class="form-control" name="bfname" id="exampleInputName" placeholder="First Name" required>
                                                            </div>
                                                            <div class="form-group  col-md-6">
                                                                <label for="exampleInputName2">Last Name</label>
                                                                <input type="text" class="form-control col-md-6" name="blname" id="exampleInputName2" placeholder="Last Name" required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="exampleInputEmail">Email address</label>
                                                                <input type="email" class="form-control" name="bemail" id="exampleInputEmail" placeholder="Enter email">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="exampleInputName">Phone</label>
                                                                <input type="text" class="form-control" name="bphone" id="exampleInputName" placeholder="Telephone Number" required>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label for="exampleInputHolder">Address</label>
                                                                <input type="text" class="form-control" name="baddress" id="exampleInputHolder" placeholder="Next of Kin Address">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-md-12 btn btn-primary">2nd Beneficiary Information</label>
                                                        <div class="col-md-12">
                                                            <div class="form-group col-md-6">
                                                                <label for="exampleInputName">First Name</label>
                                                                <input type="text" class="form-control" name="bfname2" id="exampleInputName" placeholder="First Name" required>
                                                            </div>
                                                            <div class="form-group  col-md-6">
                                                                <label for="exampleInputName2">Last Name</label>
                                                                <input type="text" class="form-control col-md-6" name="blname2" id="exampleInputName2" placeholder="Last Name" required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="exampleInputEmail">Email address</label>
                                                                <input type="email" class="form-control" name="bemail2" id="exampleInputEmail" placeholder="Enter email">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="exampleInputName">Phone</label>
                                                                <input type="text" class="form-control" name="bphone2" id="exampleInputName" placeholder="Telephone Number" required>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label for="exampleInputHolder">Address</label>
                                                                <input type="text" class="form-control" name="baddress2" id="exampleInputHolder" placeholder="Next of Kin Address">
                                                            </div>
                                                        </div>
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