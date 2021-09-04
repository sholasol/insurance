<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>Micro | Insurance</title>
        
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
        
        <link href="assets/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/>	
        
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
        <div id="main-wrapper">
            <div class="row">
                <?php include 'stat.php'; ?>
            </div><!-- Row -->
            <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Sales and Commission</h3>
                                </div>
                                <div class="panel-body">
                                    <div>
                                        <canvas id="chart1" height="150"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Premium (in Million) vs Number of Policy Sold</h3>
                                </div>
                                <div class="panel-body">
                                    <div>
                                        <canvas id="chart2" height="150"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                   <!-- <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Pie Chart</h3>
                                </div>
                                <div class="panel-body">
                                    <div>
                                        <canvas id="chart3" height="150"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Doughnut Chart</h3>
                                </div>
                                <div class="panel-body">
                                    <div>
                                        <canvas id="chart4" height="150"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>--><!-- Row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Monthly Premium</h3>
                                </div>
                                <div class="panel-body">
                                    <div>
                                        <canvas id="chart5" height="150"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Product Sales</h3>
                                </div>
                                <div class="panel-body">
                                    <div>
                                        <canvas id="chart6" height="150"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div id='myChart' ></div>
                        </div>
                        <div class="col-md-6">
                            <div id='myChart1' height="200"></div>
                        </div>
                    </div><!-- Row --> 
            <hr />
            <div class="row"> 
                <div class="col-md-6">
                    <div class="panel panel-white">
                        <div class="panel-heading clearfix">
                            <h4 class="panel-title">Recent Transactions</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Customer Name</th>
                                                <th>No of Policy </th>
                                                <th>Total Premium</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                            $cus=$con->query("SELECT users.user_id, users.firstname, users.lastname,  mcustomer.user_id FROM users, mcustomer WHERE users.user_id = mcustomer.user_id AND mcustomer.marketer_id='$uid'");
                                            $counter =0;
                                            while($row=$cus->fetch_array()){
                                                $id=$row['user_id'];

                                                $cnt=$con->query("SELECT  policy, count(transaction_id) AS transaction, count(policy) AS count, sum(premium) AS premium FROM transaction WHERE user_id='$id' AND marketer_id='$uid'");
                                                $ro=$cnt->fetch_array();
                                                $pol=$ro['policy'];
                                            ?>
                                            <tr>
                                                <td><?php echo ++$counter ;?> </td>
                                                <td><?php echo $row['firstname']." ".$row['lastname'] ;?></td>
                                                <td><?php  echo $ro['policy'] ;?></td>
                                                <td><?php  echo number_format($ro['premium']) ;?></td>
                                            </tr>
                                            <?php } ?>
                                            
                                        </tbody>
                                       </table> 
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="panel panel-white">
                        <div class="panel-heading clearfix">
                            <h4 class="panel-title">Claims Pending Approval</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="example" class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Customer</th>
                                            <th>Claim </th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php 
                                            //$cus=$con->query("SELECT users.user_id, users.firstname, users.lastname, users.created, mcustomer.marketer_id, mcustomer.user_id FROM users, mcustomer WHERE users.user_id = mcustomer.user_id AND mcustomer.marketer_id='$uid' LIMIT 10");
                                            $cus=$con->query("SELECT * FROM users, claims WHERE users.user_id = claims.user_id AND claims.marketer_id ='$uid' AND claims.status='Pending' LIMIT 10");
                                            $counter =0;
                                            while($row=$cus->fetch_array()){
                                                $id=$row['user_id'];
                                            ?>
                                            <tr>
                                                <td><?php echo ++$counter;?> </td>
                                                <td><?php echo $row['firstname']." ".$row['lastname'] ;?></td>
                                                <td><?php  echo $row['premium'] ;?></td>
                                                <td><?php  echo $row['created'] ;?></td>
                                            </tr>
                                            <?php } ?>
                                            
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
        </div><!-- Main Wrapper -->
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
	<?php 
        //Sales and Expenses
        $sl=$con->query("SELECT sum(premium) AS premium, sum(commission_value) AS com, created FROM commission GROUP BY created");
        //Premium
        $json1 =[]; // Premium
        $json2 =[]; // Commission
        $json3 =[]; //Created
        while($x=$sl->fetch_array()){
            $pr=$x['premium'];
            $cum=$x['com'];
            $dt=$x['created'];
          $json1[]= $pr;
          $json2[]= $cum;
          $json3[]= $dt;
        }
        
        
        
        
        //Sales and Premium
        $sp=$con->query("SELECT sum(premium) AS premium, MONTH(start_date) AS month, count(policy) AS policy FROM transaction WHERE status='Active' GROUP BY MONTH(start_date) ");
        //Premium
        $json5 =[]; // Premium
        $json6 =[]; //Month from  created
        
        $json7 =[]; //Policy sold
        while($a=$sp->fetch_array()){
            $pre=$a['premium'];
            $st=$a['month'];
            $pol=$a['policy'];
            $time = strtotime($st);
            $mon = date('M',$time);
            $json5[]= $pre;
            $json6[]= $mon;
            $json7[]= $pol;
            $json8[]= $pre/1000000;
        }
        ?>

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
        <script src="../res/js/modern.min.js"></script>
        <script src="../zing/zingchart.jquery.min.js" type="text/javascript"></script>
        <script src="../zing/zingchart.min.js" type="text/javascript"></script>
        <!-- Chart JS-->
         <script src="../res/plugins/chartsjs/Chart.min.js"></script>
         <script>
                $( document ).ready(function() {

              var ctx1 = document.getElementById("chart1").getContext("2d");
              var data1 = {
                  labels: <?php echo json_encode($json3); ?>,
                  datasets: [
                      {
                          label: "Premium",
                          fillColor: "rgba(220,220,220,0.2)",
                          strokeColor: "rgba(220,220,220,1)",
                          pointColor: "rgba(220,220,220,1)",
                          pointStrokeColor: "#fff",
                          pointHighlightFill: "#fff",
                          pointHighlightStroke: "rgba(220,220,220,1)",
                          data: <?php echo json_encode($json1); ?>
                      },
                      {
                          label: "Commission",
                          fillColor: "rgba(34,186,160,0.2)",
                          strokeColor: "rgba(34,186,160,1)",
                          pointColor: "rgba(34,186,160,1)",
                          pointStrokeColor: "#fff",
                          pointHighlightFill: "#fff",
                          pointHighlightStroke: "rgba(18,175,203,1)",
                          data: <?php echo json_encode($json2); ?>
                      }
                  ]
              };

              var chart1 = new Chart(ctx1).Line(data1, {
                  scaleShowGridLines : true,
                  scaleGridLineColor : "rgba(0,0,0,.05)",
                  scaleGridLineWidth : 1,
                  scaleShowHorizontalLines: true,
                  scaleShowVerticalLines: true,
                  bezierCurve : true,
                  bezierCurveTension : 0.4,
                  pointDot : true,
                  pointDotRadius : 4,
                  pointDotStrokeWidth : 1,
                  pointHitDetectionRadius : 20,
                  datasetStroke : true,
                  datasetStrokeWidth : 2,
                  datasetFill : true,
                  legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
                  responsive: true
              });

              var ctx2 = document.getElementById("chart2").getContext("2d");
              var data2 = {
                  labels: <?php echo json_encode($json6); ?>,
                  datasets: [
                      {
                          label: "Premium",
                          fillColor: "rgba(220,220,220,0.5)",
                          strokeColor: "rgba(220,220,220,0.8)",
                          highlightFill: "rgba(220,220,220,0.75)",
                          highlightStroke: "rgba(220,220,220,1)",
                          data: <?php echo json_encode($json8); ?>
                      },
                      {
                          label: "Policy",
                          fillColor: "rgba(34,186,160,0.5)",
                          strokeColor: "rgba(34,186,160,0.8)",
                          highlightFill: "rgba(34,186,160,0.75)",
                          highlightStroke: "rgba(34,186,160,1)",
                          data: <?php echo json_encode($json7); ?>
                      }
                  ]
              };

              var chart2 = new Chart(ctx2).Bar(data2, {
                  scaleBeginAtZero : true,
                  scaleShowGridLines : true,
                  scaleGridLineColor : "rgba(0,0,0,.05)",
                  scaleGridLineWidth : 1,
                  scaleShowHorizontalLines: true,
                  scaleShowVerticalLines: true,
                  barShowStroke : true,
                  barStrokeWidth : 2,
                  barDatasetSpacing : 1,
                  legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
                  responsive: true
              });

             
              
              
              var ctx5 = document.getElementById("chart5").getContext("2d");
              var data5 = {
                  labels: <?php echo json_encode($json6); ?>,
                  datasets: [
                      {
                          label: "Premium",
                          fillColor: "rgba(34,186,160,0.5)",
                          strokeColor: "rgba(34,186,160,0.8)",
                          highlightFill: "rgba(34,186,160,0.75)",
                          highlightStroke: "rgba(34,186,160,1)",
                          data: <?php echo json_encode($json5); ?>
                      }
                  ]
              };

              var chart5 = new Chart(ctx5).Bar(data5, {
                  scaleBeginAtZero : true,
                  scaleShowGridLines : true,
                  scaleGridLineColor : "rgba(0,0,0,.05)",
                  scaleGridLineWidth : 1,
                  scaleShowHorizontalLines: true,
                  scaleShowVerticalLines: true,
                  barShowStroke : true,
                  barStrokeWidth : 2,
                  barDatasetSpacing : 1,
                  legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
                  responsive: true
              });
              
              var ctx6 = document.getElementById("chart6").getContext("2d");
              var data6 = {
                  labels: <?php echo json_encode($json6); ?>,
                  datasets: [
                      {
                          label: "Sales",
                          fillColor: "rgba(34,186,160,0.5)",
                          strokeColor: "rgba(34,186,160,0.8)",
                          highlightFill: "rgba(34,186,160,0.75)",
                          highlightStroke: "rgba(34,186,160,1)",
                          data: <?php echo json_encode($json7); ?>
                      }
                  ]
              };

              var chart6 = new Chart(ctx6).Bar(data6, {
                  scaleBeginAtZero : true,
                  scaleShowGridLines : true,
                  scaleGridLineColor : "rgba(0,0,0,.05)",
                  scaleGridLineWidth : 1,
                  scaleShowHorizontalLines: true,
                  scaleShowVerticalLines: true,
                  barShowStroke : true,
                  barStrokeWidth : 2,
                  barDatasetSpacing : 1,
                  legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
                  responsive: true
              });

              });                      
            </script>
        
        
        
        <script>
          zingchart.THEME = "classic";
          var initState = null; // Used later to store the chart state before changing the data
          var store = { // Data store
            2014: [
              ["Jan", 4.8],
              ["Feb", 4.3],
              ["Mar", 3.7],
              ["Apr", 3.0],
              ["May", 2.5],
              ["Jun", 1.4],
              ["Jul", 1.2],
              ["Aug", 0.8],
              ["Sep", 0.6],
              ["Oct", 0.6],
              ["Nov", 0.4],
              ["Dec", 0.2]
            ],
            2015: [
              ["Jan", 4.8],
              ["Feb", 4.3],
              ["Mar", 3.7],
              ["Apr", 3.0],
              ["May", 2.5],
              ["Jun", 1.4],
              ["Jul", 1.2],
              ["Aug", 0.8],
              ["Sep", 0.6],
              ["Oct", 0.6],
              ["Nov", 0.4],
              ["Dec", 0.2] 
            ],
            2016: [
              ["Jan", 4.8],
              ["Feb", 4.3],
              ["Mar", 3.7],
              ["Apr", 3.0],
              ["May", 2.5],
              ["Jun", 1.4],
              ["Jul", 1.2],
              ["Aug", 0.8],
              ["Sep", 0.6],
              ["Oct", 0.6],
              ["Nov", 0.4],
              ["Dec", 0.2]
            ],
            2017: [
              ["Jan", 4.8],
              ["Feb", 4.3],
              ["Mar", 3.7],
              ["Apr", 3.0],
              ["May", 2.5],
              ["Jun", 1.4],
              ["Jul", 1.2],
              ["Aug", 0.8],
              ["Sep", 0.6],
              ["Oct", 0.6],
              ["Nov", 0.4],
              ["Dec", 0.2]
            ],
            2018: [
              ["Jan", 4.8],
              ["Feb", 4.3],
              ["Mar", 3.7],
              ["Apr", 3.0],
              ["May", 2.5],
              ["Jun", 1.4],
              ["Jul", 1.2],
              ["Aug", 0.8],
              ["Sep", 0.6],
              ["Oct", 0.6],
              ["Nov", 0.4],
              ["Dec", 0.2]
            ]
          };
          var bgColors = ["#1976d2", "#424242", "#388e3c", "#ffa000", "#7b1fa2", "#c2185b"]; 
          var myConfig = {
            "globals": {
              "font-family": "Helvetica"
            },
            "type": "bar",
            "background-color": "white",
            "title": {
              "color": "#606060",
              "background-color": "white",
              "text": "Yearly Sales Analysis."
            },
            "subtitle": {
              "color": "#606060",
              "text": "Click the columns to view per year."
            },
            "scale-y": {
              "line-color": "none",
              "tick": {
                "line-color": "none"
              },
              "guide": {
                "line-style": "solid"
              },
              "item": {
                "color": "#606060"
              }
            },
            "scale-x": {
              "values": [
                "2014",
                "2015",
                "2016",
                "2017",
                "2018",

              ],
              "line-color": "#C0D0E0",
              "line-width": 1,
              "tick": {
                "line-width": 1,
                "line-color": "#C0D0E0"
              },
              "guide": {
                "visible": false
              },
              "item": {
                "color": "#606060"
              }
            },
            "crosshair-x": {
              "marker": {
                "visible": false
              },
              "line-color": "none",
              "line-width": "0px",
              "scale-label": {
                "visible": false
              },
              "plot-label": {
                "text": "%data-browser: %v% of total",
                "multiple": true,
                "font-size": "12px",
                "color": "#606060",
                "background-color": "white",
                "border-width": 3,
                "alpha": 0.9,
                "callout": true,
                "callout-position": "bottom",
                "shadow": 0,
                "placement": "node-top",
                "border-radius": 4,
                "offsetY": -20,
                "padding": 8,
                "rules": [{
                  "rule": "%i==0",
                  "border-color": "#1976d2"
                }, {
                  "rule": "%i==1",
                  "border-color": "#424242"
                }, {
                  "rule": "%i==2",
                  "border-color": "#388e3c"
                }, {
                  "rule": "%i==3",
                  "border-color": "#ffa000"
                }, {
                  "rule": "%i==4",
                  "border-color": "#7b1fa2"
                }, {
                  "rule": "%i==5",
                  "border-color": "#c2185b"
                }]
              }
            },
            "plot": {
              "data-browser": [
                "<span style='font-weight:bold;color:#1976d2;'>2014</span>",
                "<span style='font-weight:bold;color:#424242;'>2015</span>",
                "<span style='font-weight:bold;color:#388e3c;'>2016</span>",
                "<span style='font-weight:bold;color:#ffa000;'>2017</span>",
                "<span style='font-weight:bold;color:#7b1fa2;'>2018</span>",
                //"<span style='font-weight:bold;color:#c2185b;'>2018</span>"
              ],
              "cursor": "hand",
              "value-box": {
                "text": "%v%",
                "text-decoration": "underline",
                "color": "#606060"
              },
              "tooltip": {
                "visible": false
              },
              "animation": {
                "effect": "7"
              },
              "rules": [{
                "rule": "%i==0",
                "background-color": "#1976d2"
              }, {
                "rule": "%i==1",
                "background-color": "#424242"
              }, {
                "rule": "%i==2",
                "background-color": "#388e3c"
              }, {
                "rule": "%i==3",
                "background-color": "#ffa000"
              }, {
                "rule": "%i==4",
                "background-color": "#7b1fa2"
              }, {
                "rule": "%i==5",
                "background-color": "#c2185b"
              }]
            },
            "series": [{
              "values": [
                56.33,
                24,
                10.4,
                4.8,
                0.9,
                0.2
              ]
            }]
          };

          var updateChart = function(p) {
            initState = zingchart.exec(p.id, 'getdata'); // Gets the state of the chart when the node was clicked
            var newValues = null;
            var update = null;
            switch (p.nodeindex) {
              case 0:
                newValues = store['2014'];
                update = true;
                break;
              case 1:
                newValues = store['2015'];
                update = true;
                break;
              case 2:
                newValues = store['2016'];
                update = true;
                break;
              case 3:
                newValues = store['2017'];
                update = true;
                break;
              case 4:
                newValues = store['2018'];
                update = true;
                break;

            }
            if (update) {
              zingchart.unbind(p.id, 'node_click'); // Disable node_click for second level
              zingchart.exec(p.id, 'modify', {
                update: false, // Making multiple changes, queue these changes
                data: {
                  "crosshair-x": {
                    "plot-label": {
                      "text": "%v% of total",
                      "rules": [],
                      "border-color": bgColors[p.nodeindex]
                    }
                  },
                  "plot": {
                    "cursor": null,
                    "rules": [],
                    "background-color": bgColors[p.nodeindex]
                  },
                  "scale-x": {
                    "values": []
                  }
                }
              });
              zingchart.exec(p.id, 'setseriesvalues', { // Replaces all values at plotindex 0
                update: false, // Queue these, too
                plotindex: 0,
                values: newValues
              });
              zingchart.exec(p.id, 'update'); // Push queued changes
              zingchart.bind(p.id, 'animation_end', function() { // When the animation ends...
                zingchart.exec(p.id, 'addobject', { // ...add a back button
                  type: 'shape',
                  data: {
                    "type": "rectangle",
                    "id": "back_btn",
                    "height": 20,
                    "width": 70,
                    "background-color": "#ffffff #f6f6f6",
                    "x": "80%",
                    "y": "16%",
                    "border-width": 1,
                    "border-color": "#888",
                    "cursor": "hand",
                    "label": {
                      "text": "< Back",
                      "color": "#606060"
                    },
                    "hover-state": {
                      "background-color": "#1976D2 #ffffff",
                      "border-color": "#57a2ff",
                      "fill-angle": -180
                    }
                  }
                });
              });
            }
          };

          zingchart.render({
            id: 'myChart1',
            data: myConfig,
          });

          zingchart.bind('myChart1', 'node_click', updateChart);

          zingchart.bind('myChart1', 'shape_click', function(p) { // Listen for back button click
            zingchart.unbind(p.id, 'animation_end');
            if (p.shapeid == "back_btn") {
              zingchart.exec(p.id, 'setdata', { // Set the data back to the state it was in when the node was clicked
                data: initState
              });
              zingchart.bind(p.id, 'node_click', updateChart);
            }
          });
        </script>



        <script>
          var myConfig = {
            backgroundColor: '#FBFCFE',
            type: "ring",
            title: {
              text: "Product Analysis <?php echo date('Y'); ?>",
              fontFamily: 'Lato',
              fontSize: 14,
              // border: "1px solid black",
              padding: "10",
              fontColor: "#1E5D9E",
            },
            plot: {
              slice: '50%',
              borderWidth: 0,
              backgroundColor: '#FBFCFE',
              animation: {
                effect: 2,
                sequence: 3
              },
              valueBox: [{
                type: 'all',
                text: '%t',
                placement: 'out'
              }, {
                type: 'all',
                text: '%npv%',
                placement: 'in'
              }]
            },
            tooltip: {
              fontSize: 16,
              anchor: 'c',
              x: '50%',
              y: '50%',
              sticky: true,
              backgroundColor: 'none',
              borderWidth: 0,
              thousandsSeparator: ',',
              text: '<span style="color:%color">Page Url: %t</span><br><span style="color:%color">Pageviews: %v</span>',
              mediaRules: [{
                maxWidth: 500,
                y: '54%',
              }]
            },
            plotarea: {
              backgroundColor: 'transparent',
              borderWidth: 0,
              borderRadius: "30 0 0 30",
              margin: "40 0 0 40"
            },
            legend: {
              toggleAction: 'remove',
              backgroundColor: '#FBFCFE',
              borderWidth: 0,
              adjustLayout: true,
              align: 'center',
              verticalAlign: 'bottom',
              marker: {
                type: 'circle',
                cursor: 'pointer',
                borderWidth: 0,
                size: 5
              },
              item: {
                fontColor: "#777",
                cursor: 'pointer',
                offsetX: -6,
                fontSize: 12
              },
              mediaRules: [{
                maxWidth: 500,
                visible: false
              }]
            },
            scaleR: {
              refAngle: 270
            },
            series: [{
              text: "Term Life",
              values: [106541],
              lineColor: "#00BAF2",
              backgroundColor: "#00BAF2",
              lineWidth: 1,
              marker: {
                backgroundColor: '#00BAF2'
              }
            }, {
              text: "Motorcycle",
              values: [56711],
              lineColor: "#E80C60",
              backgroundColor: "#E80C60",
              lineWidth: 1,
              marker: {
                backgroundColor: '#E80C60'
              }
            }, {
              text: "Savings",
              values: [43781],
              lineColor: "#9B26AF",
              backgroundColor: "#9B26AF",
              lineWidth: 1,
              marker: {
                backgroundColor: '#9B26AF'
              }
            },{
              text: "Farm",
              values: [56711],
              lineColor: "#00FF00",
              backgroundColor: "#00FF00",
              lineWidth: 1,
              marker: {
                backgroundColor: '#E80C60'
              }
            },]
          };

          zingchart.render({
            id: 'myChart',
            data: {
              gui: {
                contextMenu: {
                  button: {
                    visible: true,
                    lineColor: "#2D66A4",
                    backgroundColor: "#2D66A4"
                  },
                  gear: {
                    alpha: 1,
                    backgroundColor: "#2D66A4"
                  },
                  position: "right",
                  backgroundColor: "#306EAA",
                  /*sets background for entire contextMenu*/
                  docked: true,
                  item: {
                    backgroundColor: "#306EAA",
                    borderColor: "#306EAA",
                    borderWidth: 0,
                    fontFamily: "Lato",
                    color: "#fff"
                  }

                },
              },
              graphset: [myConfig]
            },
            height: '499',
            width: '99%'
          });
        </script>
    </body>
</html>
