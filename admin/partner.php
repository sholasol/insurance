<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>Partner Registration</title>
        
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

   if(isset($_POST['submit'])){
       $em=$_POST['email'];
        if(empty($_POST['name'])){
        $e="Please fill in partner's name!"; 
        echo  " <script>alert('$e'); window.location='partner.php'</script>";
	}
        if(empty($_POST['rc'])){
        $e="Please fill in partner's registration number!"; 
        echo  " <script>alert('$e'); window.location='partner.php'</script>";
	}
        elseif(empty($_POST['phone'])){
        $e="Please fil in partner's phone number!"; 
        echo  " <script>alert('$e'); window.location='partner.php'</script>";
	}
        elseif(empty($_POST['email'])){
        $e="Please fil in partner's email address!"; 
        echo  " <script>alert('$e'); window.location='partner.php'</script>";
	}
        elseif ((!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $em))){
          $e="Invalid email entered!"; 
          echo  " <script>alert('$e'); window.location='partner.php'</script>";
       }
        elseif(empty($_POST['password'])){
        $e="Please fill in partner's password"; 
        echo  " <script>alert('$e'); window.location='partner.php'</script>";
	}
        elseif(empty($_POST['address'])){
        $e="Please fill in company's office address"; 
        echo  " <script>alert('$e'); window.location='partner.php'</script>";
	}
        else{
        $user = check_input($_POST["user"]);
        $name = check_input($_POST["name"]);
        $rc = check_input($_POST["rc"]);
        $phone = check_input($_POST["phone"]); 
        $email = check_input($_POST["email"]); 
        $pass = check_input($_POST["password"]);
        $address = check_input($_POST["address"]);
        $role= 2;
        
        //Auto Generate Partner's code
        function random_num($size) {
            $length = $size;
            $key = '';
            $keys = range(0, 5);

                for ($i = 0; $i < $length; $i++) {
                        $key .= $keys[array_rand($keys)];
                }
                return  $key;
        }
        $pcode= 'MI/P/'.random_num(5);
        
        $chk=$con->query("SELECT email FROM users WHERE email='$email' ");
        $rr=$chk->num_rows;
        if($rr < 1){
            //Password Encryption
            $pas=$pass;
            $options = [
                'cost' => 12,
            ];
            $hash= password_hash($pas, PASSWORD_BCRYPT, $options);
        
            $reg = $con->query("INSERT INTO users SET rc='$rc', telephone='$phone', email='$email', address='$address',  firstname='$name', password='$hash',role_id =3, created=now(), createdby='$user'");
            if($reg){
                //Mpping users to an insurance//
                $detail=$con->query("SELECT * FROM users WHERE email='$email'");
                $xw=$detail->fetch_array();
                $idd=$xw['user_id'];
                
                $inn=$con->query("INSERT INTO ipartner SET insurance_id ='$user', partner_id= '$idd', pcode='$pcode'");
                if($inn){
                    $e= "Registration is successful"; 
                    echo  " <script>alert('$e'); window.location='manageP.php'</script>";
                }else{
                  $e="Unable to map partner to an insurance company"; 
                  echo  " <script>alert('$e'); window.location='partner.php'</script>";  
                }
            }else{
               $e="Processing error. Please try again"; 
                echo  " <script>alert('$e'); window.location='partner.php'</script>"; 
            }
        }
        else{
            $e="This email already exists"; 
                echo  " <script>alert('$e'); window.location='partner.php'</script>";
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
                    <h3>Partner Registration</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="home.php">Home</a></li>
                            <li><a href="#">Partner Registration</a></li>
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
                                            <li role="presentation" class="active"><a href="#tab1" data-toggle="tab"><i class="fa fa-bank m-r-xs"></i>Partner Information</a></li>
                                        </ul>
                          
                                    
                                        <div class="progress progress-sm m-t-sm">
                                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                            </div>
                                        </div>
                                        <form id="wizardForm" method="post" action="">
                                            <div class="tab-content">
                                                <div class="tab-pane active fade in" id="tab1">
                                                    <input type="hidden" name="user" value="<?php echo $i_id ?>" />
                                                    <div class="row m-b-lg">
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="form-group col-md-12">
                                                                    <label for="exampleInputName">Partner Name</label>
                                                                    <input type="text" class="form-control" name="name" id="exampleInputName" placeholder="Partner Name" required />
                                                                </div>
                                                                <div class="form-group  col-md-6">
                                                                    <label for="exampleInputName2">RC Number</label>
                                                                    <input type="text" class="form-control col-md-6" name="rc" id="rc" placeholder="Registration Number" required />
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="exampleInputName">Phone</label>
                                                                    <input type="number" class="form-control" name="phone" id="phone" placeholder="Telephone Number" required />
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="exampleInputEmail">Email address</label>
                                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required />
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="exampleInputEmail">Password</label>
                                                                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter a password" required />
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="exampleInputEmail">Office address</label>
                                                                    <input type="text" class="form-control" name="address" id="address" placeholder="Office Address" required />
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