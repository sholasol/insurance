<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>ITH| Insurance</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Modern Landing Page" />
        <meta name="keywords" content="landing" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:500,400,300' rel='stylesheet' type='text/css'>
        <link href="assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/animate/animate.css" rel="stylesheet" type="text/css">
        <link href="assets/plugins/tabstylesinspiration/css/tabs.css" rel="stylesheet" type="text/css">
        <link href="assets/plugins/tabstylesinspiration/css/tabstyles.css" rel="stylesheet" type="text/css">	
        <link href="assets/plugins/pricing-tables/css/style.css" rel="stylesheet" type="text/css">
        <link href="assets/css/landing.css" rel="stylesheet" type="text/css"/>
        
        <script src="assets/plugins/pricing-tables/js/modernizr.js"></script>
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body data-spy="scroll" data-target="#header">
        <nav id="header" class="navbar navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="fa fa-bars"></span>
                    </button>
                    <a class="navbar-brand" href="#">Micro Insurance</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <!--<li><a href="#home">Home</a></li>-->
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="home" id="home">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="home-text col-md-8">
                        <div class=" alert-warning ">
                            <?php if(isset($_GET['err'])) { ?>

                            <div class="alert alert-danger"><?php echo $_GET['err']; ?></div>

                            <?php } ?>
                        </div>
                        <h1 class="wow fadeInDown" data-wow-delay="1.5s" data-wow-duration="1.5s" data-wow-offset="10">
                            <img src="assets/images/logoa.png" alt=""/>
                        </h1><br>
                        <p class="lead wow fadeInDown" data-wow-delay="2s" data-wow-duration="1.5s" data-wow-offset="10">Sign In Here
                        <div class="row">
                            <div class="col-md-4 col-xs-2 col-sm-4"></div>
                            <div class="col-md-6 col-xs-8 col-sm-6">
                                <form method="post" action="login.php" class="wow fadeInDown" data-wow-delay="1.5s" data-wow-duration="1.5s">
                                    <div class="form-group">
                                        <input type="text" name="email" placeholder="Email" class="form-control" required/>
                                    </div>
                                     <div class="form-group">
                                        <input type="password" name="password" placeholder="password" class="form-control" required/>
                                    </div> 
                                    <!-- <button type="submit" name="login" class="btn btn-success btn-rounded btn-lg btn-block wow fadeInUp" data-wow-delay="2.5s" data-wow-duration="1.5s" data-wow-offset="10">Sign In</button>-->
                                    <button type="submit" name="login" class="btn btn-danger btn-rounded btn-lg btn-block wow fadeInUp" data-wow-delay="2.5s" data-wow-duration="1.5s" data-wow-offset="10">Sign In</button>
                                </form>
                            </div>
<!--                            <div class="col-md-4 col-xs-4 col-sm-4"></div>-->
                        </div>
                        </p>
                        
                    </div>
                </div>
            </div>
        </div>
      
         <footer>
            <div class="container">
                <p class="text-center no-s">2018 &copy; Modern ITH Insurance.</p>
            </div>
        </footer>
        
        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.1.3.min.js"></script>
        <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="assets/plugins/pace-master/pace.min.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="assets/plugins/wow/wow.min.js"></script>
        <script src="assets/plugins/smoothscroll/smoothscroll.js"></script>
        <script src="assets/plugins/tabstylesinspiration/js/cbpfwtabs.js"></script>
        <script src="assets/plugins/pricing-tables/js/main.js"></script>
        <script src="assets/js/landing.js"></script>
    </body>
</html>
