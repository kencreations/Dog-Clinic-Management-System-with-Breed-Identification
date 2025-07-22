<!DOCTYPE html>
<html lang="en">

<?php 
include "./../components/header.php";
?>
<style>
.main-header {
    width: 100% !important;
}

.card {
    margin-top: 80px;
    /* Adjust based on your topnav height */
}
</style>

<body>

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
                                    <h3 class="fw-bold mb-3">Add Pet Record</h3>
                                </div>
                                <div class="ms-md-auto py-2 py-md-0">
                                    <button type="button" class="btn btn-primary btn-round" data-bs-toggle="modal"
                                        data-bs-target="#AddUserForm">
                                        Back
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
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
                                                <input type="text" class="form-control" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Age</label>
                                                <input type="number" class="form-control" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Birth Date</label>
                                                <input type="date" class="form-control" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Breed</label>
                                                <input type="text" class="form-control" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Height (cm)</label>
                                                <input type="number" class="form-control" step="0.1">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Weight (kg)</label>
                                                <input type="number" class="form-control" step="0.1">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Gender</label>
                                                <select class="form-select" required>
                                                    <option selected disabled>Select gender</option>
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Color</label>
                                                <input type="text" class="form-control">
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- SECTION 2: Health Concerns -->
                                <h5 class="mb-3 fw-bold">Health Concerns</h5>
                                <div class="row mb-4">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Allergies</label>
                                        <textarea class="form-control" rows="2"></textarea>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Existing Conditions</label>
                                        <textarea class="form-control" rows="2"></textarea>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Assigned Veterinarian</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <!-- SECTION 3: Owner's Information -->
                                <h5 class="mb-3 fw-bold">Owner's Information</h5>
                                <div class="row mb-4">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Owner's Name</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" class="form-control">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Barangay</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Town/City</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Province</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Country</label>
                                        <input type="text" class="form-control" value="Philippines">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Zip Code</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <!-- SECTION 4: Medical History -->
                                <h5 class="mb-3 fw-bold d-flex justify-content-between align-items-center">
                                    Medical History
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                        data-bs-target="#medicalHistoryModal">
                                        + Add Entry
                                    </button>
                                    <!-- Medical History Modal -->
                                    <div class="modal fade" id="medicalHistoryModal" tabindex="-1"
                                        aria-labelledby="medicalHistoryModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="medicalHistoryModalLabel">Add
                                                        Medical History Entry</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="row g-3">
                                                            <div class="col-md-4">
                                                                <label class="form-label">Date</label>
                                                                <input type="date" class="form-control">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label">Veterinarian</label>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label">Diagnosis</label>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label">Tests
                                                                    Performed</label>
                                                                <textarea class="form-control" rows="2"></textarea>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label">Test Results</label>
                                                                <textarea class="form-control" rows="2"></textarea>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label">Actions Taken</label>
                                                                <textarea class="form-control" rows="2"></textarea>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label">Medications
                                                                    Given</label>
                                                                <textarea class="form-control" rows="2"></textarea>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="form-label">Additional
                                                                    Comments</label>
                                                                <textarea class="form-control" rows="2"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save
                                                        Entry</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </h5>
                                <div class="mb-4">
                                    <p class="text-muted fst-italic">No medical history added yet.</p>
                                </div>

                                <button type="submit" class="btn btn-primary">Save Pet Record</button>
                            </form>

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