<?php
include_once "index.php";

?>
<body class="page-header-fixed">
        <div class="overlay"></div>
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s1">
            <h3><span class="pull-left"></span><a href="javascript:void(0);" class="pull-right" id="closeRight"><i class="fa fa-times"></i></a></h3>

		</nav>
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
            <h3><span class="pull-left">Sandra Smith</span> <a href="javascript:void(0);" class="pull-right" id="closeRight2"><i class="fa fa-angle-right"></i></a></h3>
            <div class="slimscroll chat">
                <div class="chat-item chat-item-left">
                    
                </div>

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
 <!--                    <div class="logo-box" style="background: #49464B;">-->
                    <div class="logo-box" style="background: #fff;">
                        <a href="home.php" class="logo-text">
                            <span>
                               <!-- <h3 style="color: #fff;">ITH Insurance</h3>-->
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
                                <li>	
                                    <a href="home.php" class="waves-effect waves-button waves-classic"><i class="fa fa-desktop"></i> Dashboard</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                        <span class="user-name"><i class="fa fa-bank"></i> Partners<i class="fa fa-angle-down"></i></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-list" role="menu">
                                        <li role="presentation"><a href="partner.php"><i class="fa fa-newspaper-o"></i>Create Partner</a></li>
                                        <li role="presentation"><a href="manageP.php"><i class="fa fa-list-alt"></i>Manage Partner</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                        <span class="user-name"><i class="icon-users"></i> Customers<i class="fa fa-angle-down"></i></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-list" role="menu">
                                        <li role="presentation"><a href="custApi.php"><i class="fa fa-newspaper-o"></i>Create Customer (API)</a></li>
                                        <li role="presentation"><a href="customer.php"><i class="fa fa-newspaper-o"></i>Create Customer</a></li>
                                        <li role="presentation"><a href="manageC.php"><i class="fa fa-list-alt"></i>Manage Customer</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                        <span class="user-name"><i class="fa fa-user"></i> Marketers<i class="fa fa-angle-down"></i></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-list" role="menu">
                                        <li role="presentation"><a href="marketer.php"><i class="fa fa-newspaper-o"></i>Create Marketer</a></li>
                                        <li role="presentation"><a href="manage_marketer.php"><i class="fa fa-list-alt"></i>Manage Marketer</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                        <span class="user-name"><i class="fa fa-briefcase"></i> Claim<i class="fa fa-angle-down"></i></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-list" role="menu">
                                        <li role="presentation"><a href="claim.php"><i class="fa fa-briefcase "></i> Claims</a></li>
                                        <li role="presentation"><a href="pclaim.php"><i class="fa fa-folder "></i>Pending Claims</a></li>
                                        <li role="presentation"><a href="approveC.php"><i class="fa fa-credit-card"></i>Claim Approval</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                        <span class="user-name"><i class="fa fa-newspaper-o "></i> Product<i class="fa fa-angle-down"></i></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-list" role="menu">
                                        <li role="presentation"><a href="product.php"><i class="fa fa-newspaper-o "></i>Create Product</a></li>
                                        <li role="presentation"><a href="manageProd.php"><i class="fa fa-pencil-square"></i>Manage Product</a></li>
                                        <li role="presentation"><a href="plans.php"><i class="fa fa-briefcase"></i>Manage Plan</a></li>
                                    </ul>
                                </li>
                                <li>	
                                    <a href="report.php" class="waves-effect waves-button waves-classic"><i class="fa fa-bar-chart"></i> Analytics</a>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li>	
                                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown"><i class="fa fa-bell"></i><span class="badge badge-success pull-right">3</span></a>
                                    <ul class="dropdown-menu title-caret dropdown-lg" role="menu">
                                        <li><p class="drop-title">You have 3 pending tasks !</p></li>
                                        <li class="dropdown-menu-list slimscroll tasks">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <a href="#">
                                                        <div class="task-icon badge badge-success"><i class="icon-user"></i></div>
                                                        <span class="badge badge-roundless badge-default pull-right">1min ago</span>
                                                        <p class="task-details">New user registered.</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="task-icon badge badge-danger"><i class="icon-energy"></i></div>
                                                        <span class="badge badge-roundless badge-default pull-right">24min ago</span>
                                                        <p class="task-details">Database error.</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="task-icon badge badge-info"><i class="icon-heart"></i></div>
                                                        <span class="badge badge-roundless badge-default pull-right">1h ago</span>
                                                        <p class="task-details">Reached 24k likes</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="drop-all"><a href="#" class="text-center">All Tasks</a></li>
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
                                    <a href="" class="waves-effect waves-button waves-classic" id="showRight">
<!--                                        <i class="fa fa-comments"></i>-->
                                    </a>
                                </li>
                            </ul><!-- Nav -->
                        </div><!-- Top Menu -->
                    </div>
                </div>
            </div><!-- Navbar -->
            
            
            
            
            
            
            
            
            
            
            
            
            
            
           