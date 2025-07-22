<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="assets/img/kaiadmin/favicon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
    WebFont.load({
        google: {
            families: ["Public Sans:300,400,500,600,700"]
        },
        custom: {
            families: [
                "Font Awesome 5 Solid",
                "Font Awesome 5 Regular",
                "Font Awesome 5 Brands",
                "simple-line-icons",
            ],
            urls: ["assets/css/fonts.min.css"],
        },
        active: function() {
            sessionStorage.fonts = true;
        },
    });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />

    <style>
    body {
        background-color: #eeeeee;
    }

    .login-container {
        max-width: 500px;
        width: 100%;
        padding: 30px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    footer {
        background-color: #343a40;
        color: white;
        padding: 20px 0;
    }

    .user-type-toggle .btn {
        border-radius: 0;
    }

    h5 {
        font-weight: 600;
    }

    .toggle-btn {
        background-color: #f8f9fa;
        color: #212529;
    }

    .btn-check:checked+.toggle-btn {
        background-color: #212529 !important;
        color: #fff !important;
    }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-dark px-4">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="./assets/img/logo2.svg" alt="Logo" width="auto" height="50" class="me-2" />
        </a>
        <div class="ms-auto text-white" id="dateTime"></div>
    </nav>

    <!-- Page Content -->
    <div class="flex-grow-1 d-flex justify-content-center align-items-center">
        <div class="login-container">
            <h3 class="text-center mb-4">Log in</h3>

            <!-- User Type Toggle Full Width -->
            <!-- User Type Toggle Full Width & Visible Selection -->

            <!-- Form -->
            <form id="loginForm" class="form">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label" id="passwordLabel">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password"
                        name="password" />
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Login
                </button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // Live date and time
    function updateDateTime() {
        const now = new Date();
        document.getElementById("dateTime").textContent =
            now.toLocaleString();
    }
    setInterval(updateDateTime, 1000);
    updateDateTime();
    </script>
    <script>
    document.getElementById("loginForm").addEventListener("submit", function(e) {
        e.preventDefault();
        const form = this;
        const formData = new FormData(form);

        const oldAlert = document.getElementById("login-alert");
        if (oldAlert) oldAlert.remove();

        fetch("backend/login.php", {
                method: "POST",
                body: formData,
            })
            .then(async res => {
                const text = await res.text();
                console.log("Raw response:", text);
                try {
                    const data = JSON.parse(text);
                    if (data.success) {
                        const success = document.createElement("div");
                        success.className = "alert alert-success mt-3";
                        success.textContent = data.message;
                        success.id = "login-alert";
                        form.parentNode.appendChild(success);

                        setTimeout(() => {
                            window.location.href = data.redirect || "dashboard.php";
                        }, 1200);
                    } else {
                        const error = document.createElement("div");
                        error.className = "alert alert-danger mt-3";
                        error.textContent = data.message;
                        error.id = "login-alert";
                        form.parentNode.appendChild(error);
                    }
                } catch (err) {
                    console.error("JSON parse error:", err);
                    const fallback = document.createElement("div");
                    fallback.className = "alert alert-danger mt-3";
                    fallback.textContent = "Invalid JSON response from server.";
                    fallback.id = "login-alert";
                    form.parentNode.appendChild(fallback);
                }
            })
            .catch(error => {
                console.error("Fetch error:", error);
                const fallback = document.createElement("div");
                fallback.className = "alert alert-danger mt-3";
                fallback.textContent = "Something went wrong. Try again later.";
                fallback.id = "login-alert";
                form.parentNode.appendChild(fallback);
            });
    });
    </script>


    <script src="index.js">

    </script>
</body>

</html>