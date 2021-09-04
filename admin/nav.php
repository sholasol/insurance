<?php
include_once "index.php";?>

    <body class="page-header-fixed page-horizontal-bar">
        <div class="overlay"></div>
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s1">
            <h3><a href="javascript:void(0);" class="pull-right" id="closeRight"><i class="fa fa-times"></i></a></h3>
        </nav>
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
            <h3><span class="pull-left">Sandra Smith</span> <a href="javascript:void(0);" class="pull-right" id="closeRight2"><i class="fa fa-angle-right"></i></a></h3>
            <div class="slimscroll chat">
                <div class="chat-item chat-item-left">
                    <div class="chat-image">
                        <img src="../res/images/avatar2.png" alt="">
                    </div>
                    <div class="chat-message">
                        Hi There!
                    </div>
                </div>
                <div class="chat-item chat-item-right">
                    <div class="chat-message">
                        Hi! How are you?
                    </div>
                </div>
                <div class="chat-item chat-item-left">
                    <div class="chat-image">
                        <img src="../res/images/avatar2.png" alt="">
                    </div>
                    <div class="chat-message">
                        Fine! do you like my project?
                    </div>
                </div>
                <div class="chat-item chat-item-right">
                    <div class="chat-message">
                        Yes, It's clean and creative, good job!
                    </div>
                </div>
                <div class="chat-item chat-item-left">
                    <div class="chat-image">
                        <img src="../res/images/avatar2.png" alt="">
                    </div>
                    <div class="chat-message">
                        Thanks, I tried!
                    </div>
                </div>
                <div class="chat-item chat-item-right">
                    <div class="chat-message">
                        Good luck with your sales!
                    </div>
                </div>
            </div>
            <div class="chat-write">
                <form class="form-horizontal" action="javascript:void(0);">
                    <input type="text" class="form-control" placeholder="Say something">
                </form>
            </div>
		</nav>
        <div class="menu-wrap">
            <nav class="profile-menu">
                <div class="profile"><img src="../res/images/avatar1.png" width="52" alt="David Green"/><span>David Green</span></div>
                <div class="profile-menu-list">
                    <a href="#"><i class="fa fa-star"></i><span>Favorites</span></a>
                    <a href="#"><i class="fa fa-bell"></i><span>Alerts</span></a>
                    <a href="#"><i class="fa fa-envelope"></i><span>Messages</span></a>
                    <a href="#"><i class="fa fa-comment"></i><span>Comments</span></a>
                </div>
            </nav>
            <button class="close-button" id="close-button">Close Menu</button>
        </div>
        <form class="search-form" action="#" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control search-input" placeholder="Search...">
                <span class="input-group-btn">
                    <button class="btn btn-default close-search waves-effect waves-button waves-classic" type="button"><i class="fa fa-times"></i></button>
                </span>
            </div><!-- Input Group -->
        </form><!-- Search Form -->
        <main class="page-content content-wrap">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="sidebar-pusher">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                    <div class="logo-box" style="background: #fff;">
                        <a href="home.php" class="logo-text">
                            <span>
                                <img src="../assets/images/logo2.png" height="54" alt=""/>
                            </span></a>
                    </div><!-- Logo Box -->
                    <div class="search-button">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
                    </div>
                    <div class="topmenu-outer">
                        <div class="top-menu">
                            <ul class="nav navbar-nav navbar-left">
                                <li>		
                                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic sidebar-toggle"><i class="fa fa-bars"></i></a>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li>	
                                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
                                </li>
                                <?php
                                        $usrx=$con->query("SELECT count(distinct user_id) AS customer, count(policy) AS policy, sum(premium) AS premium FROM transaction WHERE insurance_id='$i_id' AND status='Active' ");
                                        $ru2=$usrx->fetch_array();
                                        //$n=$usrx->num_rows;
                                        //$n=$ru2['customer'];
                                        $n=$ru2['policy'];
                                        ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown"><i class="fa fa-bell"></i><span class="badge badge-success pull-right"><?php echo $n;?></span></a>
                                    <ul class="dropdown-menu title-caret dropdown-lg" role="menu">
                                        <li><p class="drop-title">You have <?php echo $n;?> Transactions Today!</p></li>
                                     
                                        
                                        
                                        
                                        
                                        <li class="dropdown-menu-list slimscroll tasks">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <a href="#">
                                                        <div class="task-icon badge badge-success"><i class="icon-user"></i></div>
                                                        <span class="badge badge-roundless badge-default pull-right"><?php echo $x;?></span>
                                                        <p class="task-details"><?php echo $n;?> Policies Sold Today.</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                        <img class="img-circle avatar" src="../res/images/avatar1.png" width="40" height="40" alt="">
                                        <span class="user-name"><?php echo $name; ?><i class="fa fa-angle-down"></i></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-list" role="menu">
                                        <li role="presentation"><a href="profile.php"><i class="fa fa-user"></i>Profile</a></li>
                                        <li role="presentation"><a href="../logout.php"><i class="fa fa-sign-out m-r-xs"></i>Log out</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"  id="showRight"></a>
                                </li>
                            </ul><!-- Nav -->
                        </div><!-- Top Menu -->
                    </div>
                </div>
            </div><!-- Navbar -->
            <div class="horizontal-bar sidebar">
                <div class="page-sidebar-inner slimscroll">
                    <div class="sidebar-header">
                        <div class="sidebar-profile">
                        </div>
                    </div>
                    <ul class="menu accordion-menu">
                        
                        <li><a href="home.php" class="waves-effect waves-button"><span class="menu-icon fa fa-desktop"></span><p>Dashboard</p></a></li>
                        <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon fa fa-bank"></span><p>Partners</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li role="presentation"><a href="partner.php">Create New Partner</a></li>
                                <li role="presentation"><a href="manageP.php">Manage Partner</a></li>
                                <li role="presentation"><a href="plans.php">Create Commission</a></li>
                            </ul>
                        </li>
                        
                        <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon icon-users"></span><p>Customers</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li role="presentation"><a href="customer.php">Create Customer</a></li>
                                <li role="presentation"><a href="manageC.php">Manage Customer</a></li>
                            </ul>
                        </li>
                        <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-user"></span><p>Marketers</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li role="presentation"><a href="marketer.php">Create Marketer</a></li>
                                <li role="presentation"><a href="manage_marketer.php">Manage Marketer</a></li>
                            </ul>
                        </li>
                        <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-briefcase"></span><p>Claims</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li role="presentation"><a href="claim.php">All Claims</a></li>
                                <li role="presentation"><a href="sclaim.php">Settled Claims</a></li>
                                <li role="presentation"><a href="pclaim.php">Pending Claims</a></li>
                                <li role="presentation"><a href="com_claim.php">Commission</a></li>
                            </ul>
                        </li>
                        <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon fa fa-newspaper-o"></span><p>Products</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li role="presentation"><a href="product.php">Create Product</a></li>
                                <li role="presentation"><a href="types.php"> Product Type</a></li>
                                <li role="presentation"><a href="cats.php"> Product Category</a></li>
                                <li role="presentation"><a href="manageProd.php">Manage Product</a></li>
                            </ul>
                        </li>
                        <li><a href="report.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-stats"></span><p>Reporting</p></a></li>
                        <li><a href="complain.php" class="waves-effect waves-button"><span class="menu-icon fa fa-exclamation-circle"></span><p>Complians</p></a></li>
                        
                    </ul>
                </div><!-- Page Sidebar Inner -->
            </div><!-- Page Sidebar -->