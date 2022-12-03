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
</body>

</html>