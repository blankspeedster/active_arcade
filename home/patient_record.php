<?php
require_once("process_users.php");

include("head.php");
//Get current URI
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$getURI = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$_SESSION['getURI'] = $getURI;

$user_id = 0;
if (isset($_GET['user'])) {
    $user_id = $_GET['user'];
    $getUser = mysqli_query($mysqli, "SELECT * FROM user WHERE id = '$user_id' ");
    $user = $getUser->fetch_array();

    $getDoctors = mysqli_query($mysqli, "SELECT * FROM user WHERE role = 'doctor' ");
} else {
    header("location: users.php");
}
?>

<title>Module Hub - Users</title>

<head>
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

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

                    <!-- Notification here -->
                    <?php
                    if (isset($_SESSION['message'])) { ?>
                        <div class="alert alert-<?php echo $_SESSION['msg_type']; ?> alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                            ?>
                        </div>
                    <?php } ?>
                    <!-- End Notification -->

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Users</h1>
                    <p class="mb-4"></p>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold">Add / Edit Users</h6>
                        </div>
                        <div class="card-body">
                            <form method="post" action="process_patient_record.php">
                                <div class="row">

                                    <!-- ID -->
                                    <div class="col-xl-4 col-md-6 mb-4">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                    Patient ID</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <input type="text" class="form-control" name="patient_id" value="<?php echo $user['id']; ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- First Name -->
                                    <div class="col-xl-4 col-md-6 mb-4">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                    First Name</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <input type="text" class="form-control" name="fname" value="<?php echo $user['firstname']; ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Last Name -->
                                    <div class="col-xl-4 col-md-6 mb-4">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                    Last Name</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <input type="text" class="form-control" name="lname" value="<?php echo $user['lastname']; ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Email Address -->
                                    <div class="col-xl-4 col-md-6 mb-4">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                    Email Address
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <input type="email" class="form-control" name="email" value="<?php echo $user['email']; ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Gender -->
                                    <div class="col-xl-4 col-md-6 mb-4">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                    Gender
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <input type="text" class="form-control" name="gender" value="<?php echo $user['gender']; ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Phone Number -->
                                    <div class="col-xl-4 col-md-6 mb-4">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                    Phone Number
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <input type="text" class="form-control" name="email" value="<?php echo $user['phone_number']; ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Diagnosis -->
                                    <div class="col-xl-4 col-md-6 mb-4">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                    Diagnosis
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <textarea class="form-control" rows="10" name="diagnosis"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Treatment -->
                                    <div class="col-xl-4 col-md-6 mb-4">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                    Treatment
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <textarea class="form-control" rows="10" name="treatment"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Doctor -->
                                    <div class="col-xl-4 col-md-6 mb-4">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                    Therapist's Name / Doctor
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <select name="therapist" class="form-control" required>
                                                        <?php while ($doctor = mysqli_fetch_array($getDoctors)) { ?>
                                                            <option value="<?php echo $doctor['id']; ?>" selected><?php echo $doctor['firstname'] . " " . $doctor['lastname']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Submit Form -->
                                    <div class="col-xl-12 col-md-6 mb-4">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <button type="submit" class="btn btn-primary float-right mr-1" name="save" id="save"><i class="far fa-save"></i> Add Patient Record</button>
                                                <a href="<?php echo $getURI; ?>" id="refresh" class='float-right btn btn-danger mr-1'><i class="fas as fa-sync"></i> Clear/Refresh</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Users Table -->

                    <!-- DataTales Example -->
                    <?php
                    $getRecord =  mysqli_query($mysqli, "SELECT * FROM patient_record WHERE patient_id = '$user_id' ");
                    ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold">Patient Records</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="10%">No.</th>
                                            <th width="15%">Date</th>
                                            <th>Diagnosis</th>
                                            <th>Treatment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($record = mysqli_fetch_array($getRecord)) { ?>
                                            <tr>
                                                <td><?php echo $record['id']; ?></td>
                                                <td><?php echo ucfirst($record['date_time']); ?></td>
                                                <td><?php echo ucfirst($record['diagnosis']); ?></td>
                                                <td><?php echo ucfirst($record['treatment_recomendation']); ?></td>
                                            </tr>
                                        <?php }  ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">

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

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include("footer.php"); ?>

            <!-- Start scripts here -->
            <script>
                let check = function() {
                    if (document.getElementById('password').value == document.getElementById('confirm_password').value) {
                        document.getElementById('password-message').style.color = 'green';
                        document.getElementById('password-message').innerHTML = 'Passwords matched';
                        document.getElementById("save").disabled = false;
                    } else {
                        document.getElementById('password-message').style.color = 'red';
                        document.getElementById('password-message').innerHTML = 'Passwords do not match!';
                        document.getElementById("save").disabled = true;
                    }
                }
            </script>
            <?php require("logOutModalAndScripts.php"); ?>
            <!-- End scripts here -->
            <!-- Page level plugins -->
            <script src="vendor/chart.js/Chart.min.js"></script>
            <?php
                $limit_ = 10;
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
                        labels: [<?php while($date = mysqli_fetch_array($getHeartRateDate)){echo "\"".$date['date_time']."\""; ?>, <?php } ?>],
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
                            data: [<?php while($heartRate = mysqli_fetch_array($getHeartRate)){echo $heartRate['heart_rate']; ?>, <?php } ?>],
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
                        labels: [<?php while($date = mysqli_fetch_array($getBloodPressureDate)){echo "\"".$date['date_time']."\""; ?>, <?php } ?>],
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
                            data: [<?php while($heartRate = mysqli_fetch_array($getBloodPressure)){echo $heartRate['blood_pressure']; ?>, <?php } ?>],
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
                        labels: [<?php while($date = mysqli_fetch_array($getRespirationDate)){echo "\"".$date['date_time']."\""; ?>, <?php } ?>],
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
                            data: [<?php while($heartRate = mysqli_fetch_array($getRespiration)){echo $heartRate['respiration']; ?>, <?php } ?>],
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