<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    // If logged in, redirect to welcome.php
    header("Location: welcome.php");
    exit();
}

// include('php/functions.php');
// include('config.php');

// alert_message("2", "danger", "too many login attempts");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="./assets/compiled/svg/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./assets/compiled/css/app.css">
    <link rel="stylesheet" href="./assets/compiled/css/app-dark.css">
    <link rel="stylesheet" href="./assets/compiled/css/auth.css">
</head>

<body>
    <script src="assets/static/js/initTheme.js"></script>
    <div id="auth">
        <div class="d-flex flex-column container">
            <div class="align-items-center justify-content-center g-0 min-vh-100 row">
                <div class="py-8 py-xl-0 col-xxl-4 col-lg-6 col-md-8 col-12">
                    <div class="smooth-shadow-md card">
                        <div class="p-6 card-body">
                            <div class="mb-5 d-flex justify-content-center align-items-center"><img src="./assets/compiled/svg/logo.png" width="50px" height="50px" alt="" class="object-fit-contain">
                                <h1 class="ms-1">FilePilot</h1>
                            </div>
                            <p class="mb-6">Please enter your user information.</p>
                            <form class="row g-3" action="php/auth/user_login.php" method="POST">
                                <div class="col-md-12">
                                    <label for="">Email or Phone</label>
                                    <input type="text" name="email_phone" id="email_phone" class="form-control" <?= (isset($_SESSION['emailphone']) ? 'value="' . $_SESSION['emailphone'] . '"' : '');
                                                                                                                unset($_SESSION['emailphone']); ?> placeholder="Enter email or phone" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="password">Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password" id="password" class="form-control" placeholder="*********" required>
                                        <button class="btn btn-outline-secondary border border-none" type="button" id="togglePassword">
                                            <i id="passwordIcon" class="bi bi-eye"></i>
                                        </button>
                                        <!-- <div class="input-group-append">
                                    </div> -->
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <a href="#" class="float-end">Forgot Password ?</a>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary" id="spinner_btn" onclick="showSpinner(this)">
                                        <span class="click-btn-text d-none mr-2">Signing...</span>
                                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                        <span class="button-text">Sign In</span>
                                    </button>
                                </div>
                                <div class="text-center mt-3">
                                    <h6>Don't have any account ?</h6>
                                    <a href="register.php" class="d-grid btn btn-success">Create Account</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php
    include('partials/javascripts.php');
    ?>
</body>

</html>