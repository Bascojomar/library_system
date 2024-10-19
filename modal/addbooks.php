<!-- Modal -->
<?php
include '../backend/database.php';

?>

<div class="modal fade" id="book" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">ADD BOOKS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                <FORM method="post" action="../backend/addbooks.php">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="text" class="form-control my-2" name="title" placeholder="Title">
                <input type="text" class="form-control my-2" name="author" placeholder="Author">
                <input type="text" class="form-control my-2" name="publisher" placeholder="Publisher">
                <input type="text" class="form-control my-2" name="category" placeholder="Category">
                <input type="text" class="form-control my-2" name="strand" placeholder="Strand">
                <input type="submit" class="btn btn-primary form-control my-2" name="save">

            </form></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- Additional modal footer buttons if needed -->
      </div>
    </div>
  </div>
</div>