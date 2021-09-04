<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title> Expiring Policies</title>
        
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
    ?>
<div class="page-inner">
    <div class="page-title">
        <h3>Expiring Policies</h3>
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
                                                <th width="3%">#</th>
                                                <th width="8%">Action</th>
                                                <th>Customer Detail</th>
                                                <th>Policy No</th>
                                                <th>Status</th>
                                                <th width="18%"> Plan</th>
                                                
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php 
                                            //Policy Details
                                            $cus=$con->query("SELECT * FROM transaction WHERE insurance_id='$i_id' AND DATEDIFF(end_date, CURDATE()) BETWEEN 0 AND 30");
                                            $counter =0;
                                            while($row=$cus->fetch_array()){
                                                $pol=$row['policy'];
                                                $prd=$row['product'];
                                                
                                                $pr=$con->query("SELECT * FROM product_setup WHERE product_id='$prd'");
                                                $rp=$pr->fetch_array();
                                            ?>
                                            <tr>
                                                <td><?php echo ++$counter ;?> </td>
                                                <td>
                                                    <div class="input-group-btn">status='Terminated'
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action <span class="caret"></span></button>
                                                        <ul class="dropdown-menu" role="menu">
                                                           <?php echo" <li><a href='viewC.php?policy=$pol' title='Details' ><i class='fa fa-user'></i>View Detail</a></li>";?>
                                                            <!--<li><a href="mclaim.php?policy=<?php echo $pol;?>" title="Make claim request" onclick="return confirm('Make claim request?')"><i class="fa fa-briefcase"></i>Make Claim</a></li>-->
                                                            <li><a href="#?ren=<?php echo $id;?>" title="Renew Policy" onclick="return confirm('Renew this Policy ?')"><i class="fa fa-refresh"></i>Renew Policy</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td><?php  echo $customer ;?></td>
                                                <td><?php  echo $row['policy'] ;?></td>
                                                <td><label class="label label-danger"><?php  echo $row['status'] ;?></label></td>
                                                <td><?php  echo $rp['product_name'] ;?></td>
                                                
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
 <?php 
 include 'tfoot.php'; 
 ?>