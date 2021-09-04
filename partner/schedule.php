
<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>Policy | Schedule</title>
        
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
        <link href="../res/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/>	
        <link href="../res/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/>	
        <link href="../res/plugins/x-editable/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" type="text/css">
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
    $pol=$_GET['policy'];
    
    $tr=$con->query("SELECT * FROM transaction WHERE policy='$pol'");
    $ro=$tr->fetch_array();
    $id= $ro['user_id'];
    
    $pro=$ro['product'];
    $plan=   $ro['plan'];
    $insurance=   $ro['insurance_id'];

    $pr=$con->query("SELECT product_name FROM product_setup WHERE product_id='$pro'");
    $rw=$pr->fetch_array();
    $pln=$con->query("SELECT * FROM plan_setup WHERE plan_id='$plan'");
    $row=$pln->fetch_array();
    ?>
<div class="page-inner">
    <div class="page-title">
        <h3>Policy Schedule </h3>
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="home.php">Home</a></li>
                <li><a href="manageC.php">Customers</a></li>
                <li><a href="#">Schedule</a></li>
            </ol>
        </div>
    </div>
    <div id="main-wrapper">
                    <div class="row">
                        <div class="invoice col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <div class="row">
                                        <?php
                                        $usr=$con->query("SELECT * FROM users WHERE user_id='$id'");
                                        $ru=$usr->fetch_array();
                                        ?>
                                        <div class="col-md-4">
                                            <h1 class="m-b-md"><b><?php echo $ru['firstname']." ".$ru['lastname'] ?></b></h1>
                                            <address>
                                                <i class="fa fa-map-marker"></i>: <?php echo $ru['address'] ?><br>
                                                P: <?php echo $ru['telephone'] ?>
                                            </address>
                                        </div>
                                        <div class="col-md-8 text-right">
                                            <h1> Schedule</h1>
                                        </div>
                                        <div class="col-md-12">
                                            <hr>
                                            <p>
                                                <strong>Policy Information:</strong><br>
                                                Policy Start: <?php echo  $ro['start_date'];?><br>
                                                End Date: <?php echo  $ro['end_date'];?><br>
                                                  
                                                <div class="page-breadcrumb">
                                                <ol class="breadcrumb">
                                                    Beneficiary:
                                                    <?php
                                                    $bn=$con->query("SELECT * FROM beneficiary WHERE policy='$pol'");
                                                    while($br=$bn->fetch_array()){
                                                    ?>
                                                    <li><a><?php echo $br['firstname']." ".$br['lastname']; ?> </a></li>
                                                    <?php } ?>
                                                </ol>
                                            </div>
                                            </p>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <hr>
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th width="10%">Policy No.</th>
                                                        <th>Product</th>
                                                        <th width="10%">Premium</th>
                                                        <th width="10%">Sum Assured</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        
                                                        <td><?php echo $ro['policy']; ?></td>
                                                        <td>
                                                            <?php echo $rw['product_name']." ( ".$row['name']." Plan)"; ?>
                                                            
                                                        </td>
                                                        <td><?php echo "# ". number_format($ro['premium']); ?></td>
                                                        <td><?php echo "# ". number_format($ro['sum_assured']); ?></td>
                                                        
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-7">
                                            <h3>Policy Cover</h3>
                                            <p>Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                            
                                        </div>
                                        <div class="col-md-5">
                                            <div class="text-right">
                                                <table class="table table-striped">
                                                    <?php 
                                                    $cov=$con->query("SELECT * FROM cover WHERE plan_id='$plan'");
                                                    while($cr=$cov->fetch_array()){
                                                    ?>
                                                    <tr>
                                                        <td><span class="pull-left"><?php echo $cr['cover']; ?></span></td>
                                                        <td><?php echo "# ". number_format($cr['amount']); ?></td>
                                                    </tr>
                                                    <?php } ?>
                                                </table>
                                                
                                               <!-- <h4 class="no-m m-t-md text-success">Total Premium</h4>-->
                                                <?php
                                                   // $sm=$con->query("SELECT sum(premium) AS premium, sum(sum_assured) FROM transaction WHERE user_id='$id'");
                                                   //   $sr=$sm->fetch_array();
                                                ?>
                                                <h1 class="no-m text-success"><?php // echo "# ". number_format($sr['premium']); ?></h1>
                                                
                                            </div>
                                            
                                            <div class="text-right">
                                                <h4 class="no-m m-t-md text-success">Commission Amount</h4>
                                                <?php
                                                    $cmo=$con->query("SELECT commission_value  FROM commission WHERE partner_id='$uid' AND policy='$pol'");
                                                      $or=$cmo->fetch_array();
                                                ?>
                                                <h1 class="no-m text-success"><?php echo "# ". number_format($or['commission_value']); ?></h1>
                                            </div>
                                        </div>
                                    </div><!--row-->
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
    
</div>
 <?php include 'tfoot.php'; ?>

