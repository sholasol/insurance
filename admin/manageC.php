<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>Manage Customers</title>
        
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
    <?php include 'nav.php'; ?>
<div class="page-inner">
    <div class="page-title">
        <a href="customer.php" class="pull-right btn btn-info"><i class="icon-user"></i> New Customer</a>
        <h3>Customers</h3>
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="home.php">Home</a></li>
                <li><a href="#">Customers</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">Customers</h4>
                                </div>
                                <div class="panel-body">
                                   <div class="table-responsive">
                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th width="5%">#</th>
                                                <th>Customer Name</th>
                                                <th>No of Policy </th>
                                                <th>Total Premium</th>
                                                <th>Active Policy</th>
                                                <th width="11%">More</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Customer Name</th>
                                                <th>No of Policy </th>
                                                <th>Total Premium</th>
                                                <th>Active Policy</th>
                                                <th width="11%">More</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php 
                                            $p=0;
                                            $cus=$con->query("SELECT * FROM users, transaction WHERE users.user_id = transaction.user_id AND transaction.insurance_id='$i_id' AND transaction.status !='Terminated' GROUP BY users.user_id");
                                            $counter =0;
                                            while($row=$cus->fetch_array()){
                                                $id=$row['user_id'];
                                                
                                                $cnt=$con->query("SELECT count(transaction_id) AS poly,  sum(premium) AS premium, policy FROM transaction WHERE user_id='$id' AND insurance_id='$i_id' AND status !='Renewed'");
                                                $ro=$cnt->fetch_array();
                                                $pol=$ro['poly'];
                                                $policy=$ro['policy'];
                                                $p += $pol;
                                                
                                                $cnt2=$con->query("SELECT count(transaction_id) AS poly FROM transaction WHERE user_id='$id' AND insurance_id='$i_id' AND status='Active'");
                                                $rw=$cnt2->fetch_array();
                                                $num=$rw['poly'];
                                            ?>
                                            <tr>
                                                <td><?php echo ++$counter ;?> </td>
                                                <td><?php echo $row['firstname']." ".$row['lastname'] ;?></td>
                                                <td><?php  echo $pol ;?></td>
                                                <td><?php  echo number_format($ro['premium']) ;?></td>
                                                <td><?php  echo number_format($num) ;?></td>
                                                <td>
                                                    <div class="input-group-btn pull-left">
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action <span class="caret"></span></button>
                                                        <ul class="dropdown-menu" role="menu">
                                                           <?php echo" <li><a href='custPol.php?id=$id' title='View Customer Policy' ><i class='fa fa-book'></i>View </a></li>";  ?>
                                                           <!-- <li><a href="manageC.php?delete=<?php echo $id;?>" title="Terminate Policy" onclick="return confirm('Terminate this policy ?')"><i class="fa fa-close"></i>Terminate Policy</a></li>-->
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            
                                        </tbody>
                                       </table>  
                                    </div>
                                </div>
                            </div>
                        </div>
    </div>
    
</div>
 <?php include 'tfoot.php';?>