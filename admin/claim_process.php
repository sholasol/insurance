<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>Claim Process</title>
        
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
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <?php 
    include 'nav.php';
    $claim=$_GET['id'];
    
    
    $pl=$con->query("SELECT * FROM claims WHERE claim_id='$claim'");
    $r=$pl->fetch_array();
    $pol=$r['policy'];
    $pro=$r['product'];
    $plan=   $r['plan'];
    $prm=   $r['premium'];
    $sum=   $r['sum_assured'];
    $insurance=   $r['insurance_id'];
    $usr=$r['user_id'];

    $pr=$con->query("SELECT product_name, product_id FROM product_setup WHERE product_id='$pro'");
    $rw=$pr->fetch_array();
    $pr_id=$rw['product_id'];
    $pln=$con->query("SELECT * FROM plan_setup WHERE plan_id='$plan'");
    $row=$pln->fetch_array();
    $pla=$row['name'];
    
    $cov=$con->query("SELECT sum(amount) AS Amount FROM cover WHERE plan_id='$plan'");
    $rx=$cov->fetch_array();
    $Amount= $rx['Amount'];
    
    $cus=$con->query("SELECT firstname, lastname FROM users WHERE user_id='$usr'");
    $ro=$cus->fetch_array();
    $nm=$ro['firstname']." ". $ro['lastname'];
    
    if(isset($_POST['submit'])){
        if(empty($_POST['claim'])){
        $e="Approved claim amount cannot be empty."; 
        echo  " <script>alert('$e'); window.location='claim_process.php?id=$claim'</script>";
	}
        elseif(empty($_POST['status'])){
        $e="Please update claim status progress."; 
        echo  " <script>alert('$e'); window.location='claim_process.php?id=$claim'</script>";
	}else{
           $usr = check_input($_POST["usr"]); 
           $prd = check_input($_POST["prd"]);
           $poly = check_input($_POST["poly"]);
           $clm = check_input($_POST["claim"]);
           $status = check_input($_POST["status"]);
           
            
            
            
            if($status=='Approved'){
                $clm=$con->query("UPDATE claims SET amount_paid='$clm', status='$status', closing_date=now() WHERE claim_id='$claim' ");
            }
            elseif($status=='Waiting'){
                $clm=$con->query("UPDATE claims SET amount_paid='$clm', status='$status' WHERE claim_id='$claim' ");
            }
            if($clm){
                
                $e="Claim processed successfully"; 
                $e2="This claim processing ";
                if($status=='Approved'){echo  " <script>alert('$e'); window.location='claim.php' </script>";}
                elseif($status=='Waiting'){echo  " <script>alert('$e2'); window.location='claim.php' </script>";}
                
            } else {
                $e="Processing error! Please try again"; 
                echo  " <script>alert('$e'); window.location='claim_process.php?id=$claim' </script>";
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
                            <li><a href="home.php">Home</a></li>
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
                                            <li role="presentation" class="active"><a href="#tab1" data-toggle="tab"><i class="fa fa-briefcase m-r-xs"></i>Claim Process</a></li>
                                        </ul>
                          
                                    
                                        <div class="progress progress-sm m-t-sm">
                                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                            </div>
                                        </div>
                                        <?php 
                                        
                                        ?>
                                        <form id="wizardForm" method="post" action="">
                                            <div class="tab-content">
                                                <div class="tab-pane active fade in" id="tab1">
                                                    <div class="row m-b-lg">
                                                        <div class="col-md-10">
                                                            <input type="hidden" name="prd" value="<?php echo $pr_id; ?>" />
                                                            <input type="hidden" name="usr" value="<?php echo $uid; ?>" />
                                                            <input type="hidden" name="poly" value="<?php echo $pol; ?>" />
                                                            <div class="row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="exampleInputName">Customer Name</label>
                                                                    <input type="text" class="form-control" name="name" id="exampleInputName" value="<?php echo $nm; ?>" disabled required>
                                                                </div>
                                                                <div class="form-group  col-md-6">
                                                                    <label for="exampleInputName2">Policy Number</label>
                                                                    <input type="text" class="form-control col-md-6" name="policy" id="exampleInputName2" value="<?php echo $pol; ?>" disabled required />
                                                                </div>
                                                                 <div class="form-group  col-md-6">
                                                                    <label for="exampleInputName2">Product Name</label>
                                                                    <input type="text" class="form-control col-md-6 disabled" name="product" id="exampleInputName2" value="<?php echo $rw['product_name']?>"  disabled required />
                                                                </div>

                                                                <div class="form-group  col-md-6">
                                                                    <label for="exampleInputName2">Plan</label>
                                                                    <input type="text" class="form-control col-md-6" name="pln" id="exampleInputName2" value="<?php echo $pla; ?>" disabled required />
                                                                </div>
                                                                
                                                                <div class="form-group  col-md-6">
                                                                    <label for="exampleInputName2">Claim Amount</label>
                                                                    <input type="number" class="form-control col-md-6" name="claim" id="exampleInputName2" value="<?php echo $r['claim_amount']?>"  disabled required/>
                                                                </div>
<!--                                                                <div class="form-group  col-md-6">
                                                                    <label for="exampleInputName2">Sum Assured</label>
                                                                    <input type="number" class="form-control col-md-6" name="assured" id="exampleInputName2" value="" />
                                                                </div>-->
                                                                <div class="form-group  col-md-6">
                                                                    <label for="exampleInputName2">Incident Date</label>
                                                                    <input type="text" class="form-control col-md-6 date-picker" name="date" id="exampleInputName2" value="<?php echo $r['incident_date']?>"  disabled required />
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="exampleInputEmail">Nature of Loss</label>
                                                                    <textarea class="form-control" name="nature" id="exampleInputEmail" rows="4" disabled required><?php echo $r['nature_of_loss']?></textarea>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="exampleInputEmail">Narration of Loss</label>
                                                                    <textarea class="form-control" name="naration" id="exampleInputEmail" rows="4" disabled required><?php echo $r['narration']?></textarea>
                                                                </div><br>
                                                                <span class="btn btn-primary col-md-12">For Office Use</span>.<br><br>
                                                                <div class="form-group  col-md-6">
                                                                    <label for="exampleInputName2">Approved Amount</label>
                                                                    <input type="number" class="form-control col-md-6" name="claim" id="claim" value="<?php echo $Amount?>"  required/>
                                                                </div>
                                                                <div class="form-group  col-md-6">
                                                                    <label for="exampleInputName2">Status</label>
                                                                    <select name="status" class="form-control" id="status" required>
                                                                        <option value="">Please Select </option>
                                                                        <option>Approved </option>
                                                                        <option>Waiting </option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                 <button type="submit" name="submit" class="btn btn-success pull-right">Save</button>
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

