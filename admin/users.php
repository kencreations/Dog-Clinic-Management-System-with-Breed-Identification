<!DOCTYPE html>
<html lang="en">

<?php 
session_start();
include "./../components/header.php";
?>

<body>

    <div class="wrapper">
        <?php include "./../components/admin_sidenav.php" ?>
        <div class="main-panel">
            <?php include "./../components/topnav.php" ?>
            <div class="container">
                <div class="page-inner">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                        <div>
                            <h3 class="fw-bold mb-3">Users</h3>
                        </div>
                        <div class="ms-md-auto py-2 py-md-0">
                            <button type="button" class="btn btn-primary btn-round" data-bs-toggle="modal"
                                data-bs-target="#AddUserForm">
                                Add User
                            </button>
                        </div>
                    </div>
                    <div class="modal fade" id="AddUserForm" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="AddUserFormLabel" aria-hidden="true">
                        <div class=" modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <form id="AddUserForm">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="first_name">First Name</label>
                                                    <input type="text" class="form-control" id="first_name"
                                                        placeholder="" name="first_name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="last_name">Last Name</label>
                                                    <input type="text" class="form-control" id="last_name"
                                                        placeholder="" name="last_name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" name="email" id="email" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <input type="text" name="username" id="username"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" name="password" id="password"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="EditUserModal" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="EditUserFormLabel" aria-hidden="true">
                        <div class=" modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <form id="EditUserForm">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="first_name">First Name</label>
                                                    <input type="text" class="form-control" id="edit_first_name"
                                                        placeholder="" name="first_name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="last_name">Last Name</label>
                                                    <input type="text" class="form-control" id="edit_last_name"
                                                        placeholder="" name="last_name" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" name="email" id="edit_email"
                                                        class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <input type="text" name="username" id="edit_username"
                                                        class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" name="password" id="edit_password"
                                                        class="form-control">
                                                    <input type="hidden" name="user_id" id="edit_user_id">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="DeleteUserModal" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="DeleteUserFormLabel" aria-hidden="true">
                        <div class=" modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <form id="DeleteUserForm">
                                        <h2>
                                            Are you sure you want to delete this user?
                                            <input type="hidden" name="user_id" id="delete_user_id">
                                            <input type="text" name="username" id="delete_username" readonly>
                                        </h2>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Yes</button>
                                </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID No.</th>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Last Login</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID No.</th>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Last Login</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

                                        </tbody>


                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>
    </div>

    <?php include "./../components/scripts.php" ?>
    <script>
    $(document).ready(function() {
        const editModal = document.getElementById('EditUserModal');
        editModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const firstName = button.getAttribute('data-fname');
            const lastName = button.getAttribute('data-lname');
            const email = button.getAttribute('data-email');
            const username = button.getAttribute('data-username');
            const password = button.getAttribute('data-password');
            const userId = button.getAttribute('data-userid');

            document.getElementById('edit_first_name').value = firstName;
            document.getElementById('edit_last_name').value = lastName;
            document.getElementById('edit_email').value = email;
            document.getElementById('edit_username').value = username;
            document.getElementById('edit_user_id').value = userId;

        });

        const deleteModal = document.getElementById('DeleteUserModal');
        deleteModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const username = button.getAttribute('data-username');
            const userId = button.getAttribute('data-userid');

            document.getElementById('delete_username').value = username;
            document.getElementById('delete_user_id').value = userId;

        });
        $("#basic-datatables").DataTable({

            ajax: {
                url: './../backend/get_users.php',
                dataSrc: 'data'
            },
            columns: [{
                    data: 'id'
                },
                {
                    data: 'f_name',
                    render: function(data, type, row) {
                        return row.f_name + ' ' + row.l_name;
                    }
                },
                {
                    data: 'username'
                },
                {
                    data: 'email'
                },
                {
                    data: 'last_login'

                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return `
                        <button type="button" class="btn btn-warning btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#EditUserModal"
                            data-username="${row.username}"
                            data-email="${row.email}"
                            data-fname="${row.f_name}"
                            data-lname="${row.l_name}"
  
                            data-userid="${row.id}">
                            Edit
                        </button>

                        <button type="button" class="btn btn-danger btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#DeleteUserModal"
                            data-username="${row.username}"
                            data-userid="${row.id}">
                            Delete
                        </button>

                        
                    `;
                    }
                }
            ]
        });
        document.getElementById("EditUserForm").addEventListener("submit", function(e) {
            e.preventDefault();
            var formData = new FormData(e.target);
            swal({
                title: "Please wait...",
                text: "Editing data...",
                buttons: false,
                closeOnClickOutside: false,
                closeOnEsc: false,
                icon: "https://i.gifer.com/ZZ5H.gif", // optional custom loading gif
            });

            fetch('./../backend/update_user.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        swal({
                            title: "All done!",
                            text: data.message,
                            icon: "success",
                            button: false,
                            timer: 1000
                        }).then(() => {
                            $("#EditUserModal").modal('hide');
                            $("#basic-datatables").DataTable().ajax.reload();
                        });
                    } else {
                        swal("Error", data.message, "error");
                    }
                })
                .catch(error => {
                    swal("Error", "An error occurred while updating the user.", "error");
                });
        });
        document.getElementById("AddUserForm").addEventListener("submit", function(e) {
            e.preventDefault();
            var formData = new FormData(e.target);
            swal({
                title: "Please wait...",
                text: "Submitting data...",
                buttons: false,
                closeOnClickOutside: false,
                closeOnEsc: false,
                icon: "https://i.gifer.com/ZZ5H.gif", // optional custom loading gif
            });

            fetch('./../backend/add_user.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        swal({
                            title: "All done!",
                            text: data.message,
                            icon: "success",
                            button: false,
                            timer: 1000
                        }).then(() => {
                            $("#AddUserForm").modal('hide');
                            $("#basic-datatables").DataTable().ajax.reload();
                        });
                    } else {
                        swal("Error", data.message, "error");
                    }
                })
                .catch(error => {
                    swal("Error", "An error occurred while adding the user.", "error");
                });
        });

        document.getElementById("DeleteUserForm").addEventListener("submit", function(e) {
            e.preventDefault();
            var formData = new FormData(e.target);
            swal({
                title: "Please wait...",
                text: "Deleting data...",
                buttons: false,
                closeOnClickOutside: false,
                closeOnEsc: false,
                icon: "https://i.gifer.com/ZZ5H.gif", // optional custom loading gif
            });

            fetch('./../backend/delete_user.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        swal({
                            title: "All done!",
                            text: data.message,
                            icon: "success",
                            button: false,
                            timer: 1000
                        }).then(() => {
                            $("#DeleteUserModal").modal('hide');
                            $("#basic-datatables").DataTable().ajax.reload();
                        });
                    } else {
                        swal("Error", data.message, "error");
                    }
                })
                .catch(error => {
                    swal("Error", "An error occurred while deleting the user.", "error");
                });
        });


    });
    </script>
</body>

</html>