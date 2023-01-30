<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sales History
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sales</li><li class="active">Sales by product</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <div class="pull-right">
                <form method="POST" class="form-inline" action="salesproduct_print.php" target="_blank">
                  <div class="input-group">
                    
                    </div>
                    From: <input type="date" class="form-control"  name="date1">
					To: <input type="date" class="form-control"  name="date2">
                 
                  <button type="submit" class="btn btn-success btn-sm btn-flat" name="print"><span class="glyphicon glyphicon-print"></span> Print</button>
                </form>
              </div>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>No</th>
                  <th>Date</th>
                  <th>Product</th>
                  <th>Quantity</th>
				  <th>Selling Price</th>
                  <th>Salling Amount</th>
                  <th>Purchase Price</th>
				  <th>Total Profit</th>
				  <th>Payment Mode</th>
                </thead>
                <tbody>
                  <?php
				  include("dbcon.php");
				  $address=$_SESSION['location'];
				  $statement = mysqli_query($con,"select * from tbl_order_item WHERE address='$address' order by order_item_id desc");
				  $i=0;
				  while($row=mysqli_fetch_array($statement))
                    {
					
					$i++;
                    $date=$row['order_date'];
					$name=$row['order_item_name'];
					$qty=$row['order_item_quantity'];
					$notax=$row['order_item_actual_amount'];
					$sprice=$row['order_item_price'];
					$total=$row['order_total_after_tax'];
					$pmode=$row['pmode'];
				  $statement1 = mysqli_query($con,"select price from products WHERE name='$name'");
				  $row1=mysqli_fetch_array($statement1);
				  $pprice=$row1['price'];
				  $pamount=$qty*$pprice;
				  $profit=$notax-$pamount;
					echo"<tr><td>$i</td><td>$date</td><td>$name</td><td>$qty</td><td>$sprice</td><td>$notax</td><td>$pprice</td><td>$profit</td><td>$pmode</td></tr>";
					
					}

                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
     
  </div>
  	<?php include 'includes/footer.php'; ?>
    <?php include '../includes/profile_modal.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<!-- Date Picker -->
<script>
$(function(){
  //Date picker
  $('#datepicker_add').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  })
  $('#datepicker_edit').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  })

  //Timepicker
  $('.timepicker').timepicker({
    showInputs: false
  })

  //Date range picker
  $('#reservation').daterangepicker()
  //Date range picker with time picker
  $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
  //Date range as a button
  $('#daterange-btn').daterangepicker(
    {
      ranges   : {
        'Today'       : [moment(), moment()],
        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate  : moment()
    },
    function (start, end) {
      $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    }
  )
  
});
</script>
<script>
$(function(){
  $(document).on('click', '.transact', function(e){
    e.preventDefault();
    $('#transaction').modal('show');
    var id = $(this).data('id');
    $.ajax({
      type: 'POST',
      url: 'transact.php',
      data: {id:id},
      dataType: 'json',
      success:function(response){
        $('#date').html(response.date);
        $('#transid').html(response.transaction);
        $('#detail').prepend(response.list);
        $('#total').html(response.total);
      }
    });
  });

  $("#transaction").on("hidden.bs.modal", function () {
      $('.prepend_items').remove();
  });
});
</script>
</body>
</html>
