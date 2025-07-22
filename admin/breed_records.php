<!DOCTYPE html>
<html lang="en">

<?php 
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}
include "./../components/header.php";

?>
<style>
.card-img-top {
    aspect-ratio: 4/3;
    object-fit: cover;
    width: 100%;
    max-height: 200px;
}
</style>

<body>

    <div class="wrapper">
        <?php include "./../components/admin_sidenav.php" ?>
        <div class="main-panel">
            <?php include "./../components/topnav.php" ?>
            <div class="container">
                <div class="page-inner">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                        <div>
                            <h3 class="fw-bold mb-3">Breed Records</h3>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">

                                <div class="card-body">
                                    <div id="breedCardsContainer"
                                        class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">

                                        <div class="col">
                                            <div class="card h-100 d-flex justify-content-center align-items-center border-dashed"
                                                style="cursor: pointer; border: 2px dashed #ccc; background-color: #f8f9fa;"
                                                data-bs-toggle="modal" data-bs-target="#addBreedModal">
                                                <div class="text-center py-5">
                                                    <i class="bi bi-plus-circle fs-1 text-muted"></i>
                                                    <h6 class="mt-2 text-muted">Add New Breed</h6>
                                                </div>
                                            </div>
                                        </div>




                                    </div>


                                </div>
                                <div class="modal fade" id="addBreedModal" tabindex="-1"
                                    aria-labelledby="addBreedModalLabel" aria-hidden="true" data-bs-backdrop="static"
                                    data-bs-keyboard="false">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <form class="modal-content" id="addBreedForm" enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addBreedModalLabel">Add New Breed
                                                </h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Breed Name</label>
                                                    <input type="text" class="form-control" name="name" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Description</label>
                                                    <textarea class="form-control" name="description" rows="3"
                                                        required></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Size</label>
                                                    <select class="form-select" name="size" required>
                                                        <option disabled selected>Select size</option>
                                                        <option>Small</option>
                                                        <option>Medium</option>
                                                        <option>Large</option>
                                                        <option>Extra Large</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Coat Type</label>
                                                    <select class="form-select" name="coat_type" required>
                                                        <option disabled selected>Select coat type</option>
                                                        <option>Short</option>
                                                        <option>Medium</option>
                                                        <option>Long</option>
                                                        <option>Curly</option>
                                                        <option>Double</option>
                                                        <option>Wire</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Image</label>
                                                    <input type="file" class="form-control" name="image"
                                                        accept="image/*" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Add Breed</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                                <div class="modal fade" id="editBreedModal" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <form id="editBreedForm" class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Breed</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="id" id="edit_breed_id" />
                                                <div class="mb-3">
                                                    <label>Breed Name</label>
                                                    <input type="text" class="form-control" id="edit_breed_name"
                                                        name="name" required />
                                                </div>
                                                <div class="mb-3">
                                                    <label>Description</label>
                                                    <textarea class="form-control" id="edit_breed_description"
                                                        name="description" rows="3" required></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Size</label>
                                                    <select class="form-select" id="edit_breed_size" name="size"
                                                        required>
                                                        <option>Small</option>
                                                        <option>Medium</option>
                                                        <option>Large</option>
                                                        <option>Extra Large</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Coat Type</label>
                                                    <select class="form-select" id="edit_breed_coat" name="coat_type"
                                                        required>
                                                        <option>Short</option>
                                                        <option>Medium</option>
                                                        <option>Long</option>
                                                        <option>Curly</option>
                                                        <option>Double</option>
                                                        <option>Wire</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-success" type="submit">Update
                                                    Breed</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="modal fade" id="deleteBreedModal" tabindex="-1"
                                    aria-labelledby="deleteBreedLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form id="deleteBreedForm">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteBreedLabel">Confirm Delete
                                                    </h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete <strong
                                                            id="delete_breed_name"></strong>?</p>
                                                    <input type="hidden" name="id" id="delete_breed_id">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
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
    document.getElementById('editBreedModal').addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;

        const id = button.getAttribute('data-bs-id');
        const name = button.getAttribute('data-bs-name');
        const description = button.getAttribute('data-bs-description');
        const size = button.getAttribute('data-bs-size');
        const coat = button.getAttribute('data-bs-coat');

        document.getElementById('edit_breed_id').value = id;
        document.getElementById('edit_breed_name').value = name;
        document.getElementById('edit_breed_description').value = description;
        document.getElementById('edit_breed_size').value = size;
        document.getElementById('edit_breed_coat').value = coat;
    });

    document.getElementById("editBreedForm").addEventListener("submit", function(e) {
        e.preventDefault();

        const form = e.target;
        const formData = new FormData(form);

        // Show loading alert
        swal({
            title: "Updating...",
            text: "Please wait while we save changes.",
            icon: "info",
            buttons: false,
            closeOnClickOutside: false,
            closeOnEsc: false
        });

        fetch("./../backend/update_breed.php", {
                method: "POST",
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === "success") {
                    swal({
                        title: "Success!",
                        text: data.message,
                        icon: "success",
                        buttons: false,
                        timer: 1000
                    }).then(() => {
                        const modal = bootstrap.Modal.getInstance(document.getElementById(
                            "editBreedModal"));
                        modal.hide();


                        loadBreeds();
                    });
                } else {
                    swal("Oops!", data.message, "error");
                }
            })
            .catch(error => {
                console.error("Update error:", error);
                swal("Error", "Something went wrong. Please try again.", "error");
            });
    });



    document.getElementById("deleteBreedForm").addEventListener("submit", function(e) {
        e.preventDefault();

        const form = e.target;
        const formData = new FormData(form);

        swal({
            title: "Deleting...",
            text: "Please wait while we remove this breed.",
            icon: "info",
            buttons: false,
            closeOnClickOutside: false,
            closeOnEsc: false
        });

        fetch("./../backend/delete_breed.php", {
                method: "POST",
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === "success") {
                    swal({
                        title: "Deleted!",
                        text: data.message,
                        icon: "success",
                        buttons: false,
                        timer: 1000
                    }).then(() => {
                        const modal = bootstrap.Modal.getInstance(document.getElementById(
                            'deleteBreedModal'));
                        modal.hide();
                        loadBreeds();
                    });
                } else {
                    swal("Oops!", data.message, "error");
                }
            })
            .catch(error => {
                console.error("Delete error:", error);
                swal("Error", "Something went wrong. Please try again.", "error");
            });
    });

    document.getElementById('deleteBreedModal').addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const id = button.getAttribute('data-bs-id');

        document.getElementById('delete_breed_id').value = id;
    });



    function loadBreeds() {
        fetch("./../backend/get_breed.php")
            .then(res => res.json())
            .then(data => {
                const container = document.getElementById("breedCardsContainer");
                while (container.children.length > 1) {
                    container.removeChild(container.lastChild);
                }


                if (data.status === "success") {
                    data.data.forEach(breed => {
                        const card = document.createElement("div");
                        card.className = "col";
                        card.innerHTML = `
    <div class="card h-100">
        <img src="./../backend/${breed.image_path}" class="card-img-top" alt="${breed.name}">
        <div class="card-body">
            <h5 class="card-title">${breed.name}</h5>
            <p class="card-text">
                ${breed.description}<br>
                Size: <span class="badge ${getSizeBadgeClass(breed.size)}">${breed.size}</span><br>
                Coat: <span class="badge ${getCoatBadgeClass(breed.coat_type)}">${breed.coat_type}</span>
            </p>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <button class="btn btn-sm btn-primary w-50 me-1" data-bs-toggle="modal" data-bs-target="#editBreedModal"
                data-bs-id="${breed.id}" data-bs-name="${breed.name}" data-bs-description="${breed.description}"
                data-bs-size="${breed.size}" data-bs-coat="${breed.coat_type}">Edit</button>
            <button class="btn btn-sm btn-danger w-50 ms-1" data-bs-id="${breed.id}"  data-bs-toggle="modal" data-bs-target="#deleteBreedModal">Delete</button>
        </div>
    </div>
    `;
                        container.appendChild(card);
                    });
                } else {
                    container.innerHTML =
                        `<div class="col">
        <div class="alert alert-danger">${data.message}</div>
    </div>`;
                }
            })
            .catch(err => {
                console.error("Error fetching breeds:", err);
                const container = document.getElementById("breedCardsContainer");
                container.innerHTML =
                    `<div class="col">
        <div class="alert alert-danger">Something went wrong. Please try again.</div>
    </div>`;
            });
    }


    $(document).ready(function() {
        loadBreeds();
        document.getElementById('addBreedForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const form = e.target;
            const formData = new FormData(form);

            const oldAlert = document.getElementById("breed-alert");
            if (oldAlert) oldAlert.remove();

            swal({
                title: "Please wait...",
                text: "Submitting data...",
                buttons: false,
                closeOnClickOutside: false,
                closeOnEsc: false,
                icon: "https://i.gifer.com/ZZ5H.gif", // optional custom loading gif
            });

            fetch("./../backend/add_breed.php", {
                    method: "POST",
                    body: formData,
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status === "success") {
                        swal({
                            title: "All done!",
                            text: data.message,
                            icon: "success",
                            button: "OK",
                        }).then(() => {
                            form.reset();

                            const modal = bootstrap.Modal.getInstance(document
                                .getElementById('addBreedModal'));
                            modal.hide();
                            loadBreeds();


                        });
                    } else {
                        swal("Oops!", data.message, "error");
                    }
                })
                .catch(err => {
                    console.error(err);
                    swal("Error", "Something went wrong. Please try again.", "error");
                });
        });

    });
    </script>
</body>

</html>