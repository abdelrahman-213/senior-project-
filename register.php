<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    // If logged in, redirect to welcome.php
    header("Location: welcome.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
                            <div class="mb-5 d-flex justify-content-center align-items-center"><img src="./assets/compiled/svg/logo.png" width="40px" height="40px" alt="" class="object-fit-contain">
                                <h1 class="ms-1">File Manager</h1>
                            </div>
                            <form class="row g-3" id="login_form" method="POST" action="php/auth/user_register.php">
                                <div class="col-md-12">
                                    <label for="">Full Name</label>
                                    <input type="text" name="name" id="name" <?= (isset($_SESSION['name']) ? 'value="' . $_SESSION['name'] . '"' : '') ?> class="form-control" placeholder="Enter fullname" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Email</label>
                                    <input type="email" name="email" id="email_phone" <?= (isset($_SESSION['email']) ? 'value="' . $_SESSION['email'] . '"' : '') ?> class="form-control" placeholder="Enter email" required>

                                </div>
                                <div class="col-md-12">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone" <?= (isset($_SESSION['phone']) ? 'value="' . $_SESSION['phone'] . '"' : '') ?> id="email_phone" class="form-control" placeholder="Enter phone number" required>
                                </div>

                                <div class="col-md-12">
                                    <label for="">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="*********" required>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success" id="spinner_btn" onclick="showSpinner(this)">
                                        <span class="click-btn-text d-none mr-2">Please wait...</span>
                                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                        <span class="button-text">Create account</span>
                                    </button>
                                </div>
                            </form>
                            <div class="text-center mt-4">
                                <h6>Already have an account ? <a href="index.php" class="text-decoration-none">Log In</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php
    // unset sessions 
    unset($_SESSION['name']);
    unset($_SESSION['email']);
    unset($_SESSION['phone']);

    include('partials/javascripts.php');
    ?>
</body>

</html>