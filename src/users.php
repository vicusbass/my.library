<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<body>
<?php include 'navbar.php'; ?>

<main role="main" class="container">
    <div class="starter-template">
        <div class="row">
            <button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#addUser"
                    aria-expanded="false" aria-controls="addUser">
                Add user
            </button>
        </div>
        <div class="row mt-1 collapse" id="addUser">
            <div class="col-6">
                <form method="post" role="form" id="addUserForm" name="addUser" action="useractions.php">
                    <div class="form-group row">
                        <label for="first_name" class="col-sm-2 col-form-label">First name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="first_name" name="first_name"
                                   placeholder="First name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="last_name" class="col-sm-2 col-form-label">Last name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="last_name" name="last_name"
                                   placeholder="Last name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" placeholder="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10  col-sm-offset-2">
                            <input type="submit" name="submit" value="Save" class="btn btn-success"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="tableContainer">
            <?php include 'userstable.php'; ?>
        </div>
    </div>
</main>
<script type='text/javascript'>
    /* attach a submit handler to the form */
    $("#addUserForm").submit(function (event) {

        /* stop form from submitting normally */
        event.preventDefault();

        /* get the action attribute from the <form action=""> element */
        var $form = $(this),
            url = $form.attr('action');
        /* Send the data using post with element id name and name2*/
        var posting = $.post(url, {
            first_name: $('#first_name').val(),
            last_name: $('#last_name').val(),
            email: $('#email').val(),
            submit: true
        });

        /* Alerts the results */
        posting.done(function (data) {
            var content = $(data).find('#usersTable');
            $("#tableContainer").empty().append(data);
            $('#addUserForm')[0].reset();
            toastr.success("New user added!");
        });
    });

    function deleteUser(id) {
        $.ajax({
            url: 'useractions.php',
            type: 'POST',
            data: {'submit': id}, // An object with the key 'submit' and value 'true;
            success: function (result) {
                $("#tableContainer").html(result);
                toastr.success("User removed");
            }
        });
    }
</script>

</body>
</html>