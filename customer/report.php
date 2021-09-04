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
                <div class="panel panel-white">
                    <div class="panel-body">
                        <div role="tabpanel">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-justified" role="tablist">
                                <li role="presentation" class="active"><a href="#tab21" role="tab" data-toggle="tab">Policies</a></li>
                                <li role="presentation"><a href="#tab22" role="tab" data-toggle="tab">Claims</a></li>
                                <li role="presentation"><a href="#tab23" role="tab" data-toggle="tab">Payments</a></li>
                                <li role="presentation"><a href="#tab24" role="tab" data-toggle="tab">Notification</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active fade in" id="tab21">
                                    <div class="table-responsive">
                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th width="3%">#</th>
                                                <th width="5%">Action</th>
                                                <th>Policy No</th>
                                                <th width="18%"> Plan</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php 
                                            //Policy Details
                                            $cus=$con->query("SELECT * FROM transaction WHERE user_id='$uid'");
                                            $counter =0;
                                            while($row=$cus->fetch_array()){
                                                $pol=$row['policy'];
                                                $prd=$row['product'];
                                                
                                                $pr=$con->query("SELECT * FROM product_setup WHERE product_id='$prd'");
                                                $rp=$pr->fetch_array();
                                                
                                                $chk =$con->query("SELECT count(claim_id) AS claim FROM claims WHERE policy='$pol'");
                                                $rw=$chk->fetch_array();
                                                $cnt=$rw['claim'];
                                            ?>
                                            <tr>
                                                <td><?php echo ++$counter ;?> </td>
                                                <td>
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action <span class="caret"></span></button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <?php 
                                                           echo" <li><a href='viewC.php?policy=$pol' title='Edit Cover' ><i class='fa fa-user'></i>View Detail</a></li>";
                                                           if($cnt > 0){}
                                                           else{echo "<li><a href='mclaim.php?policy= $pol' title='Make claim request' onclick='return confirm('Make claim request?')'><i class='fa fa-briefcase'></i>Make Claim</a></li>";}
                                                           ?>
                                                            <li><a href="terminate.php?ter=<?php echo $pol;?>" title="Terminate Policy" onclick="return confirm('Terminate this Policy ?')"><i class="fa fa-trash"></i>Terminate Policy</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td><?php  echo $row['policy'] ;?></td>
                                                <td><?php  echo $rp['product_name'] ;?></td>
                                            </tr>
                                            <?php } ?>
                                            
                                        </tbody>
                                       </table>  
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab22">
                                    <div class="table-responsive">
                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th width="5%"></th>
                                                <th>Policy No.</th>
                                                <th width="5%"> Claim</th>
                                                <th width="14%"> Product</th>
                                                <th width="20%"> Nature of Loss</th>
                                                <th width="10%"> Incident Date</th>
                                                <th width="12%"> Notification Date</th>
                                                <th width="5%"> Status</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php 
                                            //Claims Detail
                                            $cus=$con->query("SELECT * FROM claims WHERE user_id='$uid'");
                                            $counter =0;
                                            while($rw=$cus->fetch_array()){
                                                $pol=$rw['policy'];
                                                $prd2=$rw['product'];
                                                
                                                $pr2=$con->query("SELECT * FROM product_setup WHERE product_id='$prd2'");
                                                $ro=$pr2->fetch_array();
                                            ?>
                                            <tr>
                                                <td>
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action <span class="caret"></span></button>
                                                        <ul class="dropdown-menu" role="menu">
                                                           <?php 
                                                           echo" <li><a href='viewC.php?policy=$pol' title='Edit Cover' ><i class='fa fa-user'></i>View Detail</a></li>";
                                                           if($cnt > 0){}
                                                           else{echo "<li><a href='mclaim.php?policy=$pol' title='Make claim request' onclick='return confirm('Make claim request?')'><i class='fa fa-briefcase'></i>Make Claim</a></li>";}
                                                           ?>
                                                            
                                                            <li><a href="terminate.php?ter=<?php echo $pol;?>" title="Terminate Policy" onclick="return confirm('Terminate this Policy ?')"><i class="fa fa-trash"></i>Terminate Policy</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td><?php  echo $rw['policy'] ;?></td>
                                                <td><?php  echo "#".number_format($rw['claim_amount']) ;?></td>
                                                <td><?php  echo $ro['product_name'];?></td>
                                                <td><?php  echo $rw['nature_of_loss'] ;?></td>
                                                <td><?php  echo $rw['incident_date'] ;?></td>
                                                <td><?php  echo $rw['notif_date'] ;?></td>
                                                <td><?php  echo $rw['status'] ;?></td>
                                            </tr>
                                            <?php } ?>
                                            
                                        </tbody>
                                       </table>  
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab23">
                                    <div class="table-responsive">
                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th width="5%"></th>
                                                <th>Policy</th>
                                                <th width="6%"> Premium</th>
                                                <th width="10%"> Amount Paid</th>
                                                <th width="10%"> Payment Date</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php 
                                            //Transaction Detail
                                            $cus=$con->query("SELECT * FROM transaction WHERE user_id='$uid'");
                                            $counter =0;
                                            while($row=$cus->fetch_array()){
                                                $pol=$row['policy'];
                                                $prd=$row['product'];
                                            ?>
                                            <tr>
                                                <td>
                                                   <!-- <div class="input-group-btn">
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action <span class="caret"></span></button>
                                                        <ul class="dropdown-menu" role="menu">
                                                           <?php echo" <li><a href='viewC.php?policy=$pol' title='Edit Cover' ><i class='fa fa-user'></i>View Detail</a></li>";?>
                                                            <li><a href="mclaim.php?policy=<?php echo $pol;?>" title="Make claim request" onclick="return confirm('Make claim request?')"><i class="fa fa-briefcase"></i>Make Claim</a></li>
                                                            <li><a href="terminate.php?ter=<?php echo $pol;?>" title="Terminate Policy" onclick="return confirm('Terminate this Policy ?')"><i class="fa fa-trash"></i>Terminate Policy</a></li>
                                                        </ul>
                                                    </div>-->
                                                </td>
                                                <td><?php  echo $row['policy'] ;?></td>
                                                <td><?php  echo number_format($row['premium']) ;?></td>
                                                <td><?php  echo number_format($row['sum_assured']) ;?></td>
                                                <td><?php  echo $row['start_date'] ;?></td>
                                            </tr>
                                            <?php } ?>
                                            
                                        </tbody>
                                       </table>  
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab24">
                                    <p>No information is available at this time</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="row"> 
                <div class="col-md-6">
                    <div class="panel panel-white">
                        <div class="panel-heading clearfix">
                            <h4 class="panel-title">Product Subscription</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <div id='myChart' ></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-white">
                        <div class="panel-heading clearfix">
                            <h4 class="panel-title">My Transaction</h4>
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
                                            </tr>
                                        </thead>
                                        
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
                                                            <li><a href="terminate.php?ter=<?php echo $pol;?>" title="Terminate Policy" onclick="return confirm('Terminate this Policy ?')"><i class="fa fa-trash"></i>Terminate Policy</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td><?php  echo $rp['product_name'] ;?></td>
                                                <td><?php  echo $row['policy'] ;?></td>
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