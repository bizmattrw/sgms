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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</head>

<script>
    $(document).ready(function() {
        $('#dona_class_reass').change(function() {
            var value = $(this).val();
            $('#dona_course_reass').show();
            $.post('autoload_courses_quick2.php', {
                value: value
            }, function(data) {
                $('#dona_course_reass').html(data);
            });
        });
    });
</script>

<body>

    <!-- ======= Header ======= -->
    <?php include('top.php'); ?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php include('sidebar.php'); ?>
    <?php include('functions.php'); ?>
    <!-- End Sidebar -->


    <main id="main" class="main">

        <!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <?php
                        if (isset($_SESSION['error'])) {
                            echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              " . $_SESSION['error'] . "
            </div>
          ";
                            unset($_SESSION['error']);
                        }
                        ?>
                        <?php
                        if (isset($_SESSION['message'])) {
                            echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Success!</h4>
              " . $_SESSION['message'] . "
            </div>
          ";
                            unset($_SESSION['message']);
                        }
                        ?>
                        <div class="card-body">
                            <h5 class="card-title">Packages Entry</h5>
                            <!-- Basic Modal -->
                            <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat" id="addproduct"><i class="fa fa-plus"></i> Add New</a>

                            </button>
                            <?php
                            include('includes/packagesentry_modal.php');
                            ?>
                            <table id="customer_data" class="table table-bordered table-striped">
                                <thead>
                                    <th>No #</th>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Date Added</th>
                                    <th></th>
                                    <th></th>
                                </thead>

                            </table>

                            <?php //include 'includes/scripts.php'; 
                            ?>
                            <script>
                                $(document).ready(function() {
                                    $('#customer_data').DataTable({
                                        'processing': true,
                                        'serverSide': true,
                                        'destroy': true,
                                        'serverMethod': 'post',
                                        'ajax': {
                                            'url': 'packagesentryajax.php'
                                        },
                                        'columns': [{
                                                data: 'id'
                                            },
                                            {
                                                data: 'package'
                                            },
                                            {
                                                data: 'quantity'
                                            },
                                            {
                                                data: 'date'
                                            },
                                            {
                                                data: 'button1'
                                            },
                                            {
                                                data: 'button2'
                                            },
                                        ],
                                        dom: 'lBfrtip',
                                        buttons: [
                                            'excel', 'csv', 'pdf', 'copy'
                                        ],
                                        "lengthMenu": [
                                            [5,10, 25, 50, 100, -1],
                                            [5,10, 25, 50, 100, 'all']
                                        ]

                                    });

                                });
                                $(function(){
                                $(document).on('click', '.edit', function(e) {
                                    e.preventDefault();
                                    $('#edit').modal('show');
                                    var id = $(this).data('id');
                                    getRow(id);
                                });

                                $(document).on('click', '.delete', function(e) {
                                    e.preventDefault();
                                    $('#delete').modal('show');
                                    var id = $(this).data('id');
                                    getRow(id);
                                });

                                $("#addnew").on("hidden.bs.modal", function() {
                                    $('.append_items').remove();
                                });

                                $("#edit").on("hidden.bs.modal", function() {
                                    $('.append_items').remove();
                                });
                            });

                                function getRow(id) {
                                    $.ajax({
                                        type: 'POST',
                                        url: 'packagesentry_row.php',
                                        data: {
                                            id: id
                                        },
                                        dataType: 'json',
                                        success: function(response) {
                                            $('#edit_id1').val(response.id);
                                            $('#edit_id').val(response.id);
                                          
                                            $('#edit_rawmaterial').val(response.package);
                                            $('#edit_quantity').val(response.quantity);
                                           
                                            $('#edit_date').val(response.date);
                                           
                                         
                                        }
                                    });
                                }
                            </script>
                        </div>
                    </div>
                </div><!-- End Basic Modal-->


            </div>
            </div>


            </div>
        </section>

    </main>
    <?php
    if (isset($_POST['save'])) {

        $names = $_POST['names'];
        $idcard = $_POST['idcard'];
        $query = "SELECT * FROM `users` WHERE username = '$username'";
    }
    ?>


    <!-- End #main -->

    <!-- Footer -->
    <?php include("footer.php"); ?>
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