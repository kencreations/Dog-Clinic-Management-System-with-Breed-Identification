<!DOCTYPE html>
<html lang="en">

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
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
                            <h3 class="fw-bold mb-3">Add Pet Record</h3>
                        </div>
                        <div class="ms-md-auto py-2 py-md-0">
                            <button type="button" class="btn btn-primary btn-round" data-bs-toggle="modal"
                                data-bs-target="#AddUserForm">
                                Back
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">

                                <div class="card-body">
                                    <form id="addPetForm" enctype="multipart/form-data">
                                        <!-- SECTION 1: Pet Information -->
                                        <h5 class="mb-3 fw-bold">Pet Information</h5>
                                        <div class="row mb-4">
                                            <!-- Pet Photo -->
                                            <div class="col-md-4 text-center">
                                                <img src="https://via.placeholder.com/200" class="img-thumbnail mb-2"
                                                    alt="Pet Photo">
                                                <input type="file" class="form-control" name="pet_photo">
                                            </div>

                                            <!-- Pet Fields -->
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Pet Name</label>
                                                        <input type="text" name="pet_name" class="form-control"
                                                            required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Age</label>
                                                        <input type="number" name="age" class="form-control" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Birth Date</label>
                                                        <input type="date" name="birth_date" class="form-control"
                                                            required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Breed</label>
                                                        <input type="text" name="breed" class="form-control" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Height (cm)</label>
                                                        <input type="number" name="height" class="form-control"
                                                            step="0.1">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Weight (kg)</label>
                                                        <input type="number" name="weight" class="form-control"
                                                            step="0.1">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Gender</label>
                                                        <select name="gender" class="form-select" required>
                                                            <option selected disabled>Select gender</option>
                                                            <option>Male</option>
                                                            <option>Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Color</label>
                                                        <input type="text" name="color" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- SECTION 2: Health Concerns -->
                                        <h5 class="mb-3 fw-bold">Health Concerns</h5>
                                        <div class="row mb-4">
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Allergies</label>
                                                <textarea name="allergies" class="form-control" rows="2"></textarea>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Existing Conditions</label>
                                                <textarea name="existing_conditions" class="form-control"
                                                    rows="2"></textarea>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Assigned Veterinarian</label>
                                                <input type="text" name="assigned_vet" class="form-control">
                                            </div>
                                        </div>

                                        <!-- SECTION 3: Owner's Information -->
                                        <h5 class="mb-3 fw-bold">Owner's Information</h5>
                                        <div class="row mb-4">
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Owner's Name</label>
                                                <input type="text" name="owner_name" class="form-control" required>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Phone Number</label>
                                                <input type="tel" name="owner_phone" class="form-control" required>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Email Address</label>
                                                <input type="email" name="owner_email" class="form-control">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Barangay</label>
                                                <input type="text" name="barangay" class="form-control">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Town/City</label>
                                                <input type="text" name="town_city" class="form-control">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Province</label>
                                                <input type="text" name="province" class="form-control">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Country</label>
                                                <input type="text" name="country" class="form-control"
                                                    value="Philippines">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Zip Code</label>
                                                <input type="text" name="zip_code" class="form-control">
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <input type="hidden" name="id">
                                        <button type="submit" class="btn btn-primary">Update Pet Record</button>
                                    </form>


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
        $("#basic-datatables").DataTable({});
        const searchID = new URLSearchParams(window.location.search),
            pet_id = searchID.get('id');

        console.log(pet_id)
        const url = `./../backend/get_pets.php?id=${encodeURIComponent(pet_id)}`;


        fetch(url)
            .then(res => res.json())
            .then(datas => {
                const data = datas.data[0];

                document.querySelector('input[name="id"]').value = pet_id;
                document.querySelector('input[name="pet_name"]').value = data.pet_name || '';
                document.querySelector('input[name="age"]').value = data.age || '';
                document.querySelector('input[name="birth_date"]').value = data.birth_date || '';
                document.querySelector('input[name="breed"]').value = data.breed || '';
                document.querySelector('input[name="height"]').value = data.height_cm || '';
                document.querySelector('input[name="weight"]').value = data.weight_kg || '';
                document.querySelector('select[name="gender"]').value = data.gender || '';
                document.querySelector('input[name="color"]').value = data.color || '';

                document.querySelector('textarea[name="allergies"]').value = data.allergies || '';
                document.querySelector('textarea[name="existing_conditions"]').value = data
                    .existing_conditions || '';
                document.querySelector('input[name="assigned_vet"]').value = data.assigned_vet || '';

                document.querySelector('input[name="owner_name"]').value = data.owner_name || '';
                document.querySelector('input[name="owner_phone"]').value = data.owner_phone || '';
                document.querySelector('input[name="owner_email"]').value = data.owner_email || '';
                document.querySelector('input[name="barangay"]').value = data.barangay || '';
                document.querySelector('input[name="town_city"]').value = data.town_city || '';
                document.querySelector('input[name="province"]').value = data.province || '';
                document.querySelector('input[name="country"]').value = data.country || '';
                document.querySelector('input[name="zip_code"]').value = data.zip_code || '';

                // Optional: Display pet photo if available

            })

    });
    </script>
    <script>
    document.querySelector("form").addEventListener("submit", function(e) {
        e.preventDefault();

        const form = e.target;
        const formData = new FormData(form);

        fetch("./../backend/update_pet.php", {
                method: "POST",
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    swal({
                        title: "Record Updated Successfully.",
                        text: data.message,
                        icon: "success",
                        button: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href =
                            "pet_records.php";
                        form.reset();

                        const imgPreview = document.querySelector("img.img-thumbnail");
                        if (imgPreview) {
                            imgPreview.src = "https://via.placeholder.com/200";
                        }


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
    </script>




</body>

</html>