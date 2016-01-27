<!DOCTYPE HTML>
<html>

<head>
    <script type="text/javascript">
        window.onload = function() {
            var chart = new CanvasJS.Chart("chartContainer", {

                title: {
                    text: "Color Histogram",
                    fontSize: 30
                },
                animationEnabled: true,
                axisX: {

                    gridColor: "Silver",
                    tickColor: "silver",

                },
                toolTip: {
                    shared: true
                },
                theme: "theme2",
                axisY: {
                    gridColor: "Silver",
                    tickColor: "silver"
                },
                legend: {
                    verticalAlign: "center",
                    horizontalAlign: "right"
                },
                data: [{
                        type: "line",
                        showInLegend: true,
                        lineThickness: 2,
                        name: "Red",
                        markerType: "square",
                        color: "red",
                        dataPoints: [
                            <?php
                                for ($i=0;$i<255;$i++){
                                ?> {
                                x: <?php echo $i+1 ?>,
                                y: <?php echo $red[$i] ?>
                            },
                            <?php
                                }
                                ?> {
                                x: 256,
                                y: <?php echo $red[255] ?>
                            }
                        ]

                    },
                    {
                        type: "line",
                        showInLegend: true,
                        lineThickness: 2,
                        name: "Green",
                        markerType: "square",
                        color: "green",
                        dataPoints: [
                            <?php
    for ($i=0;$i<255;$i++){
                                        ?> {
                                x: <?php echo $i+1 ?>,
                                y: <?php echo $green[$i] ?>
                            },
                            <?php
    }
                                        ?> {
                                x: 256,
                                y: <?php echo $green[255] ?>
                            }
                        ]

                    },
                    {
                        type: "line",
                        showInLegend: true,
                        lineThickness: 2,
                        name: "Blue",
                        markerType: "square",
                        color: "blue",
                        dataPoints: [
                            <?php
    for ($i=0;$i<255;$i++){
                                                ?> {
                                x: <?php echo $i+1 ?>,
                                y: <?php echo $blue[$i] ?>
                            },
                            <?php
    }
                                                ?> {
                                x: 256,
                                y: <?php echo $blue[255] ?>
                            }
                        ]

                    },

                ],
                legend: {
                    cursor: "pointer",
                    itemclick: function(e) {
                        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                            e.dataSeries.visible = false;
                        } else {
                            e.dataSeries.visible = true;
                        }
                        chart.render();
                    }
                }
            });

            chart.render();
        }

    </script>
<!--    <script type="text/javascript" src="../../js/canvasjs.min.js"></script>-->
    <script type="text/javascript" src="<?php echo base_url();?>js/canvasjs.min.js" ></script>
</head>

<body>
    <div id="chartContainer" style="height: 300px; width: 100%;">
    </div>
</body>

</html>
