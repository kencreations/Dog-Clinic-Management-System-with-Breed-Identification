<!DOCTYPE html>
<html lang="en">

<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != '1') {
    header("Location: ../index.php");
    exit();
}
include "./../components/header.php";
?>

<body>
    <style>
    .main-header {
        width: 100% !important;
    }

    .card {
        margin-top: 80px;
        /* Adjust based on your topnav height */
    }
    </style>
    <div class="wrapper">
        <?php include "./../components/topnav.php" ?>
        <div class="container">


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                            <div
                                class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                                <div>
                                    <h3 class="fw-bold mb-3">Pet Records</h3>
                                </div>
                                <div class="ms-md-auto py-2 py-md-0">
                                    <a href="add_pet.php" class="btn btn-primary btn-round">Add Pet</a>
                                    <a href="dashboard.php" class="btn btn-danger btn-round">Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID No.</th>
                                            <th>Owner</th>
                                            <th>Name</th>
                                            <th>Sex</th>
                                            <th>Age</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID No.</th>
                                            <th>Owner</th>
                                            <th>Name</th>
                                            <th>Sex</th>
                                            <th>Age</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>




                                </table>
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
                                            Are you sure you want to delete this pet record?
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
            </div>
        </div>
    </div>

    <?php include "./../components/scripts.php" ?>
    <script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({
            ajax: {
                url: './../backend/get_pets.php',
                dataSrc: 'data'
            },
            columns: [{
                    data: 'id'
                },
                {
                    data: 'owner_name'
                },
                {
                    data: 'pet_name'
                },
                {
                    data: 'gender'
                },
                {
                    data: 'age'
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return `
                        <a href="edit_pet.php?id=${row.id}" class="btn btn-sm btn-warning">Edit</a>
                        <button type="button" class="btn btn-danger btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#DeleteUserModal"
                            data-username="${row.pet_name}"
                            data-userid="${row.id}">
                            Delete
                        </button>
                    `;
                    }
                }
            ]
        });
        const deleteModal = document.getElementById('DeleteUserModal');
        deleteModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const username = button.getAttribute('data-username');
            const userId = button.getAttribute('data-userid');

            document.getElementById('delete_username').value = username;
            document.getElementById('delete_user_id').value = userId;

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

            fetch('./../backend/delete_pet.php', {
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