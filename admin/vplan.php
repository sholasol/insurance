<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>View Plan Commission</title>
        
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
    $plan = $_GET['id'];
    $prd = $_GET['prod'];
    ?>
<div class="page-inner">
    <div class="page-title">
        <h3> Plan Commission </h3>
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="home.php">Home</a></li>
                <li><a href="plans.php">Plans</a></li>
                <li><a href="#">Plan Commission</a></li>
            </ol>
        </div>
    </div>
     <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">Commission</h4>
                                </div>
                                <div class="panel-body">
                                   <div class="table-responsive">
                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th width="4%"></th>
                                                <th>Partner </th>
                                                <th>Product </th>
                                                <th>Plan Name</th>
                                                <th width="10%">Commission (%)</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>Partner </th>
                                                <th>Product </th>
                                                <th>Plan Name</th>
                                                <th width="10%">Commission (%)</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $pr=$con->query("SELECT partner_id,  commission, id  FROM rate WHERE plan='$plan'");
                                            $counter=0;
                                            while($ro=$pr->fetch_array()){
                                                $comID=$ro['id'];
                                                $partner=$ro['partner_id'];
                                                $pt=$con->query("SELECT firstname, lastname FROM users WHERE user_id='$partner'");
                                                $rw = $pt->fetch_array();
                                                $prt = $rw['firstname']." ".$rw['lastname'];
                                                
                                               $ppr= $con->query("SELECT product_setup.product_name, plan_setup.name  FROM product_setup, plan_setup WHERE product_setup.product_id=plan_setup.product_id AND product_setup.product_id='$prd'"); 
                                               $r=$ppr->fetch_array();
                                            ?>
                                            <tr>
                                                <td>
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action <span class="caret"></span></button>
                                                        <ul class="dropdown-menu" role="menu"> 
                                                            
                                                            <li><a href="editCom.php?id=<?php echo $comID;?>" title="Edit Commission" ><i class="fa fa-pencil-square"></i>Edit Commission</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td><?php echo $prt; ?> </td>
                                                <td>
                                                    <?php echo $r['product_name']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $r['name']; ?>
                                                </td>
                                                <td><?php echo $ro['commission']; ?></td>
                                                
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