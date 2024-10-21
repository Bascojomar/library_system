<!-- Modal -->
<?php
include '../backend/database.php';

?>

<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">ADD USER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <FORM method="post" action="../backend/adduser.php">
          <input type="text" class="form-control my-2" name="username" placeholder="Username" required>
          <input type="password" class="form-control my-2" name="password" placeholder="Password" required>
          <input type="text" class="form-control my-2" name="name" placeholder="Name" required>
          <input type="text" class="form-control my-2" name="email" placeholder="Email" required>
          <input type="text" class="form-control my-2" name="role" placeholder="Role" required>
          <select name="strand" class="form-control my-2">

            <option hidden>Strand</option>
            <option value="1">STEM</option>
            <option value="2">ABM</option>
            <option value="5">ICT</option>
            <option value="7">AUTOMOTIVE</option>
            <option value="8">GAS</option>
            <option value="9">HUMSS</option>

          </select>
          <input type="submit" class="btn btn-primary form-control my-2" name="save">

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- Additional modal footer buttons if needed -->
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addstrand" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">ADD STRAND</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <FORM method="post" action="../backend/adduser.php">
          <input type="text" class="form-control my-2" name="strand" placeholder="Strand" required>
          <input type="submit" class="btn btn-primary form-control my-2" name="addstrand">

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- Additional modal footer buttons if needed -->
      </div>
    </div>
  </div>
</div>