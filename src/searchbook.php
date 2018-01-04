<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<?php include_once 'Db.php'; ?>
<body>
<?php include 'navbar.php'; ?>

<main role="main" class="container">
    <div class="starter-template">
        <div class="row mt-1" id="searchBookForm">
            <div class="col-6">
                <form>
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" placeholder="Title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="authors" class="col-sm-2 col-form-label">Authors</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="authors" placeholder="Authors">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="isbn" placeholder="ISBN">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>
    </div>
</main>

</body>
</html>