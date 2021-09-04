<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>Manage Partner</title>
        
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
        <a href="partner.php" class="pull-right btn btn-danger"><i class="fa fa-plus-circle"></i> Create Partner</a>
        <h3>Partners </h3>
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="home.php">Home</a></li>
                <li><a href="#">Partners</a></li>
            </ol>
        </div>
    </div>
     <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Partners<?php echo $uid?></h4>
                </div>
                <div class="panel-body">
                   <div class="table-responsive">
                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                        <thead>
                             <tr>
                                <th>#</th>
                                <th>Partner Name</th>
                                <th>RC No.</th>
                                <th>Partner Code</th>
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
                                <th>Partner Name</th>
                                <th>RC No.</th>
                                <th>Partner Code</th>
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
                            $pr=$con->query("SELECT users.user_id, users.rc, users.firstname, users.lastname, users.telephone, users.email, users.created,users.address, ipartner.pcode, ipartner.insurance_id FROM
                             users, ipartner WHERE users.user_id=ipartner.partner_id AND ipartner.insurance_id='$i_id'     " );
                            $counter=0;
                            while($ro=$pr->fetch_array()){
                                $id=$ro['user_id'];
                                
                                $mk=$con->query("SELECT count(policy) AS policy FROM transaction WHERE insurance_id='$i_id' AND partner_id='$id'");
                                $r=$mk->fetch_array();
                                $no= $r['policy'];
                            ?>
                            <tr>
                                <td><?php echo ++$counter; ?></td>
                                <td><?php echo $ro['firstname']." ".$ro['lastname']; ?></td>
                                <td><?php echo $ro['rc']; ?></td>
                                <td><?php echo $ro['pcode']; ?></td>
                                <td><?php echo $ro['telephone']; ?></td>
                                <td><?php echo $ro['email']; ?></td>
                                <td><?php echo $ro['address']; ?></td>
                                <td><label class="label label-info"><?php  echo $no; ?></label></td>
                                <td><?php echo $ro['created']; ?></td>
                                <td>
                                    <div class="input-group-btn pull-left">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action <span class="caret"></span></button>
                                        <ul class="dropdown-menu" role="menu">
                                           <?php 
                                           echo" <li><a href='Pview.php?id=$id' title='View Partner Transactions' ><i class='fa fa-book'></i>View Partner's Transactions </a></li> "; 
                                           echo" <li><a href='Epartner.php?id=$id' title='Edit Partner' ><i class='fa fa-edit'></i>Edit Partner </a></li> ";  
                                           ?>
                                            <li><a href="manageP.php?ter=<?php echo $id;?>" title="Terminate Partnership" onclick="return confirm('Terminate this Partnership ?')"><i class="fa fa-close"></i>Terminate Partnership</a></li>
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
 <?php 
 include 'tfoot.php'; 
 if(isset($_GET['ter'])){
     $dd=$_GET['ter'];
     
     $del=$con->query("DELETE FROM ipartner WHERE insurance_id='$uid' AND partner_id='$dd'");
    
    if($del){
        $e="Operation successful. Partnership has been terminated."; 
        echo  " <script>alert('$e'); window.location='manageP.php'</script>";
        }
     
     
 }
 ?>