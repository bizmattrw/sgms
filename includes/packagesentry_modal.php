<div class="modal fade" id="addnew" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Packages Entry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <script type="text/javascript" src="script.js"></script>

                <!-- Saving modal -->
                <form class="row g-3" action="savepackagesentry.php" method="POST" id="save_member">


                    <p>
                        <input type="button" value="Add New" onClick="addRow('dataTable')" />
                        <input type="button" value="Remove" onClick="deleteRow('dataTable')" />

                    </p>

                    <table id="dataTable" class="form" border="1">
                        <tbody>
                            <tr>

                                <td><input type="checkbox" required="required" name="chk[]" checked="checked" /></td>


                                <td>
                                    <label>Final Product</label>
                                    <select  class="form-control" name="item[]"   style="width:250px" required>
                                    <option value=""></option>
                                    
                                        <?php

                                        include("dbcon.php");
                                        
                                        $query2 = mysqli_query($con, "select * from packages order by package asc");
                                       
                                        
                                        while ($row = mysqli_fetch_array($query2)) {
                                            $f = $row['package'];
                                            $number = $row['id'];
                                            echo "<option value='$f'>$f</option>";
                                            // $y1=$row['regyear'];
                                        }

                                        ?>
                                   
                                  
                                </td>
                                <td><label>Quantity</label>
                                    <input type="number" name="quantity[]" required class="form-control" style="width: 15em;">

                                </td>
                               
                              
                            </tr>
                        </tbody>

                    </table>


                    <div class="col-md-12"> <label for="inputCity" class="form-label">Date</label>
                                    <input type="date" id="pprice" name="date" required class="form-control">
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
                <form class="form-horizontal" method="POST" action="delete_packagesentry.php">
                    <input type="hidden" id="edit_id1" name="id1">
                    <div class="text-center">
                        <p>DELETE Raw Material from Stock Record</p>
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
                <h5 class="modal-title">Raw Material Entry Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Saving modal -->
                <form class="row g-3" action="edit_packagesentry.php" method="POST" id="save_member">

                    <input type="hidden" name="id" class="form-control" placeholder="Enter Fulname" autocomplete="off" id="edit_id">
                    <div class="col-md-6"> <label for="inputCity" class="form-label">Item</label>
                    <SELECT class="form-control" name="item"  style="width:150px" id="edit_rawmaterial">
                                    
                                        <?php

                                        
                                        $query2 = mysqli_query($con, "select * from packages order by package asc");
                                       
                                        
                                        while ($row = mysqli_fetch_array($query2)) {
                                            $f = $row['package'];
                                            $number = $row['id'];
                                            echo "<option value='$f'>$f</option>";
                                            // $y1=$row['regyear'];
                                        }

                                        ?>
                    </SELECT>
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