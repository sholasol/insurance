

<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>Commission</title>
        
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
    $id=$_GET['id'];
    $prodt=$_GET['prod'];
    
    $prID=$con->query("SELECT name, plan_id FROM plan_setup WHERE plan_id='$id' ");
    $rp=$prID->fetch_array();
    $pln=$rp['name'];
    $pl=$rp['plan_id'];
    
    
if(isset($_POST['submit'])){
        if(empty($_POST['product'])){
        $e="Please fill in the premium for this project!"; 
        echo  " <script>alert('$e'); window.location='commission.php?id=$plan&prod=$prod'</script>";
	}
        if(empty($_POST['partner'])){
        $e="Please fill in the name of partner!"; 
        echo  " <script>alert('$e'); window.location='commission.php?id=$plan&prod=$prod'</script>";
	}
        if(empty($_POST['pln'])){
        $e="Please specify plan name!"; 
        echo  " <script>alert('$e'); window.location='commission.php?id=$plan&prod=$prod'</script>";
	}
        elseif(empty($_POST['comm'])){
        $e="Commission amount or percentage commission is required!"; 
        echo  " <script>alert('$e'); window.location='commission.php?id=$plan&prod=$prod'</script>";
	}
        else{
           //$inss = check_input($_POST["insurance"]);
           $plan = check_input($_POST["plan"]); 
           $comm = check_input($_POST["comm"]);
           $prod = check_input($_POST["prd"]);
           $pat = check_input($_POST["partner"]);
           
           $chk=$con->query("SELECT count(id) AS id FROM rate WHERE insurance_id='$i_id' AND partner_id='$pat' AND product_id='$prod' AND plan='$plan'");
           $x=$chk->fetch_array();
           $ct=$x['id'];
           if($ct < 1){
               $pr=$con->query("INSERT INTO rate SET insurance_id='$i_id', partner_id='$pat', product_id='$prod', plan='$plan', commission='$comm',  created=now()");
           
           if($pr){
               $e="Operation Successful!"; 
                echo  " <script>alert('$e'); window.location='vplan.php?id=$plan&prod=$prod'</script>";
           }else{
            $e="Processing error."; 
            echo  " <script>alert('$e'); window.location='commission.php?id=$plan&prod=$prod'</script>";
            }
           }else{
            $e="Commission had been created on the plan for this partner."; 
            echo  " <script>alert('$e'); window.location='commission.php?id=$plan&prod=$prod'</script>";
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
                    <h3>Commission Setup</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="home.php">Home</a></li>
                            <li><a href="plans.php">Plans </a></li>
                            <li><a href="#">Commission </a></li>
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
                                            <li role="presentation" class="active"><a href="#tab1" data-toggle="tab"><i class="fa fa-bars m-r-xs"></i>Commission</a></li>
                                        </ul>
                                        <?php
                                        $p=$con->query("SELECT * FROM product_setup WHERE product_id='$prodt'");
                                        $r=$p->fetch_array();
                                        $prdNm=$r['product_name'];
                                        $ins=$r['insurance_id'];
                                        ?>
                                        <div class="progress progress-sm m-t-sm">
                                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                            </div>
                                        </div>
                                        <form id="wizardForm" method="post" action="">
                                            <div class="tab-content">
                                                <div class="tab-pane active fade in" id="tab1">
                                                    <input type="hidden" name="user" value="<?php echo $uid; ?>"/>
                                                    <input type="hidden" name="insurance" value="<?php echo $i_id; ?>"/>
                                                    <input type="hidden" name="plan" value="<?php echo $pl; ?>"/>
                                                    <input type="hidden" name="prd" value="<?php echo $prodt; ?>"/>
                                                    <div class="row m-b-lg">
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="exampleInputName">Product</label>
                                                                    <input type="text" class="form-control" name="product" id="product" value="<?php echo $prdNm; ?>" required>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="exampleInputName">Plan</label>
                                                                    <input type="text" class="form-control" name="pln" id="exampleInputName" value="<?php echo $pln; ?>" required>
                                                                </div>
                                                                <div class="form-group  col-md-6">
                                                                    <label for="exampleInputName2">Partner</label>
                                                                    <select class="form-control" name="partner" id="partner" required>
                                                                        <option value="">Please Choose a Partner</option> 
                                                                        <?php 
                                                                        $pp=$con->query("SELECT users.user_id, users.firstname, users.lastname, ipartner.partner_id FROM users, ipartner WHERE users.user_id=ipartner.partner_id AND ipartner.insurance_id='$i_id'");
                                                                        while($a=$pp->fetch_array()){
                                                                            $part = $a['partner_id'];
                                                                            $name=$a['firstname']." ".$a['lastname'];
                                                                           // echo "<option value='$part'>$name</option>";
                                                                         ?>   
                                                                           <option value="<?php echo $part; ?>"><?php echo $name; ?></option>  
                                                                      <?php  } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group  col-md-6">
                                                                    <label for="exampleInputName2">Commission %</label>
                                                                    <input type="number" class="form-control col-md-6" name="comm" id="percom" step="0.1" min="0"  placeholder="Commission" required />
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
        <script>
        //New Business
        function calculatePrice() {
            var percentage = $('input[name=percom]').val(),
                price = $('input[name=premium]').val(),
                calcPrice = ( (price/100) * percentage ),
                discountPrice = calcPrice.toFixed(2);
            $('input[name=\'commission\']').val(discountPrice);
        }
        function calculatePerc() {
            var discountPrice = $('input[name=commission]').val(),    
                price = $('input[name=premium]').val(),
                calcPerc = ((discountPrice/price) * (100)),
                discountPerc = calcPerc.toFixed("2");
            $('input[name=percom]').val(discountPerc);
        }
        </script>
    </body>
</html>