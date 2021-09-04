<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>Policy Renewal</title>
        
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
        <link href="../res/css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="../res/css/themes/white.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="../res/css/custom.css" rel="stylesheet" type="text/css"/>
        
        <script src="../res/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="../res/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <?php 
    include 'nav.php';
    $pol=$_GET['pol'];
    $tr=$con->query("SELECT * FROM transaction WHERE policy='$pol'");
    $ro=$tr->fetch_array();
    $id= $ro['user_id'];
    $renNum = $ro['renewal_no'];
    $insurance= $ro['insurance_id'];
    $prem= $ro['premium'];
    $sum = $ro['sum_assured'];
    $make = $ro['car_make'];
    $chasis = $ro['chasis_no'];
    $regno = $ro['reg_no_car'];
    $model = $ro['car_model'];
    $pro=$ro['product'];
    $plan=   $ro['plan'];

    $pr=$con->query("SELECT product_name FROM product_setup WHERE product_id='$pro'");
    $rw=$pr->fetch_array();
    
    $pd=$rw['product_name'];
    
    $pln=$con->query("SELECT * FROM plan_setup WHERE plan_id='$plan'");
    $row=$pln->fetch_array();
    
    $pname=$row['name'];
    
    $usr=$con->query("SELECT * FROM users WHERE user_id='$id'");
    $ru=$usr->fetch_array();
    
    $nm= $ru['firstname']." ".$ru['lastname'] ;
    
    if(isset($_POST['submit'])){
       
       if(empty($_POST['term'])){
        $e="Please specify term for this policy"; 
        echo  " <script>alert('$e'); window.location='ren.php?pol=$pol'</script>";
	}
        elseif(empty($_POST['freq'])){
        $e="Please specify the payment frequency!"; 
        echo  " <script>alert('$e'); window.location='ren.php?pol=$pol'</script>";
	}
        else{
            $term = check_input($_POST["term"]); 
            $freq = check_input($_POST["freq"]);
            
            //Calculating End date from start date
            $startDate= date('Y-m-d');
            $days = $term * 365 ;
            $dayStr = $days == 1 ? 'day' : 'days';
            $end = date('Y-m-d', strtotime('+ '.$days. ' '.$dayStr, strtotime($startDate )));
            $n=$renNum+1;
            
            $year=date('Y');
            //Updating the number of times the policy has been renewed
            $upd=$con->query("UPDATE transaction SET status='Renewed', renewal_no='$n', is_renewal='Yes' WHERE policy='$pol'");
            
            //Recreating the same policy as Renewal
            
            $tr=$con->query("INSERT INTO transaction SET user_id='$id',insurance_id='$insurance', product='$pro', plan='$plan',  policy='$pol', start_date=now(), end_date='$end', premium ='$prem', sum_assured='$sum',  
               payment_freq='$freq',  underwriting_year='$year', transaction_date=now(), captured_by='$uid', duration='$term', chasis_no='$chasis',     
                car_make='$make', car_model='$model', reg_no_car='$regno', status='Active',  is_renewal='Yes'   ");
            
            if($tr){
                $e="The policy has been successfully renewed!"; 
                echo  " <script>alert('$e'); window.location='viewC2.php?policy=$pol'</script>";
            }else{
                $e="Operation error"; 
                echo  " <script>alert('$e'); window.location='ren.php?pol=$pol'</script>";
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
                    <h3>Claim Process</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="#">Claim Process</a></li>
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
                                                                    <label for="exampleInputName">Customer Name</label>
                                                                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $nm; ?>" required>
                                                                </div>
                                                                <div class="form-group  col-md-4">
                                                                    <label for="exampleInputName2">Policy Number</label>
                                                                    <input type="text" class="form-control col-md-6" name="policy" id="policy" value="<?php echo $pol; ?>"  >
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="exampleInputName">Product</label>
                                                                    <select class="form-control"  name="product" id="product" required>
                                                                        <option><?php echo $pd; ?> </option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="exampleInputName">Plan</label>
                                                                    <select class="form-control" name="plan" id="plan" required>
                                                                        <option> <?php echo $pname; ?> </option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="exampleInputName">Payment Frequency</label>
                                                                    <select class="form-control" name="freq" id="freq" required>
                                                                        <option value=""> Select Payment Frequency</option>
                                                                        <option>Monthly</option>
                                                                        <option>Quarterly</option>
                                                                        <option>Biannual</option>
                                                                        <option>Annually</option>
                                                                    </select>
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
                                                                <div class="form-group col-md-12">
                                                                 <button type="submit" name="submit" class="btn btn-success pull-right">Renew Policy</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
        
    </body>
</html>