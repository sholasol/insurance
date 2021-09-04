<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>Manage Products</title>
        
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
    
    if(isset($_GET['id'])){
    $pid=$_GET['id'];
    
    $del=$con->query("DELETE FROM product_setup WHERE product_id='$pid'");
    
    if($del){
        $e="The product has been successfully deleted."; 
        echo  " <script>alert('$e'); window.location='manageProd.php'</script>";
        }
    }
    
    ?>
<div class="page-inner">
    <div class="page-title">
        <a href="product.php" class="pull-right btn btn-info"><i class="fa fa-plus-circle"></i> Create Product</a>
        <h3>Products </h3>
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="home.php">Home</a></li>
                <li><a href="#">Products</a></li>
            </ol>
        </div>
    </div>
     <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">Products</h4>
                                </div>
                                <div class="panel-body">
                                   <div class="table-responsive">
                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th width="4%"></th>
                                                <th>Product Name</th>
                                                <th width="10%">Category</th>
                                                <th width="10%">Status</th>
                                                <th width="10%">Created</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th width="4%"></th>
                                                <th>Product Name</th>
                                                <th width="10%">Category</th>
                                                <th width="10%">Status</th>
                                                <th width="10%">Created</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $pr=$con->query("SELECT * FROM product_setup WHERE insurance_id='$i_id'");
                                            $counter=0;
                                            while($ro=$pr->fetch_array()){
                                                $id=$ro['product_id'];
                                            ?>
                                            <tr>
                                                <td>
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action <span class="caret"></span></button>
                                                        <ul class="dropdown-menu" role="menu">
                                                           <?php echo" <li><a href='plan.php?id=$id' title='Create Plan'><i class='fa fa-plus-circle'></i> Create Plan</a></li>"; ?>
                                                            <?php echo" <li><a href='manageplan.php?id=$id' title='View Plan'><i class='fa fa-eye'></i> View Plan</a></li>"; ?>
                                                           <?php echo" <li><a href='editP.php?id=$id' title='Edit Product' ><i class='fa fa-edit'></i>Edit Product</a></li>";?>
                                                            <li><a href="manageProd.php?id=<?php echo $id;?>" title="Delete Product" onclick="return confirm('Delete this product ?')"><i class="fa fa-trash"></i>Delete Product</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php echo $ro['product_name']; ?>
                                                    <div class="page-breadcrumb">
                                                        <ol class="breadcrumb">
                                                            Plans:
                                                            <?php
                                                            $co=$con->query("SELECT * FROM plan_setup WHERE product_id='$id'");
                                                            while($rw=$co->fetch_array()){
                                                                $plan=$rw['plan_id'];
                                                            ?>
                                                            <li><a href="managecover.php?id=<?php echo $plan; ?>&prod=<?php echo $id; ?>"><?php echo $rw['name']; ?></a></li>
                                                            <?php } ?>
                                                        </ol>
                                                    </div>
                                                </td>
                                                <td><?php echo $ro['category']; ?></td>
                                                <td><?php echo $ro['status']; ?></td>
                                                <td><?php echo $ro['start_date']; ?></td>
                                                
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