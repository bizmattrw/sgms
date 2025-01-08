<div class="modal fade" id="addnew" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Recording Expenses</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <script type="text/javascript" src="script.js"></script>

                <!-- Saving modal -->
                <form class="row g-3" action="save_otherincomes.php" method="POST" id="save_member">


                    <p>
                        <input type="button" value="Add New" onClick="addRow('dataTable')" />
                        <input type="button" value="Remove" onClick="deleteRow('dataTable')" />

                    </p>

                    <table id="dataTable" class="form" border="1">
                        <tbody>
                            <tr>

                                <td><input type="checkbox" required="required" name="chk[]" checked="checked" /></td>


                                <td>
                                    <label>Income</label>
                                    <input class="form-control" name="item[]" style="width:250px" required autocomplete="OFF">
                                    <datalist id="datalist1">


                                </td>
                                <td><label>Amount</label>
                                    <input type="number" name="quantity[]" required class="form-control" style="width: 15em;">

                                </td>

                            </tr>
                        </tbody>

                    </table>


                    <div class="col-md-12"> <label for="inputCity" class="form-label">Date</label>
                        <input type="date" id="pprice" name="date" required class="form-control">
                    </div>


                    <button type="submit" class="btn btn-primary" name="save">
                        <i class="fa fa-floppy-o" aria-hidden="true"></i> Save </button>
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
                <form class="form-horizontal" method="POST" action="delete_other_income.php">
                    <input type="hidden" id="edit_id1" name="id1">
                    <div class="text-center">
                        <p>Delete One Record</p>
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
                <h5 class="modal-title">Expenses Entry Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Saving modal -->
                <form action="edit_other_income.php" method="POST" id="save_member">

                    <input type="hidden" name="id" class="form-control" placeholder="Enter Fulname" autocomplete="off" id="edit_id">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="inputCity" class="form-label">Income</label>

                            <input class="form-control" name="item" id="edit_expense" autocomplete="off">

                        </div>

                        <div class="col-md-6">
                            <label for="inputState" class="form-label">Amount</label>
                            <input type="number" name="quantity" class="form-control" placeholder="Enter Quantity" autocomplete="off" id="edit_quantity">

                        </div>


                        <div class="col-12">
                            <label for="inputState" class="form-label">Entry Date</label>
                            <input type="date" name="date" class="form-control" placeholder="Enter Date" autocomplete="off" id="edit_date">
                        </div>

                    </div>

                    <div class="col-12">

                        <button type="submit" class="btn btn-primary" name="save">Update </button>
                    </div>
            </div>
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