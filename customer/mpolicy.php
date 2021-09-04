<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>Home | Policy</title>
        
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
        <h3>Policy</h3>
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="home.php">Home</a></li>
                <li><a href="#">Policy</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">Policy</h4>
                                </div>
                                <div class="panel-body">
                                   <div class="table-responsive">
                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th width="3%">#</th>
                                                <th width="5%">Action</th>
                                                <th>Product</th>
                                                <th> Policy No.</th>
                                                <th width="10%">Total Premium</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Action</th>
                                                <th>Product</th>
                                                <th>Policy No. </th>
                                                <th>Total Premium</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php 
                                            $cus=$con->query("SELECT * FROM transaction WHERE user_id='$uid'");
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
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action <span class="caret"></span></button>
                                                        <ul class="dropdown-menu" role="menu">
                                                           <?php echo" <li><a href='viewC.php?policy=$pol' title='Edit Cover' ><i class='fa fa-user'></i>View Detail</a></li>";?>
                                                            <li><a href="mclaim.php?policy=<?php echo $pol;?>" title="Make claim request" onclick="return confirm('Make claim request?')"><i class="fa fa-briefcase"></i>Make Claim</a></li>
                                                            <li><a href="complains.php?pol=<?php echo $pol;?>" title="Complain" ><i class="fa fa-exclamation-circle"></i>Complain</a></li>
                                                            <li><a href="terminate.php?ter=<?php echo $pol;?>" title="Terminate Policy" onclick="return confirm('Terminate this Policy ?')"><i class="fa fa-trash"></i>Terminate Policy</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td><?php  echo $rp['product_name'] ;?></td>
                                                <td><?php  echo $row['policy'] ;?></td>
                                                <td><?php  echo "# ".number_format($row['premium']) ;?></td>
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
 <?php include 'tfoot.php'; ?>