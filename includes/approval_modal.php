<div class="modal fade" id="addnew" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Raw Material Exit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <script type="text/javascript" src="script.js"></script>

                <!-- Saving modal -->
                <form class="row g-3" action="saverawexit.php" method="POST" id="save_member">


                    <p>
                        <input type="button" value="Add New" onClick="addRow('dataTable')" />
                        <input type="button" value="Remove" onClick="deleteRow('dataTable')" />

                    </p>

                    <table id="dataTable" class="form" border="1">
                        <tbody>
                        <tr>
                     
                     <td><input type="checkbox" required="required" name="chk[]" checked="checked"/></td>
                     

                     <td>
                         <label>Select&nbsp;Item</label>
                         <select id="name-1" name="item[]" class="form-select"
                          required onchange='getData(this)'>
                                                      <?php

include("./dbcon.php");

        $query2=mysqli_query($con,"select * from rawmaterialstock order by rawmaterial asc")or die(mysqli_error($con));
       
       
       
        echo"<option>";
        while($row=mysqli_fetch_array($query2))
        {
            $f=$row['rawmaterial'];
            $number=$row['id'];
            echo"<option value='$f'>$f</option>";
           // $y1=$row['regyear'];
        }

?>
</select></td>
          <td> <label>In Stock</label>
             <input type="text" class=" form-control in-stock" name="stock[]" required readonly>
            </td>
           <td><label>Qty</label>
             <input type="text" class="form-control qty" name="qty[]" required oninput="setTotalPrice(this)" autocomplete="off"></td>
          
</tr>
                              
                            </tr>
                        </tbody>

                    </table>


                    <div class="col-md-12"> <label for="inputCity" class="form-label">Date</label>
                                    <input type="date" id="" name="date" required class="form-control">
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
                <h4 class="modal-title"><b>Approving Raw Material Exit...</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="approval_rawexit.php">
                    <input type="hidden" id="edit_id1" name="id1">
                   
                    <div class="text-center">
                        <p>You are about to approve Record!!! Are you Sure to perform this action???</p>
                        <h2 class="bold name"></h2>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success btn-flat" name="delete"><i class="fa fa-trash"></i> Approve</button>
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
                <h5 class="modal-title">Packages Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Saving modal -->
                <form class="row g-3" action="edit_package.php" method="POST" id="save_member">

                    <input type="hidden" name="id" class="form-control" placeholder="Enter Fulname" autocomplete="off" id="edit_id">
                    <div class="col-md-6"> <label for="inputCity" class="form-label">Item</label>
                    <input type="text" class="form-control" name="item" list='datalist1' style="width:150px" id="edit_finalproduct">
                                    <datalist id='datalist1' class="form-select" style="width:15em;font-weight:bold;color:blue" required>
                                        <?php

                                        echo"<datalist id='datalist1' style='border:0px solid red;font-size:16pt'>";
                                        $query2 = mysqli_query($con, "select * from rawmaterials order by rawItem asc");
                                       
                                        
                                        while ($row = mysqli_fetch_array($query2)) {
                                            $f = $row['rawItem'];
                                            $number = $row['id'];
                                            echo "<option value='$f'></option>";
                                            // $y1=$row['regyear'];
                                        }

                                        ?>
                                    </datalist>
                    </div>
                    <div class="col-md-6">
                    <label for="inputState" class="form-label">Quantity</label>
                        <input type="number" name="quantity" class="form-control" placeholder="Enter Quantity" autocomplete="off" id="edit_quantity">
                    </div>
                    <div class="col-md-6">
                        <label for="inputState" class="form-label">Entry Date</label>
                        <input type="date" name="date" class="form-control" placeholder="Enter Date" autocomplete="off" id="edit_date">
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