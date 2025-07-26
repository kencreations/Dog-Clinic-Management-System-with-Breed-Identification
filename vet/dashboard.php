<!DOCTYPE html>
<html lang="en">

<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != '1') {
    header("Location: ../index.php");
    exit();
}
include "./../components/header.php";
?>
<style>
.main-header {
    width: 100% !important;
}
</style>

<body>

    <div class="wrapper">
        <?php include "./../components/topnav.php" ?>

        <!-- Fullscreen Flex Container -->
        <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="container">

                <div class="row justify-content-center g-4">
                    <!-- Add Pet Record -->
                    <div class="col-md-4">
                        <a href="pet_records.php" class="text-decoration-none text-dark">
                            <div class="card h-100 shadow-sm border-0">
                                <img src="./../assets/img/3.svg" class="card-img-top" alt="Pet Records">
                                <div class="card-body text-center">
                                    <h5 class="card-title fw-bold">Pet Records</h5>
                                    <p class="card-text text-muted">Browse and manage registered pet data.</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Dog Information Card -->
                    <div class="col-md-4">
                        <a href="pet_information.php" class="text-decoration-none text-dark">
                            <div class="card h-100 shadow-sm border-0">
                                <img src="./../assets/img/2.svg" class="card-img-top" alt="Dog Information">
                                <div class="card-body text-center">
                                    <h5 class="card-title fw-bold">Dog Information</h5>
                                    <p class="card-text text-muted">View details about dog breeds and characteristics.
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Breed Identifier Card -->
                    <div class="col-md-4">
                        <a href="breed_verify.php" class="text-decoration-none text-dark">
                            <div class="card h-100 shadow-sm border-0">
                                <img src="./../assets/img/1.svg" class="card-img-top" alt="Breed Identifier">
                                <div class="card-body text-center">
                                    <h5 class="card-title fw-bold">Breed Identifier</h5>
                                    <p class="card-text text-muted">Upload an image and identify the dog breed.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- center wrapper -->
    </div>

    <?php include "./../components/scripts.php" ?>
    <script>
    var lineChart = document.getElementById("lineChart").getContext("2d"),
        pieChart = document.getElementById("pieChart").getContext("2d");

    var myLineChart = new Chart(lineChart, {
        type: "line",
        data: {
            labels: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec",
            ],
            datasets: [{
                label: "Pet Patients",
                borderColor: "#1d7af3",
                pointBorderColor: "#FFF",
                pointBackgroundColor: "#1d7af3",
                pointBorderWidth: 2,
                pointHoverRadius: 4,
                pointHoverBorderWidth: 1,
                pointRadius: 4,
                backgroundColor: "transparent",
                fill: true,
                borderWidth: 2,
                data: [
                    542, 480, 430, 550, 530, 453, 380, 434, 568, 610, 700, 900,
                ],
            }, ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                position: "bottom",
                labels: {
                    padding: 10,
                    fontColor: "#1d7af3",
                },
            },
            tooltips: {
                bodySpacing: 4,
                mode: "nearest",
                intersect: 0,
                position: "nearest",
                xPadding: 10,
                yPadding: 10,
                caretPadding: 10,
            },
            layout: {
                padding: {
                    left: 15,
                    right: 15,
                    top: 15,
                    bottom: 15
                },
            },
        },
    });

    var myPieChart = new Chart(pieChart, {
        type: "pie",
        data: {
            datasets: [{
                data: [50, 35],
                backgroundColor: ["#1d7af3", "#f3545d"],
                borderWidth: 0,
            }, ],
            labels: ["Male", "Female"],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                position: "bottom",
                labels: {
                    fontColor: "rgb(154, 154, 154)",
                    fontSize: 11,
                    usePointStyle: true,
                    padding: 20,
                },
            },
            pieceLabel: {
                render: "percentage",
                fontColor: "white",
                fontSize: 14,
            },
            tooltips: false,
            layout: {
                padding: {
                    left: 20,
                    right: 20,
                    top: 20,
                    bottom: 20,
                },
            },
        },
    });
    </script>
</body>

</html>