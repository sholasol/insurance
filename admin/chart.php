<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>Micro | Charts</title>
        
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
                <div id='myChart' ></div>
            </div>
            <div class="col-md-6">
                <div id='myChart1' height="200"></div>
            </div>
        </div>
        <hr />
        <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Line Chart</h3>
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
                                    <h3 class="panel-title">Bar Chart</h3>
                                </div>
                                <div class="panel-body">
                                    <div>
                                        <canvas id="chart2" height="250"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                    <div class="row">
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
                    </div><!-- Row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Polar Area Chart</h3>
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
                                    <h3 class="panel-title">Radar Chart</h3>
                                </div>
                                <div class="panel-body">
                                    <div>
                                        <canvas id="chart6" height="150"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->   
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
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  <script>
      $( document ).ready(function() {
    
    var ctx1 = document.getElementById("chart1").getContext("2d");
    var data1 = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [65, 59, 80, 81, 56, 55, 40]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(34,186,160,0.2)",
                strokeColor: "rgba(34,186,160,1)",
                pointColor: "rgba(34,186,160,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(18,175,203,1)",
                data: [28, 48, 40, 19, 86, 27, 90]
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
        labels: ["January", "February", "March", "April", "May", "June", "AUG"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(220,220,220,0.5)",
                strokeColor: "rgba(220,220,220,0.8)",
                highlightFill: "rgba(220,220,220,0.75)",
                highlightStroke: "rgba(220,220,220,1)",
                data: [65, 59, 80, 81, 56, 55, 40]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(34,186,160,0.5)",
                strokeColor: "rgba(34,186,160,0.8)",
                highlightFill: "rgba(34,186,160,0.75)",
                highlightStroke: "rgba(34,186,160,1)",
                data: [28, 48, 40, 19, 86, 27, 90]
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
    
    var ctx3 = document.getElementById("chart3").getContext("2d");
    var data3 = [
        {
            value: 300,
            color:"#F25656",
            highlight: "#FD7A7A",
            label: "Red"
        },
        {
            value: 50,
            color: "#22BAA0",
            highlight: "#36E7C8",
            label: "Green"
        },
        {
            value: 100,
            color: "#F2CA4C",
            highlight: "#FBDB6E",
            label: "Yellow"
        }
    ];
    
    var myPieChart = new Chart(ctx3).Pie(data3,{
        segmentShowStroke : true,
        segmentStrokeColor : "#fff",
        segmentStrokeWidth : 2,
        animationSteps : 100,
        animationEasing : "easeOutBounce",
        animateRotate : true,
        animateScale : false,
        legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
        responsive: true
    });
    
    var ctx4 = document.getElementById("chart4").getContext("2d");
    var data4 = [
        {
            value: 300,
            color:"#F25656",
            highlight: "#FD7A7A",
            label: "Red"
        },
        {
            value: 50,
            color: "#22BAA0",
            highlight: "#36E7C8",
            label: "Green"
        },
        {
            value: 100,
            color: "#F2CA4C",
            highlight: "#FBDB6E",
            label: "Yellow"
        }
    ];
    
    var myDoughnutChart = new Chart(ctx4).Doughnut(data4,{
        segmentShowStroke : true,
        segmentStrokeColor : "#fff",
        segmentStrokeWidth : 2,
        animationSteps : 100,
        animationEasing : "easeOutBounce",
        animateRotate : true,
        animateScale : false,
        legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
        responsive: true
    });   
    
    });                      
  </script>
    </body>
</html>
