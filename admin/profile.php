<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title> Profile</title>
        
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
    
    $cst=$con->query("SELECT * FROM users WHERE user_id='$uid'");
    $r=$cst->fetch_array();
    $name = $r['firstname']." ".$r['lastname'];
    
    ?>
<div class="page-inner">
    <div class="profile-cover">
                    <div class="row">
                        <div class="col-md-3 profile-image">
                            <div class="profile-image-container">
                                <img src="../res/images/avatar4.png" alt="">
                            </div>
                        </div>
                        <div class="col-md-12 profile-info">
                            <div class=" profile-info-value">
                                <h3>1020</h3>
                                <p>Followers</p>
                            </div>
                            <div class=" profile-info-value">
                                <h3>1780</h3>
                                <p>Friends</p>
                            </div>
                            <div class=" profile-info-value">
                                <h3>260</h3>
                                <p>Photos</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-3 user-profile">
                            <h3 class="text-center"><?php echo $name; ?></h3>
                            <p class="text-center">UI/UX Designer</p>
                            <hr>
                            <ul class="list-unstyled text-center">
                                <li><p><i class="fa fa-map-marker m-r-xs"></i>Lagos, Nigeria</p></li>
                                <li><p><i class="fa fa-envelope m-r-xs"></i><a href="#"><?php echo $r['email']; ?></a></p></li>
                                <li><p><i class="fa fa-link m-r-xs"></i><a href="#">www.ithorizonsng.com</a></p></li>
                            </ul>
                            <hr>
                            <button class="btn btn-primary btn-block"><i class="fa fa-plus m-r-xs"></i>Follow</button>
                        </div>
                        <div class="col-md-6 m-t-lg">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <div class="post">
                                        <textarea class="form-control" placeholder="Post" rows="4=6"></textarea>
                                        <div class="post-options">
                                            <a href="#"><i class="icon-camera"></i></a>
                                            <a href="#"><i class="icon-camcorder"></i></a>
                                            <a href="#"><i class="icon-music-tone-alt"></i></a>
                                            <a href="#"><i class="icon-link"></i></a>
                                            <a href="#"><i class="icon-microphone"></i></a>
                                            <button class="btn btn-default pull-right">Post</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
<!--                            <div class="profile-timeline">
                                <ul class="list-unstyled">
                                    <li class="timeline-item">
                                        <div class="panel panel-white">
                                            <div class="panel-body">
                                                <div class="timeline-item-header">
                                                    <img src="assets/images/avatar3.png" alt="">
                                                    <p>Christopher palmer <span>Posted a Status</span></p>
                                                    <small>5 hours ago</small>
                                                </div>
                                                <div class="timeline-item-post">
                                                    <p>Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.</p>
                                                    <div class="timeline-options">
                                                        <a href="#"><i class="icon-like"></i> Like (7)</a>
                                                        <a href="#"><i class="icon-bubble"></i> Comment (2)</a>
                                                        <a href="#"><i class="icon-share"></i> Share (3)</a>
                                                    </div>
                                                    <div class="timeline-comment">
                                                        <div class="timeline-comment-header">
                                                            <img src="assets/images/avatar5.png" alt="">
                                                            <p>Nick Doe <small>1 hour ago</small></p>
                                                        </div>
                                                        <p class="timeline-comment-text">Nullam quis risus eget urna mollis ornare vel eu leo.</p>
                                                    </div>
                                                    <div class="timeline-comment">
                                                        <div class="timeline-comment-header">
                                                            <img src="assets/images/avatar2.png" alt="">
                                                            <p>Sandra Smith <small>3 hours ago</small></p>
                                                        </div>
                                                        <p class="timeline-comment-text">Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                                    </div>
                                                    <textarea class="form-control" placeholder="Replay"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="panel panel-white">
                                            <div class="panel-body">
                                                <div class="timeline-item-header">
                                                    <img src="assets/images/avatar2.png" alt="">
                                                    <p>Sandra Smith <span>Uploaded Photo</span></p>
                                                    <small>2 hours ago</small>
                                                </div>
                                                <div class="timeline-item-post">
                                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit</p>
                                                    <img src="assets/images/post-image.jpg" alt="">
                                                    <div class="timeline-options">
                                                        <a href="#"><i class="icon-like"></i> Like (14)</a>
                                                        <a href="#"><i class="icon-bubble"></i> Comment (1)</a>
                                                        <a href="#"><i class="icon-share"></i> Share (5)</a>
                                                    </div>
                                                    <div class="timeline-comment">
                                                        <div class="timeline-comment-header">
                                                            <img src="assets/images/avatar5.png" alt="">
                                                            <p>Nick Doe <small>1 hours ago</small></p>
                                                        </div>
                                                        <p class="timeline-comment-text">Nullam quis risus eget urna mollis ornare vel eu leo.</p>
                                                    </div>
                                                    <textarea class="form-control" placeholder="Replay"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="panel panel-white">
                                            <div class="panel-body">
                                                <div class="timeline-item-header">
                                                    <img src="assets/images/avatar5.png" alt="">
                                                    <p>Nick Doe <span>Was in New York</span></p>
                                                    <small>6 hours ago</small>
                                                </div>
                                                <div class="timeline-item-post">
                                                    <div id="map-canvas" style="height: 200px; width: 100%;"></div>
                                                    <div class="timeline-options">
                                                        <a href="#"><i class="icon-like"></i> Like (3)</a>
                                                        <a href="#"><i class="icon-bubble"></i> Comment (0)</a>
                                                        <a href="#"><i class="icon-share"></i> Share (2)</a>
                                                    </div>
                                                    <textarea class="form-control" placeholder="Write a comment..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>-->
                        </div>
                        <div class="col-md-3 m-t-lg">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <div class="panel-title">Team</div>
                                </div>
                                <div class="panel-body">
                                    <div class="team">
                                        <div class="team-member">
                                           <div class="online on"></div>
                                            <img src="../res/images/avatar1.png" alt="">
                                        </div>
                                        <div class="team-member">
                                           <div class="online off"></div>
                                            <img src="../res/images/avatar2.png" alt="">
                                        </div>
                                        <div class="team-member">
                                           <div class="online on"></div>
                                            <img src="../res/images/avatar3.png" alt="">
                                        </div>
                                        <div class="team-member">
                                           <div class="online on"></div>
                                            <img src="../res/images/avatar5.png" alt="">
                                        </div>
                                        <p class="more-members"><a href="#">+5 more...</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <div class="panel-title">Some Info</div>
                                </div>
                                <div class="panel-body">
                                    <p>Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.</p>
                                </div>
                            </div>
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <div class="panel-title">Skills</div>
                                </div>
                                <div class="panel-body">
                                    <p>HTML5</p>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                        </div>
                                    </div>
                                    <p>PHP</p>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        </div>
                                    </div>
                                    <p>Javascript</p>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
    
</div>
 <?php 
 include 'tfoot.php'; 
 ?>