<?php 
if(isset($_GET['id'])){
    $pid=$_GET['id'];   
}
?>
<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>Manage Plan</title>
        
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
        <h3>Plan </h3>
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="home.php">Home</a></li>
                <li><a href="manageProd.php">Products</a></li>
                <li><a href="#">Plan</a></li>
            </ol>
        </div>
    </div>
     <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">Plan</h4>
                                </div>
                                <div class="panel-body">
                                   <div class="table-responsive">
                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th width="4%"></th>
                                                <th>Plan Name</th>
                                                <th width="10%">Premium</th>
                                                <th width="10%">Sum Assured</th>
                                                <th width="10%">Commission</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th width="4%"></th>
                                                <th>Plan Name</th>
                                                <th width="10%">Premium</th>
                                                <th width="10%">Sum Assured</th>
                                                <th width="10%">Commission</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $pr=$con->query("SELECT * FROM plan_setup WHERE product_id='$pid'");
                                            $counter=0;
                                            while($ro=$pr->fetch_array()){
                                                $id=$ro['plan_id'];
                                            ?>
                                            <tr>
                                                <td>
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action <span class="caret"></span></button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <?php echo" <li><a href='cover.php?id=$id&prod=$pid' title='Create Cover' ><i class='fa fa-plus-circle'></i>Create Cover</a></li>";?>
                                                            <?php echo" <li><a href='managecover.php?id=$id&prod=$pid' title='View Cover'><i class='fa fa-eye'></i> View Cover</a></li>"; ?>
                                                           <?php echo"
                                                             <li><a href='editPlan.php?id=$id' title='Edit Plan' ><i class='fa fa-edit'></i>Edit Plan</a></li>
                                                               ";?> 
                                                            
                                                            <li><a href="manageplan.php?del=<?php echo $id;?>&prod=$pid" title="Delete Plan" onclick="return confirm('Delete this Plan ?')"><i class="fa fa-trash"></i>Delete Plan</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php echo $ro['name']; ?>
                                                    <div class="page-breadcrumb">
                                                        <ol class="breadcrumb">
                                                            Cover:
                                                            <?php
                                                            $co=$con->query("SELECT * FROM cover WHERE plan_id='$id'");
                                                            while($rw=$co->fetch_array()){
                                                                $cc=$rw['cover'];
                                                            ?>
                                                            <li><a href="#"><?php echo $rw['cover']; ?></a></li>
                                                            <?php } ?>
                                                        </ol>
                                                    </div>
                                                </td>
                                                <td><?php echo $ro['premium']; ?></td>
                                                <td><?php echo $ro['sum_assured']; ?></td>
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
 <?php 
 include 'tfoot.php'; 
 if(isset($_GET['del'])){
    $dl=$_GET['del'];
    $pd=$_GET['prod'];
    
    $del=$con->query("DELETE FROM plan_setup WHERE plan_id='$dl'");
    
    if($del){
        
        $de=$con->query("DELETE FROM cover WHERE plan_id='$dl'");
        if($de){
        $e="The plan has been successfully deleted."; 
        echo  " <script>alert('$e'); window.location='manageplan.php?id=$pid'</script>";
        }
        }
    }
 ?>