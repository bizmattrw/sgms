<?php
include("includes/session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Manager - Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <?php include("top.php"); ?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php include("sidebar.php"); ?>
    <!-- End Sidebar-->

    <main id="main" class="main">

        <!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-13">
                    <div class="row">

                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">ENTRIES <span>| </span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-yelp"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?php
                                                include('dbcon.php');
                                                $selQuery = mysqli_query($con, "SELECT count(rawmaterial) as amount from rawmaterialentry");
                                                $row = mysqli_fetch_array($selQuery);
                                                $amount = $row['amount'];
                                                echo "$amount ";
                                                ?></h6>
                                            <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-backpack2"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">EXITS <span>| </span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-yin-yang"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?php
                                                $selQuery = mysqli_query($con, "SELECT count(rawmaterial) as amount from rawmaterialexit");
                                                $row = mysqli_fetch_array($selQuery);
                                                $amount = $row['amount'];
                                                echo "$amount ";
                                                ?>
                                            </h6>
                                            <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- End Revenue Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-4 col-xl-6">

                            <div class="card info-card customers-card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>


                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Users <span>| </span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6> <?php
                                                    $selQuery = mysqli_query($con, "SELECT count(*) as amount from users");
                                                    $row = mysqli_fetch_array($selQuery);
                                                    $amount = $row['amount'];
                                                    echo "$amount";
                                                    ?></h6>


                                        </div>
                                    </div>

                                </div>

                            
                            </div>

                        </div>
                        
                        <!-- End Customers Card -->
 <!-- EXPENSES CARD -->
 <div class="col-xxl-4 col-xl-6">

<div class="card info-card customers-card">

    <div class="filter">
        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <li class="dropdown-header text-start">
                <h6>Filter</h6>
            </li>


        </ul>
    </div>

    <div class="card-body">
        <h5 class="card-title">DEFECTS <span>| </span></h5>

        <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-money"></i>
            </div>
            <div class="ps-3">
                <h6> <?php
                        $selQuery = mysqli_query($con, "SELECT count(*) as amount from defects");
                        $row = mysqli_fetch_array($selQuery);
                        $amount = $row['amount'];
                        echo "$amount";
                        ?></h6>


            </div>
        </div>

    </div>


</div>

</div>
                        <!-- END EXPENSES CARD -->

                        <!-- End Reports -->

                        <!-- Recent Sales -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                    </ul>
                                </div>

                                <!-- <div class="card-body">
                                    <h5 class="card-title">Savings <span>| Today</span></h5>

                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>

                                                <th scope="col">Names</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Tin</th>
                                                <th scope="col">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            ## Fetch records
                                            /*
                                            $empQuery = "select s.pin,s.date,s.id,m.names,m.tin,m.phone,sum(s.saving) as amount from members m,saving s WHERE m.id=s.pin group by pin";
                                            $empRecords = mysqli_query($con, $empQuery) or die(mysqli_error($con));
                                            $i = $total = 0;
                                            while ($row = mysqli_fetch_array($empRecords)) {
                                                $i++;
                                                $idno = $row['tin'];
                                                $names = $row['names'];
                                                $phone = $row['phone'];
                                                $amount = $row['amount'];
                                                $pin = $row['pin'];
                                                $total += $amount;
                                                echo "<tr><td>$i</td><td><a href='saving_details.php?pin=$pin' target='_blank'>$names</a></td><td>$phone</td>
                                                <td>$idno</td>
                                                <td>$amount</td></tr>";
                                            }
                                                */
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="4">Total</th>
                                                <th><?php //echo "$total"; ?></th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>

                            </div>
                        </div> -->
                        <!-- End Recent Sales -->

                        <!-- Top Selling -->
                        <!-- <div class="col-12">
                            <div class="card recent-sales overflow-auto">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Credits <span>| Today</span></h5>

                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>

                                                <th scope="col">Names</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Tin</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Interest</th>
                                                <th scope="col">Tot to Pay</th>
                                                <th scope="col">Amount Paid</th>
                                                <th scope="col">Amount Left</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            ## Fetch records
                                            /*
                                            $empQuery = "select s.pin,s.date,s.id,m.names,m.tin,m.phone,sum(s.amount) as amount,sum(s.interest) as interest,sum(s.total) as total from members m,credits s WHERE m.id=s.pin group by pin";
                                            $empRecords = mysqli_query($con, $empQuery) or die(mysqli_error($con));
                                            $i = $total = 0;
                                            while ($row = mysqli_fetch_array($empRecords)) {
                                                $i++;
                                                $idno = $row['tin'];
                                                $names = $row['names'];
                                                $phone = $row['phone'];
                                                $amount = $row['amount'];
                                                $pin = $row['pin'];
                                                $interest = $row['interest'];
                                                $total = $row['total'];
                                                $total += $amount;
                                                $empQuery1 = "select sum(amount) as ampay from payments WHERE pin='$pin' group by pin";
                                                $empRecords1 = mysqli_query($con, $empQuery1) or die(mysqli_error($con));
                                                $row1 = mysqli_fetch_array($empRecords1);
                                                $pam = $row1['ampay'];
                                                $amLeft = $total - $pam;
                                                echo "<tr><td>$i</td><td><a href='credit_details.php?pin=$pin' target='_blank'>$names</a></td><td>$phone</td>
                                                <td>$idno</td>
                                                <td>$amount</td>
                                                <td>$interest</td>
                                                <td>$total</td>
                                                <td>$pam</td><td>$amLeft</td></tr>";
                                            }
                                            */
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="4">Total</th>
                                                <th><?php // echo "$total"; ?></th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>

                            </div>
                        </div> -->
                        <!-- End Top Selling -->

                    </div>
                </div>
                <!-- End Left side columns -->

                <!-- Right side columns -->
                <div class="col-lg-4">

                    <!-- Recent Activity -->
                    <div class="card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>

                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>

                        <!-- End activity item-->

                        <!-- End activity item-->

                    </div>

                </div>
            </div>
            <!-- End Recent Activity -->


            <!-- End Budget Report -->



            </div>
            <!-- End Right side columns -->

            </div>
        </section>

    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include('footer.php'); ?>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.min.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>