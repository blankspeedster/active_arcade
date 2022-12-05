<!DOCTYPE html>
<html lang="en">

<?php
include("head.php");
$user_id = $_SESSION['user_id'];

?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("sidebar.php"); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include("topbar.php"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>
                    <main id="vueApp">
                        <div class="row">

                            <!-- Heart Rate -->
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card border-left-danger shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                    Heart Rate</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{heart_rate}}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-heartbeat fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Blood Pressure -->
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Blood Pressure</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{blood_pressure}}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-compress fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Respiration -->
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Respiration
                                                </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{respiration}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-lungs fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
                <!-- /.container-fluid -->
                        <!-- Heart Rate Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold">Heart Rate</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="HeartRateChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Blood Pressure Rate Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold">Blood Pressure</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="BloodPressureChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Respiration Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold">Respiration (Oxygen Level)</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="RespirationChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include("footer.php"); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal and Scripts -->
    <?php include("logOutModalAndScripts.php"); ?>
    <!-- Logout Modal and Scripts -->
    <!--Vue Support-->
    <script src="./js/vue/vue.min.js"></script>

    <!-- Axios -->
    <script src="./js/vue/axios.min.js"></script>
    <script>
        new Vue({
            el: "#vueApp",
            data() {
                return {
                    heart_rate: 0,
                    blood_pressure: 0,
                    respiration: 0,
                    user_id: <?php echo $user_id; ?>
                }
            },
            methods: {
                getRandomInt(min, max) {
                    return Math.floor(Math.random() * (max - min + 1) + min)
                },

                async postVital() {
                    this.heart_rate = this.getRandomInt(80, 100);
                    this.blood_pressure = this.getRandomInt(80, 100);
                    this.respiration = this.getRandomInt(80, 100);

                    var newUrl = "process_patient_record.php?updateVital=" + this.user_id;
                    newUrl = newUrl + "&heart_rate=" + this.heart_rate;
                    newUrl = newUrl + "&blood_pressure=" + this.blood_pressure;
                    newUrl = newUrl + "&respiration=" + this.respiration;

                    var config = {
                        method: "GET",
                        url: newUrl,
                        headers: {
                            'Content-Type': 'application/json'
                        },
                    };

                    await axios(config)
                        .then((response) => {
                            console.log(response.data);
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                },

                //Loop Get Location
                async loopGetVitals() {
                    setInterval(() => {
                        this.postVital();
                    }, 10000);
                    console.log("this is a loop");
                },
            },
            async created() {
                console.log("vue here!");
            },
            async mounted() {
                this.postVital();
                this.loopGetVitals();
            },
        });
    </script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <?php
    $limit_ = 30;
    $getHeartRateDate =  mysqli_query($mysqli, "SELECT * FROM vitals WHERE patient_id = '$user_id' ORDER BY id DESC LIMIT $limit_ ");
    $getHeartRate =  mysqli_query($mysqli, "SELECT * FROM vitals WHERE patient_id = '$user_id' ORDER BY id DESC LIMIT $limit_ ");
    $getBloodPressureDate =  mysqli_query($mysqli, "SELECT * FROM vitals WHERE patient_id = '$user_id' ORDER BY id DESC LIMIT $limit_ ");
    $getBloodPressure =  mysqli_query($mysqli, "SELECT * FROM vitals WHERE patient_id = '$user_id' ORDER BY id DESC LIMIT $limit_ ");
    $getRespirationDate =  mysqli_query($mysqli, "SELECT * FROM vitals WHERE patient_id = '$user_id' ORDER BY id DESC LIMIT $limit_ ");
    $getRespiration =  mysqli_query($mysqli, "SELECT * FROM vitals WHERE patient_id = '$user_id' ORDER BY id DESC LIMIT $limit_ ");
    ?>
    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        function number_format(number, decimals, dec_point, thousands_sep) {
            // *     example: number_format(1234.56, 2, ',', ' ');
            // *     return: '1 234,56'
            number = (number + '').replace(',', '').replace(' ', '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

        // Heart Rate
        var ctx = document.getElementById("HeartRateChart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [<?php while ($date = mysqli_fetch_array($getHeartRateDate)) {
                                echo "\"" . $date['date_time'] . "\""; ?>, <?php } ?>],
                datasets: [{
                    label: "Heart Rate",
                    lineTension: 0.3,
                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                    borderColor: "#D50000",
                    pointRadius: 3,
                    pointBackgroundColor: "#D50000",
                    pointBorderColor: "#D50000",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointHoverBorderColor: "#D50000",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: [<?php while ($heartRate = mysqli_fetch_array($getHeartRate)) {
                                echo $heartRate['heart_rate']; ?>, <?php } ?>],
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return number_format(value);
                            }
                        },
                        gridLines: {
                            color: "#D50000",
                            zeroLineColor: "#D50000",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#D50000",
                    titleMarginBottom: 10,
                    titleFontColor: '#D50000',
                    titleFontSize: 14,
                    borderColor: '#D50000',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                        }
                    }
                }
            }
        });

        // Blood Pressure
        var bpx = document.getElementById("BloodPressureChart");
        var myLineChart = new Chart(bpx, {
            type: 'line',
            data: {
                labels: [<?php while ($date = mysqli_fetch_array($getBloodPressureDate)) {
                                echo "\"" . $date['date_time'] . "\""; ?>, <?php } ?>],
                datasets: [{
                    label: "Heart Rate",
                    lineTension: 0.3,
                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                    borderColor: "#00695C",
                    pointRadius: 3,
                    pointBackgroundColor: "#00695C",
                    pointBorderColor: "#00695C",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "#00695C",
                    pointHoverBorderColor: "#00695C",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: [<?php while ($heartRate = mysqli_fetch_array($getBloodPressure)) {
                                echo $heartRate['blood_pressure']; ?>, <?php } ?>],
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return number_format(value);
                            }
                        },
                        gridLines: {
                            color: "#00695C",
                            zeroLineColor: "#00695C",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#00695C",
                    titleMarginBottom: 10,
                    titleFontColor: '#00695C',
                    titleFontSize: 14,
                    borderColor: '#00695C',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                        }
                    }
                }
            }
        });

        // Respiration
        var rsp = document.getElementById("RespirationChart");
        var myLineChart = new Chart(rsp, {
            type: 'line',
            data: {
                labels: [<?php while ($date = mysqli_fetch_array($getRespirationDate)) {
                                echo "\"" . $date['date_time'] . "\""; ?>, <?php } ?>],
                datasets: [{
                    label: "Heart Rate",
                    lineTension: 0.3,
                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                    borderColor: "rgba(78, 115, 223, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointBorderColor: "rgba(78, 115, 223, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: [<?php while ($heartRate = mysqli_fetch_array($getRespiration)) {
                                echo $heartRate['respiration']; ?>, <?php } ?>],
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                        }
                    }
                }
            }
        });
    </script>
</body>

</html>