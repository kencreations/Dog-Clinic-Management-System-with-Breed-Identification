<!DOCTYPE html>
<html lang="en">

<?php 
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
                                    <a href="add_pet.php" class="btn btn-danger btn-round">Back</a>
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
                                    <tbody>
                                        <tr>
                                            <td>1001</td>
                                            <td>Ana Villanueva</td>
                                            <td>ana_v</td>
                                            <td>ana.villanueva@example.com</td>
                                            <td>123 Sampaguita St., Quezon City</td>
                                            <td>
                                                <button class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#DeleteUser">
                                                    <span class="btn-label"><i class="fa fa-trash"></i></span>
                                                    Delete
                                                </button>
                                                <button class="btn btn-warning">
                                                    <span class="btn-label"><i class="fa fa-edit"></i></span>
                                                    Edit
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1002</td>
                                            <td>John Reyes</td>
                                            <td>john_r</td>
                                            <td>john.reyes@example.com</td>
                                            <td>45 Mabini St., Makati</td>
                                            <td>
                                                <button class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#DeleteUser">
                                                    <span class="btn-label"><i class="fa fa-trash"></i></span>
                                                    Delete
                                                </button>
                                                <button class="btn btn-warning">
                                                    <span class="btn-label"><i class="fa fa-edit"></i></span>
                                                    Edit
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1003</td>
                                            <td>Mariel Santos</td>
                                            <td>mariel_s</td>
                                            <td>mariel.santos@example.com</td>
                                            <td>7 Cattleya Rd., Taguig</td>
                                            <td>
                                                <button class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#DeleteUser">
                                                    <span class="btn-label"><i class="fa fa-trash"></i></span>
                                                    Delete
                                                </button>
                                                <button class="btn btn-warning">
                                                    <span class="btn-label"><i class="fa fa-edit"></i></span>
                                                    Edit
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1004</td>
                                            <td>Kevin Cruz</td>
                                            <td>kevcruz</td>
                                            <td>kevin.cruz@example.com</td>
                                            <td>25 Rizal Ave., Pasig</td>
                                            <td>
                                                <button class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#DeleteUser">
                                                    <span class="btn-label"><i class="fa fa-trash"></i></span>
                                                    Delete
                                                </button>
                                                <button class="btn btn-warning">
                                                    <span class="btn-label"><i class="fa fa-edit"></i></span>
                                                    Edit
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1005</td>
                                            <td>Jasmine Dela Cruz</td>
                                            <td>jasdelacruz</td>
                                            <td>jasmine.dc@example.com</td>
                                            <td>99 Maginhawa St., QC</td>
                                            <td>
                                                <button class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#DeleteUser">
                                                    <span class="btn-label"><i class="fa fa-trash"></i></span>
                                                    Delete
                                                </button>
                                                <button class="btn btn-warning">
                                                    <span class="btn-label"><i class="fa fa-edit"></i></span>
                                                    Edit
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1006</td>
                                            <td>Marco Mendoza</td>
                                            <td>mmendoza</td>
                                            <td>marco.mendoza@example.com</td>
                                            <td>12 Bonifacio St., Valenzuela</td>
                                            <td>
                                                <button class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#DeleteUser">
                                                    <span class="btn-label"><i class="fa fa-trash"></i></span>
                                                    Delete
                                                </button>
                                                <button class="btn btn-warning">
                                                    <span class="btn-label"><i class="fa fa-edit"></i></span>
                                                    Edit
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1007</td>
                                            <td>Bianca Lopez</td>
                                            <td>bianca_l</td>
                                            <td>bianca.lopez@example.com</td>
                                            <td>66 Aurora Blvd., Manila</td>
                                            <td>
                                                <button class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#DeleteUser">
                                                    <span class="btn-label"><i class="fa fa-trash"></i></span>
                                                    Delete
                                                </button>
                                                <button class="btn btn-warning">
                                                    <span class="btn-label"><i class="fa fa-edit"></i></span>
                                                    Edit
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1008</td>
                                            <td>Luis Ramirez</td>
                                            <td>lramirez</td>
                                            <td>luis.ramirez@example.com</td>
                                            <td>5 Katipunan Ave., Marikina</td>
                                            <td>
                                                <button class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#DeleteUser">
                                                    <span class="btn-label"><i class="fa fa-trash"></i></span>
                                                    Delete
                                                </button>
                                                <button class="btn btn-warning">
                                                    <span class="btn-label"><i class="fa fa-edit"></i></span>
                                                    Edit
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1009</td>
                                            <td>Nicole Tan</td>
                                            <td>nicole_t</td>
                                            <td>nicole.tan@example.com</td>
                                            <td>88 San Juan Blvd., San Juan City</td>
                                            <td>
                                                <button class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#DeleteUser">
                                                    <span class="btn-label"><i class="fa fa-trash"></i></span>
                                                    Delete
                                                </button>
                                                <button class="btn btn-warning">
                                                    <span class="btn-label"><i class="fa fa-edit"></i></span>
                                                    Edit
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1010</td>
                                            <td>Daniel Go</td>
                                            <td>dan_go</td>
                                            <td>daniel.go@example.com</td>
                                            <td>21 Quirino Highway, Caloocan</td>
                                            <td>
                                                <button class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#DeleteUser">
                                                    <span class="btn-label"><i class="fa fa-trash"></i></span>
                                                    Delete
                                                </button>
                                                <button class="btn btn-warning">
                                                    <span class="btn-label"><i class="fa fa-edit"></i></span>
                                                    Edit
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>



                                </table>
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
        $("#basic-datatables").DataTable({});


    });
    </script>
</body>

</html>