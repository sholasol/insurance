<?php 
$id=$_GET['id'];
$pro=$_GET['prod'];

$p=$con->query("SELECT * FROM plan_setup WHERE plan_id='$id'");
$r=$p->fetch_array();

$plan = $r['name'];

if(isset($_POST['submit'])){
        if(empty($_POST['name'])){
        $e="Plan name is mandatory!"; 
        echo  " <script>alert('$e'); window.location='index.php?cover&id=$id'</script>";
	}
        
        else{
           $planid = check_input($_POST["plan"]);
           $prod = check_input($_POST["prod"]);
           
           foreach ($_POST['cover'] as $cover => $value){
               $cover= $_POST['cover'][$cover];
               
               $pr=$con->query("INSERT INTO cover SET plan_id='$planid', product_id='$prod', cover='$cover', created=now()");
           }
           
           if($pr){
               $e="Plan cover has been successfully created."; 
                echo  " <script>alert('$e'); window.location='index.php?managecover&id=$planid&prod=$prod'</script>";
           }else{
            $e="Processing error."; 
            echo  " <script>alert('$e'); window.location='index.php?cover?id=$id'</script>";
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

<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>Plan Cover</title>
        
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
    <?php include 'nav.php'; ?>
         
            <div class="page-inner">
                <div class="page-title">
                    <h3>Cover Setup</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="index.php?dashboard">Home</a></li>
                            <li><a href="index.php?manageProd">Products</a></li>
                            <li><a href="#">Cover</a></li>
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
                                            <li role="presentation" class="active"><a href="#tab1" data-toggle="tab"><i class="fa fa-bars m-r-xs"></i>Plan Cover</a></li>
                                        </ul>
                          
                                    
                                        <div class="progress progress-sm m-t-sm">
                                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                            </div>
                                        </div>
                                        <form id="wizardForm" method="post" action="" name="FormData">
                                            <span class="btn btn-success btn-block">Create Cover for this plan</span>
                                            <div class="tab-content">
                                                <div class="tab-pane active fade in" id="tab1">
                                                    <input type="hidden" name="user" value="<?php echo $uid; ?>"/>
                                                    <input type="hidden" name="plan" value="<?php echo $id; ?>"/>
                                                    <input type="hidden" name="prod" value="<?php echo $pro; ?>"/>
                                                    <div class="row m-b-lg">
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="form-group col-md-12">
                                                                    <label for="exampleInputName">Plan Name</label>
                                                                    <input type="text" class="form-control" name="name" id="exampleInputName" value="<?php echo $plan; ?>" placeholder="Plan Name" required>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group  col-md-12 wrapper">
                                                                    <label for="exampleInputName2">Cover</label>
                                                                    <input type="text" class="form-control" name="cover[]" id="exampleInputName" placeholder="Cover " required>
                                                                </div>
                                                                
                                                                <a class="add_fields"><i class="fa fa-plus-circle"></i> Add New</a>
                                                                
                                                                <div class="form-group col-md-12"> 
                                                                 <button type="submit" name="submit" class="btn btn-success pull-right">Save</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                            
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
            //Add Input Fields
            $(document).ready(function() {
                var max_fields = 10; //Maximum allowed input fields 
                var wrapper    = $(".wrapper"); //Input fields wrapper
                var add_button = $(".add_fields"); //Add button class or ID
                var x = 1; //Initial input field is set to 1

                    //When user click on add input button
                    $(add_button).click(function(e){
                    e.preventDefault();
                            //Check maximum allowed input fields
                    if(x < max_fields){ 
                        x++; //input field increment
                                     //add input field
                        $(wrapper).append('<div><label for="exampleInputName2">New Cover</label> <input type="text" class="form-control" name="cover[]" placeholder="Cover" /> <a href="javascript:void(0);" class="remove_field pull-right" style="color: red;"><i class="fa fa-trash"> Remove</i></a></div>');
                    }
                });

                //when user click on remove button
                $(wrapper).on("click",".remove_field", function(e){ 
                    e.preventDefault();
                            $(this).parent('div').remove(); //remove inout field
                            x--; //inout field decrement
                })
            });
            </script>
        
    </body>
</html>