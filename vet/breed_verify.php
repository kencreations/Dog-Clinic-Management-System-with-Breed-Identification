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
include "./../components/header.php"; ?>

<style>
body,
html {
    margin: 0;
    padding: 0;
    height: 100%;
    overflow: hidden;
    /* Prevent scrollbars */
}

.main-header {
    width: 100% !important;
}

.page-container {
    height: 100vh;
    display: flex;
    flex-direction: column;
}

.main-content {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
}

.upload-box {
    background-color: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(5px);
    border-radius: 20px;
    padding: 3rem;
}
</style>

<body>

    <div class="wrapper page-container">
        <?php include "./../components/topnav.php"; ?>

        <div class="container" style="margin-top: 80px;">
            <button type="button" class="btn btn-primary btn-round" onclick="history.back();">
                Back
            </button>
        </div>
        <div class="main-content">
            <label for="upload-image" class="text-decoration-none text-dark text-center" style="cursor: pointer;">
                <div class="upload-box shadow text-center">
                    <h5 class="mb-4 fw-normal text-dark text-start">Breed Identification</h5>
                    <div style="font-size: 5rem; color: #333;">
                        <i class="bi bi-camera"></i>
                    </div>
                    <p class="mt-3 text-dark">Tap To Identify</p>
                </div>
            </label>
            <input type="file" id="upload-image" accept="image/*" class="d-none" onchange="handleImageUpload(this)">

        </div>
        <div class="modal fade" id="breedResultModal" tabindex="-1" aria-labelledby="breedResultModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content shadow">
                    <div class="modal-body text-center">
                        <img id="previewImage" src="" alt="Uploaded" class="img-fluid mb-3 rounded"
                            style="max-height: 250px;">
                        <div class="mb-2">
                            <i class="bi bi-check-circle-fill text-success" style="font-size: 2rem;"></i>
                        </div>
                        <h5 id="breedLabel">Breed: ...</h5>
                        <p id="breedConfidence">Confidence: ...</p>
                        <button type="button" class="btn btn-primary mt-2" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "./../components/scripts.php"; ?>
    <script>
    function handleImageUpload(input) {
        const file = input.files[0];
        if (!file) return;

        const formData = new FormData();
        formData.append("file", file);
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById("previewImage").src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);

        // Show a loading alert
        swal({
            title: "Uploading...",
            text: "Identifying breed, please wait.",
            icon: "info",
            buttons: false,
            closeOnClickOutside: false,
            closeOnEsc: false
        });

        fetch("http://localhost:5000/identify", {
                method: "POST",
                body: formData,
            })
            .then(res => res.json())
            .then(data => {
                if (data.error) {
                    throw new Error(data.error);
                }
                console.log(data)
                swal.close();

                // Customize this section to show results
                document.getElementById("breedLabel").textContent = `Breed: ${data.label}`;
                document.getElementById("breedConfidence").textContent = `Confidence: ${data.confidence}`;

                // Show the modal
                const modal = new bootstrap.Modal(document.getElementById('breedResultModal'));
                modal.show();
            }) // You could inject this into a div, modal, or replace content
            .catch(err => {
                swal("Error", "Breed identification failed.", "error");
                console.error("Upload error:", err);
            });
    }
    </script>

</body>

</html>