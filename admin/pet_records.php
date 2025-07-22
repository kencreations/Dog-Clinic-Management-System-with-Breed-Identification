<!DOCTYPE html>
<html lang="en">

<?php 
session_start();
if (!$_SESSION['user_id'] || $_SESSION['role'] != '1') {
    header("Location: ../index.php");
    exit();
}
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
                            <h3 class="fw-bold mb-3">Pet Records</h3>
                        </div>
                        <div class="ms-md-auto py-2 py-md-0">
                            <a href="add_pet.php" class="btn btn-primary btn-round">Add Pet</a>
                        </div>
                    </div>
                    <div class="modal fade" id="AddUserForm" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="AddUserFormLabel" aria-hidden="true">
                        <div class=" modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Patient</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <form action="" method="post">
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
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
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
                url: './../backend/get_pets.php', // adjust path based on file location
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
                        <button class="btn btn-sm btn-danger" onclick="deletePet(${row.id})">Delete</button>
                    `;
                    }
                }
            ]
        });
    });
    </script>
</body>

</html>