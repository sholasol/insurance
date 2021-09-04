
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
        <script src="../res/js/pages/charts-chartjs.js"></script>
        
        
        
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
