<!DOCTYPE html>
<html lang="en">

<?php include "./../components/header.php"; ?>

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

        <!-- Back Button -->
        <div class="container" style="margin-top: 80px;">
            <!-- adjust 80px based on actual topnav height -->
            <button type="button" class="btn btn-primary btn-round" onclick="history.back();">
                Back
            </button>
        </div>
        <!-- Main Upload Content -->
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
    </div>

    <?php include "./../components/scripts.php"; ?>
</body>

</html>