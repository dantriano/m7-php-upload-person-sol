<?php include_once('_header.php') ?>
<div class="card">
    <div class="card-body">
        <form action="view.php" method="post" enctype="multipart/form-data">
            <h2>Upload Person</h2>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control">
            <label for="surname">Surname:</label>
            <input type="text" name="surname" id="surname" class="form-control">
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" class="form-control">
            <label for="comments">Comments:</label>
            <input type="text" name="comments" id="comments" class="form-control">
            <label for="picture">Picture:</label>
            <input type="file" name="picture" id="picture" class="form-control">
            <div class="col-auto mt-3">
            <input type="submit" class="btn btn-primary" value="Upload">
            </div>
        </form>
    </div>
</div>
<?php include_once('_footer.php') ?>