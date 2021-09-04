
<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>Partner's | Sales</title>
        
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
    $id=$_GET['id'];
    
    ?>
<div class="page-inner">
    <div class="page-title">
        <h3>Plan Cover </h3>
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="home.php">Home</a></li>
                <li><a href="manageP.php">Partners</a></li>
                <li><a href="#">Partner Sales</a></li>
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
                                            <h1> Transaction(s)</h1>
                                        </div>
                                        <div class="col-md-12">
                                            <hr>
                                            <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                                <thead>
                                                     <tr>
                                                        <th>#</th>
                                                        <th>Customer Name</th>
                                                        <th>Phone</th>
                                                        <th>Address</th>
                                                        <th>Policy No.</th>
                                                        <th>Premium</th>
                                                        <th>Sum Assured</th>
                                                        <th width='7%'>More</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                   <tr>
                                                        <th>#</th>
                                                        <th>Customer Name</th>
                                                        <th>Phone</th>
                                                        <th>Address</th>
                                                        <th>Policy No.</th>
                                                        <th>Premium</th>
                                                        <th>Sum Assured</th>
                                                        <th width='7%'>More</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php
                                                    $prem=0;
                                                    $pr=$con->query("SELECT users.user_id,users.address,  users.firstname, users.lastname, users.telephone, users.email, transaction.policy, transaction.premium, transaction.sum_assured FROM
                                                     users, transaction WHERE users.user_id=transaction.user_id AND transaction.insurance_id='$uid' AND transaction.partner_id='$id'    " );
                                                    $counter=0;
                                                    while($ro=$pr->fetch_array()){
                                                        $cid=$ro['user_id'];
                                                        $pol=$ro['policy'];
                                                        $no=$ro['premium'];
                                                        $prem +=$no;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo ++$counter; ?></td>
                                                        <td><?php echo $ro['firstname']." ".$ro['lastname']; ?></td>
                                                        <td><?php echo $ro['telephone']; ?></td>
                                                        <td><?php echo $ro['address']; ?></td>
                                                        <td><label class="label label-info"><?php  echo $ro['policy']; ?></label></td>
                                                        <td><?php echo number_format($ro['premium']); ?></td>
                                                        <td><?php echo number_format($ro['sum_assured']); ?></td>
                                                        <td>
                                                            <div class="input-group-btn pull-left">
                                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action <span class="caret"></span></button>
                                                                <ul class="dropdown-menu" role="menu">
                                                                   <?php 
                                                                   echo" <li><a href='viewC2.php?policy=$pol' title='View  Transactions' ><i class='fa fa-book'></i>View Transactions </a></li> "; ?>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                               </table> 
                                        </div>
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                            <div class="text-right">
                                                <h4 class="no-m m-t-md text-success">Total Premium</h4>
                                                
                                                <h1 class="no-m text-success"><?php echo "# ". number_format($prem); ?></h1>
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
