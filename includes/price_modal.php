<div class="modal fade" id="addnew" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Setting Prices</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <script type="text/javascript" src="script.js"></script>

                <!-- Saving modal -->
                <form class="row g-3" action="saveprices.php" method="POST" id="save_member">


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
                         <select id="name-1" name="item[]" class="form-select form-select-lg mb-5"
                          required>
                                                      <?php

include("./dbcon.php");

        $query2=mysqli_query($con,"select * from rawmaterials order by rawItem asc")or die(mysqli_error($con));
       
       
       
        echo"<option>";
        while($row=mysqli_fetch_array($query2))
        {
            $f=$row['rawItem'];
            $number=$row['id'];
            echo"<option value='$f'>$f</option>";
           // $y1=$row['regyear'];
        }

?>
</select></td>
          <td> <label>Purchasing Price</label>
             <input type="text" class=" form-control -lg mb-5" name="pprice[]" required>
            </td>
           <td><label>Selling Price</label>
             <input type="text" class="form-control form-control-lg mb-5" name="sprice[]" required  autocomplete="off"></td>
          
</tr>
                              
                           
                        </tbody>

                    </table>



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
                <form class="form-horizontal" method="POST" action="delete_price.php">
                    <input type="hidden" id="edit_id1" name="id1">
                    <div class="text-center">
                        <p>DELETE PRICES</p>
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
                <h5 class="modal-title">Prices Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Saving modal -->
                <form class="row g-3" action="edit_prices.php" method="POST" id="save_member">

                    <input type="hidden" name="id" class="form-control" placeholder="Enter Fulname" autocomplete="off" id="edit_id">
                    <div class="col-md-6"> <label for="inputCity" class="form-label">Item</label>
                    <input type="text" class="form-control" name="item" list='datalist1' style="width:150px" id="edit_item">
                                    <datalist id='datalist1'>
                                        <?php

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
                    <label for="inputState" class="form-label">Purchasing Price</label>
                        <input type="number" name="pprice" class="form-control" placeholder="Enter Quantity" autocomplete="off" id="edit_pprice">
                    </div>
                    <div class="col-md-6">
                    <label for="inputState" class="form-label">Purchasing Price</label>
                        <input type="number" name="sprice" class="form-control" placeholder="Enter Quantity" autocomplete="off" id="edit_sprice">
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