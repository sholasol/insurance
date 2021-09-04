<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>Manage Marketer</title>
        
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
    if(isset($_GET['ter'])){
        $ter=$_GET['ter'];
        
        $dl=$con->query("DELETE FROM pmarketer WHERE user_id='$ter'");
        
        //$dl2=$con->query("DELETE FROM users WHERE user_id='$ter'");
        
        if($dl){
            $e="Record successfully deleted from the database!"; 
            echo  " <script>alert('$e');</script>";
        }
    }
    ?>
<div class="page-inner">
    <div class="page-title">
        <h3>Marketers </h3>
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="home.php">Home</a></li>
                <li><a href="#">Marketers</a></li>
            </ol>
        </div>
    </div>
     <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">Marketers</h4>
                                </div>
                                <div class="panel-body">
                                   <div class="table-responsive">
                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                             <tr>
                                                <th>#</th>
                                                <th>Marketer Name</th>
                                                <th>Agent Code</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>No of Customers</th>
                                                <th>Joined Date</th>
                                                <th>More</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Marketer Name</th>
                                                <th>Agent Code</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>No of Customers</th>
                                                <th>Joined Date</th>
                                                <th>More</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            //$pr=$con->query("SELECT * FROM product_setup WHERE insurance_id='$i_id'");
                                            $pr=$con->query("SELECT users.user_id, users.firstname, users.lastname, users.telephone, users.email, users.created, users.address,pmarketer.code, pmarketer.partner_id FROM
                                             users, pmarketer  WHERE users.user_id=pmarketer.user_id AND pmarketer.partner_id='$uid'    " );
                                            $counter=0;
                                            while($ro=$pr->fetch_array()){
                                                $id= $ro['user_id'];
                                            ?>
                                            <tr>
                                                <td><?php echo ++$counter; ?></td>
                                                <td><?php echo $ro['firstname']." ".$ro['lastname']; ?></td>
                                                <td><?php echo $ro['code']; ?></td>
                                                <td><?php echo $ro['telephone']; ?></td>
                                                <td><?php echo $ro['email']; ?></td>
                                                <td><?php echo $ro['address']; ?></td>
                                                <td></td>
                                                <td><?php echo $ro['created']; ?></td>
                                                <td>
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action <span class="caret"></span></button>
                                                        <ul class="dropdown-menu" role="menu">
                                                           <?php echo" <li><a href='edit_marketer.php?id=$id' title='Edit Details' ><i class='fa fa-pencil'></i>Edit Detail</a></li>";?>
                                                            <li><a href="manage_marketer.php?ter=<?php echo $id;?>" title="Delete this marketer record" onclick="return confirm('Delete marketer ?')"><i class="fa fa-trash"></i>Terminate Engagement</a></li>
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
 <?php include 'tfoot.php'; ?>