<div class="modal fade" id="addnew" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Products Exit</h5>
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
                    <table id="dataTable" class="form table table-bordered">
                        <tbody>
                            <tr>

                                <td><input type="checkbox" required="required" name="chk[]" checked="checked" /></td>


                                <td>
                                    <label>Select&nbsp;Item</label>
                                    <select id="name-1" name="item[]" class="form-select form form-select-lg"
                                        required onchange='getData(this)'>
                                        <?php

                                        include("./dbcon.php");

                                        $query2 = mysqli_query($con, "select * from rawmaterialstock where qty>0 order by rawmaterial asc") or die(mysqli_error($con));



                                        echo "<option>";
                                        while ($row = mysqli_fetch_array($query2)) {
                                            $f = $row['rawmaterial'];
                                            $number = $row['id'];
                                            echo "<option value='$f'>$f</option>";
                                            // $y1=$row['regyear'];
                                        }

                                        ?>
                                    </select>
                                </td>
                                <td> <label>In Stock</label>
                                    <input type="text" class=" form-control in-stock" name="stock[]" required readonly style="width:8em">
                                </td>
                                <td><label>Quantity</label>
                                    <input type="text" class="form-control qty" name="qty[]" required oninput="setTotalPrice(this)" autocomplete="off" style="width:8em">
                                </td>

                                <td><label>Unit Price</label>
                                    <input type="number" name="sprice[]" required class="form-control" style="width: 8em;">
                                </td>

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
                <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="delete_rawexit.php">
                    <input type="hidden" id="edit_id1" name="id1">
                    <div class="text-center">
                        <p>DELETE EXIT RECORD</p>
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

<!-- Edit Modal -->
<div class="modal fade" id="edit" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Products Exit Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form class="row g-3" action="edit_rawexit.php" method="POST" id="save_member">

                    <input type="hidden" name="id" class="form-control" placeholder="Enter Fulname" autocomplete="off" id="edit_id">
                    <div class="col-md-4">
                        <label for="inputCity" class="form-label">Item</label>
                        <input type="text" class="form-control" name="item" style="width:150px" id="edit_rawmaterial" list="datalist2">
                        <datalist id="datalist2">
                            <option value=""></option>
                            <?php


                            $query2 = mysqli_query($con, "select * from rawmaterials order by rawItem asc");

                            while ($row = mysqli_fetch_array($query2)) {
                                $f = $row['rawItem'];
                                $number = $row['id'];
                                echo "<option value='$f'>$f</option>";
                                // $y1=$row['regyear'];
                            }

                            ?>
                        </datalist>
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Quantity</label>
                        <input type="number" name="quantity" class="form-control" placeholder="Enter Quantity" autocomplete="off" id="edit_quantity">
                        <input type="hidden" name="prevqty" class="form-control" placeholder="Enter Quantity" autocomplete="off" id="edit_prevqty">
                        <input type="hidden" name="previtem" class="form-control" placeholder="Enter Quantity" autocomplete="off" id="edit_previtem" style="width:8em">
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Unit Price</label>

                        <input type="number" name="sprice" class="form-control" placeholder="Unit Price" autocomplete="off" id="edit_sprice" style="width:8em">
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