<!-- Modal -->
<?php
include '../backend/database.php';

?>

<div class="modal fade" id="stem<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Change</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <FORM method="POST" action="../backend/edit.php">
          <input type="hidden" name="id" value="<?= $id ?>">
          <input type="text" class="form-control my-2" value="<?= $title ?>" name="title" placeholder="Title">
          <input type="text" class="form-control my-2" value="<?= $author ?>" name="author" placeholder="Author">
          <input type="text" class="form-control my-2" value="<?= $publisher ?>" name="publisher" placeholder="Publisher">
          <input type="text" class="form-control my-2" value="<?= $category ?>" name="category" placeholder="Category">
          <input type="submit" class="btn btn-primary form-control my-2" name="stem">

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- Additional modal footer buttons if needed -->
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ict<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Change</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <FORM method="POST" action="../backend/edit.php">
          <input type="hidden" name="id" value="<?= $id ?>">
          <input type="text" class="form-control my-2" value="<?= $title ?>" name="title" placeholder="Title">
          <input type="text" class="form-control my-2" value="<?= $author ?>" name="author" placeholder="Author">
          <input type="text" class="form-control my-2" value="<?= $publisher ?>" name="publisher" placeholder="Publisher">
          <input type="text" class="form-control my-2" value="<?= $category ?>" name="category" placeholder="Category">
          <input type="submit" class="btn btn-primary form-control my-2" name="ict">

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- Additional modal footer buttons if needed -->
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="automotive<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Change</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <FORM method="POST" action="../backend/edit.php">
          <input type="hidden" name="id" value="<?= $id ?>">
          <input type="text" class="form-control my-2" value="<?= $title ?>" name="title" placeholder="Title">
          <input type="text" class="form-control my-2" value="<?= $author ?>" name="author" placeholder="Author">
          <input type="text" class="form-control my-2" value="<?= $publisher ?>" name="publisher" placeholder="Publisher">
          <input type="text" class="form-control my-2" value="<?= $category ?>" name="category" placeholder="Category">
          <input type="submit" class="btn btn-primary form-control my-2" name="automotive">

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- Additional modal footer buttons if needed -->
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="abm<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Change</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <FORM method="POST" action="../backend/edit.php">
          <input type="hidden" name="id" value="<?= $id ?>">
          <input type="text" class="form-control my-2" value="<?= $title ?>" name="title" placeholder="Title">
          <input type="text" class="form-control my-2" value="<?= $author ?>" name="author" placeholder="Author">
          <input type="text" class="form-control my-2" value="<?= $publisher ?>" name="publisher" placeholder="Publisher">
          <input type="text" class="form-control my-2" value="<?= $category ?>" name="category" placeholder="Category">
          <input type="submit" class="btn btn-primary form-control my-2" name="abm">

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- Additional modal footer buttons if needed -->
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="humss<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Change</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <FORM method="POST" action="../backend/edit.php">
          <input type="hidden" name="id" value="<?= $id ?>">
          <input type="text" class="form-control my-2" value="<?= $title ?>" name="title" placeholder="Title">
          <input type="text" class="form-control my-2" value="<?= $author ?>" name="author" placeholder="Author">
          <input type="text" class="form-control my-2" value="<?= $publisher ?>" name="publisher" placeholder="Publisher">
          <input type="text" class="form-control my-2" value="<?= $category ?>" name="category" placeholder="Category">
          <input type="submit" class="btn btn-primary form-control my-2" name="humss">

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- Additional modal footer buttons if needed -->
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="gas<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Change</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <FORM method="POST" action="../backend/edit.php">
          <input type="hidden" name="id" value="<?= $id ?>">
          <input type="text" class="form-control my-2" value="<?= $title ?>" name="title" placeholder="Title">
          <input type="text" class="form-control my-2" value="<?= $author ?>" name="author" placeholder="Author">
          <input type="text" class="form-control my-2" value="<?= $publisher ?>" name="publisher" placeholder="Publisher">
          <input type="text" class="form-control my-2" value="<?= $category ?>" name="category" placeholder="Category">
          <input type="submit" class="btn btn-primary form-control my-2" name="gas">

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- Additional modal footer buttons if needed -->
      </div>
    </div>
  </div>
</div>

<<!-- Modal -->
  <div class="modal fade" id="modalId" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Update</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="../backend/addbooks.php">
            <input type="hidden" name="book_id" id="book_id">
            <select name="action" class="form-control" id="update">
              <option hidden>Book Status</option>
              <option value="Available">Available</option>
              <option value="Borrowed">Borrowed</option>
              <option value="Returned">Returned</option>
            </select>
            <input type="submit" class="btn btn-primary form-control my-2" value="Update" name="update">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- JavaScript to handle modal and populate data -->
  <script>
    $('#modalId').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget); // Button that triggered the modal
      var bookId = button.data('id');

      // Update the modal's content
      $('#book_id').val(bookId);
    });
  </script>