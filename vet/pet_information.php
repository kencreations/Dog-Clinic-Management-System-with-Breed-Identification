<!DOCTYPE html>
<html lang="en">

<?php 
include "./../components/header.php";
?>
<style>
.main-header {
    width: 100% !important;
}

.card-img-top {
    aspect-ratio: 4/3;
    object-fit: cover;
    width: 100%;
    max-height: 200px;
}
</style>

<body>

    <div class="wrapper">
        <?php include "./../components/topnav.php" ?>
        <div class="container">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Breed Records</h3>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Dog Breed Information</div>
                                <div class="card-tools">
                                    <a href="#" class="btn btn-label-primary btn-round btn-sm me-2">
                                        <span class="btn-label">
                                            <i class="fa fa-arrow-left"></i>
                                        </span>
                                        Back
                                    </a>

                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4" id="breedCardsContainer">


                            </div>


                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>

    <?php include "./../components/scripts.php" ?>
    <script>
    function getSizeBadgeClass(size) {
        switch (size.toLowerCase()) {
            case "small":
                return "bg-success";
            case "medium":
                return "bg-primary";
            case "large":
                return "bg-danger";
            case "extra large":
                return "bg-dark";
            default:
                return "bg-secondary";
        }
    }

    function getCoatBadgeClass(coat) {
        switch (coat.toLowerCase()) {
            case "short":
                return "bg-warning text-dark";
            case "medium":
                return "bg-info text-dark";
            case "long":
                return "bg-primary";
            case "curly":
                return "bg-success";
            case "double":
                return "bg-dark";
            case "wire":
                return "bg-secondary";
            default:
                return "bg-light text-dark";
        }
    }
    $(document).ready(function() {
        fetch("./../backend/get_breed.php")
            .then(res => res.json())
            .then(data => {
                const container = document.getElementById("breedCardsContainer");


                if (data.status === "success") {
                    data.data.forEach(breed => {
                        const card = document.createElement("div");
                        card.className = "col";
                        card.innerHTML = `
                        <div class="card h-100">
                            <img src="./../backend/${breed.image_path}" class="card-img-top object-fit-cover" style="aspect-ratio: 3 / 4;" alt="${breed.name}">
                            <div class="card-body">
                                <h5 class="card-title">${breed.name}</h5>
                                <p class="card-text">
                                    ${breed.description}<br>
                                    Size: <span class="badge ${getSizeBadgeClass(breed.size)}">${breed.size}</span><br>
                                    Coat: <span class="badge ${getCoatBadgeClass(breed.coat_type)}">${breed.coat_type}</span>
                                </p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
        
                        </div>
                    </div>
                    `;
                        container.appendChild(card);
                    });
                } else {
                    container.innerHTML =
                        `<div class="col"><div class="alert alert-danger">${data.message}</div></div>`;
                }
            })
            .catch(err => {
                console.error("Error fetching breeds:", err);
                const container = document.getElementById("breedCardsContainer");
                container.innerHTML =
                    `<div class="col"><div class="alert alert-danger">Something went wrong. Please try again.</div></div>`;
            });



    });
    </script>
</body>

</html>