<div class="modal fade" id="addnew" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Register User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Saving modal -->
        <form class="row g-3" action="saveusers.php" method="POST" id="save_member">


          <div class="col-md-6"> <label for="inputCity" class="form-label">Names</label>

            <input type="text" name="names" class="form-control" placeholder="Enter Fulname" autocomplete="off" required>
          </div>
          <div class="col-md-6">
            <label for="inputState" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Enter Username" autocomplete="off" required>
          </div>
          <div class="col-md-6">
            <label for="inputState" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter Password" autocomplete="off" required>
          </div>
          <div class="col-md-6">
            <label for="inputState" class="form-label">Category</label>
            <select name="category" id="edit_category" class="form-control" required>
                <option value="Managing director">Managing Director</option>
                <option value="Accountant">Accountant</option>
                <option value="Human resource">Human Resource</option>
                <option value="CEO">CEO</option>
            </select>
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
        <form class="form-horizontal" method="POST" action="delete_user.php">
          <input type="hidden" id="edit_id1" name="id1">
          <div class="text-center">
            <p>DELETE user's Record</p>
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
        <h5 class="modal-title">Users Edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
        <form class="row g-3" action="edit_users.php" method="POST" id="save_member">

        <input type="hidden" name="id" class="form-control" placeholder="Enter Fulname" autocomplete="off" id="edit_id">
          <div class="col-md-6"> <label for="inputCity" class="form-label" >Names</label>

            <input type="text" name="names" class="form-control" placeholder="Enter Fulname" autocomplete="off" id="edit_names">
          </div>
          <div class="col-md-6">
            <label for="inputState" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Enter" autocomplete="off" id="edit_username">
          </div>
          <div class="col-md-6">
            <label for="inputState" class="form-label">Password</label>
            <input type="text" name="password" class="form-control" placeholder="" autocomplete="off" id="edit_password">
          </div>
          <div class="col-md-6">
            <label for="inputState" class="form-label">Category</label>
            <select name="category" id="edit_category" class="form-select" required>
                <option value="Managing director">Managing Director</option>
                <option value="Operator">Operator</option>
               
            </select>
          </div>
          <button type="submit" class="btn btn-primary" name="save">Save </button>
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


