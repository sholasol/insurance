<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>Micro | Analytics</title>
        
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
        
        <link href="assets/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/>	
        
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
        <div id="main-wrapper">
            <div class="row">
                <?php include 'stat.php'; ?>
            </div><!-- Row -->
            <div class="row">
                <div class="col-md-6">
                    <div id='myChart' ></div>
                </div>
                <div class="col-md-6">
                    <div id='myChart1' height="200"></div>
                </div>
            </div>
            <hr />
            <div class="row"> 
                <div class="col-md-6">
                    <div class="panel panel-white">
                        <div class="panel-heading clearfix">
                            <h4 class="panel-title">Recent Transactions</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Customer Name</th>
                                                <th>No of Policy </th>
                                                <th>Total Premium</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $cus=$con->query("SELECT users.user_id, users.firstname, users.lastname, pcustomer.partner_id, pcustomer.user_id FROM users, pcustomer WHERE users.user_id = pcustomer.user_id AND pcustomer.partner_id='$uid' LIMIT 10");
                                            $counter =0;
                                            while($row=$cus->fetch_array()){
                                                $id=$row['user_id'];
                                                
                                                $cnt=$con->query("SELECT count(transaction_id) AS transaction, count(policy) AS policy, sum(premium) AS premium FROM transaction WHERE partner_id='$uid'");
                                                $ro=$cnt->fetch_array();
                                            ?>
                                            <tr>
                                                <td><?php echo ++$counter ;?> </td>
                                                <td><?php echo $row['firstname']." ".$row['lastname'] ;?></td>
                                                <td><?php  echo $ro['policy'] ;?></td>
                                                <td><?php  echo "# ".number_format($ro['premium']) ;?></td>
                                            </tr>
                                            <?php } ?>
                                            
                                        </tbody>
                                       </table> 
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="panel panel-white">
                        <div class="panel-heading clearfix">
                            <h4 class="panel-title">Claims Pending Approval</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="example" class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Customer</th>
                                            <th>Claim </th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php 
                                            $cus=$con->query("SELECT users.user_id, users.firstname, users.lastname, users.created, mcustomer.marketer_id, mcustomer.user_id FROM users, mcustomer WHERE users.user_id = mcustomer.user_id AND mcustomer.marketer_id='$uid' LIMIT 10");
                                            $counter =0;
                                            while($row=$cus->fetch_array()){
                                                $id=$row['user_id'];
                                                
                                                $cnt=$con->query("SELECT count(transaction_id) AS transaction, count(policy) AS policy, sum(premium) AS premium FROM transaction WHERE user_id='$id'");
                                                $ro=$cnt->fetch_array();
                                            ?>
                                            <tr>
                                                <td><?php echo ++$counter;?> </td>
                                                <td><?php echo $row['firstname']." ".$row['lastname'] ;?></td>
                                                <td><?php  echo $ro['premium'] ;?></td>
                                                <td><?php  echo $row['created'] ;?></td>
                                            </tr>
                                            <?php } ?>
                                            
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
        </div><!-- Main Wrapper -->
<?php include 'foot.php'; ?>