<div class="modal fade" id="addnew" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Payments Entry</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <script type="text/javascript" src="script.js"></script> 

        <!-- Saving modal -->
        <form class="row g-3" action="savepayments.php" method="POST" id="save_member">

			  	
                  <p> 
                      <input type="button" value="Add Member" onClick="addRow('dataTable')" /> 
                      <input type="button" value="Remove" onClick="deleteRow('dataTable')"  /> 
                          
                  </p>
  
                 <table id="dataTable" class="form" border="1">
                    <tbody>
                      <tr>
                       
                          <td><input type="checkbox" required="required" name="chk[]" checked="checked" /></td>
                          
  
                          <td>
                              <label>Select Names</label>
                              <select name="names[]" class="form-select">
                                                           <?php
  
  include("dbcon.php");
 
             $query2=mysqli_query($con,"select * from members order by names asc"); 
             echo"<option>";
             while($row=mysqli_fetch_array($query2))
             {
                 $f=$row['names'];
                 $number=$row['id'];
                 echo"<option value='$number'>$f</option>";
                // $y1=$row['regyear'];
             }
  
  ?>
  
  </select>
  </td>
  <td><label>Amount</label>
                              <input type="text" name="amount[]"  required class="form-control" style="width:15em;font-weight:bold;color:blue">
  
                           </td>
    </tr>
                        </tbody>
  
  </table>
                  <p>
                                  
                    <div class="col-sm-4">
                    <b>Date</b>
                      <input type="date" id="date1" name="date" required class="form-control" >   
                      
          </div>
          <button type="submit" class="btn btn-primary" name="save">Save </button>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>
</div>

</div>

<!-- End Saving member modal -->

<!-- Delete -->
<div class="modal fade" id="delete" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>Deleting...</b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="delete_payments.php">
          <input type="hidden" id="edit_id1" name="id1">
          <div class="text-center">
            <p>DELETE Member Record</p>
            <h2 class="bold name"></h2>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Patments Edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Saving modal -->
        <form class="row g-3" action="edit_payments.php" method="POST" id="save_member">

        <input type="hidden" name="id" class="form-control" placeholder="Enter Fulname" autocomplete="off" id="edit_id">
          <div class="col-md-6"> <label for="inputCity" class="form-label" >Names</label>

            <input type="text" name="names" class="form-control" placeholder="Enter Fulname" autocomplete="off" id="edit_names">
          </div>
          <div class="col-md-6">
            <label for="inputState" class="form-label">IdNo</label>
            <input type="text" name="idcard" class="form-control" placeholder="Enter IdNo" autocomplete="off" id="edit_idno">
          </div>
          <div class="col-md-6">
            <label for="inputState" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" autocomplete="off" id="edit_tel">
          </div>
          <div class="col-md-6">
            <label for="inputState" class="form-label">Amount</label>
            <input type="text" name="amount" class="form-control" placeholder="Enter Phone Number" autocomplete="off" id="edit_amount">
          </div>
          <button type="submit" class="btn btn-primary" name="save">Update </button>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
      </div>


    </div>

    <!-- End Saving member modal -->

  </div>
</div>


</form>


