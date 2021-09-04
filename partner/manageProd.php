<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>Manage Product Subscription</title>
        
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
        <h3>Manage Product Subscription</h3>
        <div class="page-breadcrumb">
            <ol class="breadcrumb">
                <li><a href="home.php">Home</a></li>
                <li><a href="#">Manage Products</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">Manage Products</h4>
                                </div>
                                <div class="panel-body">
                                   <div class="table-responsive">
                                       <form name="bulk_action_form" action="unsub.php" method="post" onsubmit="return subscribeConfirm();"/>   
                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th width="3%"></th>
                                                <th>Insurance Name</th>
                                                <th>Product Name</th>
                                                <th width="5%"><button type="submit"  class="btn btn-info"><span class="fa fa-check-circle"></span> Unsubscribe</button></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>Insurance Name</th>
                                                <th>Product Name</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $ins=$con->query("SELECT * FROM product_setup, subscription WHERE product_setup.product_id=subscription.product_id AND subscription.partner_id='$uid'  ");
                                            $counter=0;
                                            while($row=$ins->fetch_array()){
                                                $iid=$row['insurance_id'];
                                                $prid=$row['product_id'];
                                                
                                                
                                                $nm=$con->query("SELECT company_name FROM insurance_company WHERE company_id='$iid'");
                                                $ro=$nm->fetch_array();
                                                $comName=$ro['company_name'];
                                            ?>
                                            <tr>
                                                <td><input type="checkbox" value="<?php echo $prid; ?>" name="rid[]"></td>
                                                <td><?php echo $comName; ?></td>
                                                <td>
                                                    <?php echo $row['product_name']; ?>
                                                    <div class="page-breadcrumb">
                                                        <ol class="breadcrumb">
                                                            Plans:
                                                            <?php
                                                            $co=$con->query("SELECT * FROM plan_setup WHERE product_id='$prid'");
                                                            while($rw=$co->fetch_array()){
                                                                $plan=$rw['plan_id'];
                                                            ?>
                                                            <li><a href="managecover.php?id=<?php echo $plan; ?>&prod=<?php echo $prid; ?>"><?php echo $rw['name']; ?></a></li>
                                                            <?php } ?>
                                                        </ol>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a class="btn btn-info hide"><i class="fa fa-edit"></i></a>
                                                    <a class="btn btn-danger hide"><i class="fa fa-close"></i></a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            
                                        </tbody>
                                       </table>  
                                   </form>
                                    </div>
                                </div>
                            </div>
                        </div>
    </div>
    
</div>
                 <div class="page-footer">
                    <p class="no-s">2018 &copy; ITH <span class="pull-right">Powered By IT Horizons.</span></p>
                </div>
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
        <nav class="cd-nav-container" id="cd-nav">
            <header>
                <h3>Navigation</h3>
                <a href="#0" class="cd-close-nav">Close</a>
            </header>
            <ul class="cd-nav list-unstyled">
                <li class="cd-selected" data-menu="index">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-home"></i>
                        </span>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li data-menu="profile">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <p>Profile</p>
                    </a>
                </li>
                <li data-menu="inbox">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-envelope"></i>
                        </span>
                        <p>Mailbox</p>
                    </a>
                </li>
                <li data-menu="#">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-tasks"></i>
                        </span>
                        <p>Tasks</p>
                    </a>
                </li>
                <li data-menu="#">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-cog"></i>
                        </span>
                        <p>Settings</p>
                    </a>
                </li>
                <li data-menu="calendar">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                        <p>Calendar</p>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="cd-overlay"></div>
	

        <!-- Javascripts -->
        <script src="../res/plugins/jquery/jquery-2.1.3.min.js"></script>
        <script src="../res/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="../res/plugins/pace-master/pace.min.js"></script>
        <script src="../res/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../res/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="../res/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="../res/plugins/switchery/switchery.min.js"></script>
        <script src="../res/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="../res/plugins/offcanvasmenueffects/js/classie.js"></script>
        <script src="../res/plugins/offcanvasmenueffects/js/main.js"></script>
        <script src="../res/plugins/waves/waves.min.js"></script>
        <script src="../res/plugins/3d-bold-navigation/js/main.js"></script>
        <script src="../res/plugins/jquery-mockjax-master/jquery.mockjax.js"></script>
        <script src="../res/plugins/moment/moment.js"></script>
        <script src="../res/plugins/datatables/js/jquery.datatables.min.js"></script>
        <script src="../res/plugins/x-editable/bootstrap3-editable/js/bootstrap-editable.js"></script>
        <script src="../res/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="../res/js/modern.min.js"></script>
        <script src="../res/js/pages/table-data.js"></script>
        <script >
            /*
        function subscribeConfirm(){
            var result = confirm("Are you sure you want to unsubscribe for the selected product(s)?");
            if(result){
                return true;
            }else{
                return false;
            }
        }
        */
        $(document).ready(function(){
            $('#select_all').on('click',function(){
                if(this.checked){
                    $('.checkbox').each(function(){
                        this.checked = true;
                    });
                }else{
                     $('.checkbox').each(function(){
                        this.checked = false;
                    });
                }
            });

            $('.checkbox').on('click',function(){
                if($('.checkbox:checked').length == $('.checkbox').length){
                    $('#select_all').prop('checked',true);
                }else{
                    $('#select_all').prop('checked',false);
                }
            });
        });
        </script>
    </body>
</html>

    
    
    
    
    
    