<?php include('partials/header.php'); ?>

<div id="main-content">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Change Password </h3>
                </div>
            </div>
        </div>
        <section id="basic-vertical-layouts">
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="php/auth/change_password.php" class="row g-3" method="POST">
                                <div class="col-md-12">
                                    <label for="newpassword">New Password</label>
                                    <input type="password" name="newpassword" id="newpassword" placeholder="Enter new password" class="form-control" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="confirmpassword">Confirm Password</label>
                                    <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm new password" class="form-control" required>
                                </div>
                                <div class="message text-danger form-text" style="display: none;">
                                    <p class="mb-0 fw-semibold"><i class="bi bi-x"></i> New password and confirm password not matched.</p>
                                </div>
                                <div class="length_message text-danger form-text" style="display: none;">
                                    <p class="mb-0 fw-semibold"><i class="bi bi-x"></i> Password should be atleast 8 digits..</p>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Account Password</label>
                                    <input type="password" name="accountpassword" placeholder="Enter account password" class="form-control" required>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary" id="spinner_btn" onclick="showSpinner(this)">
                                        <span class="click-btn-text d-none mr-2">Saving...</span>
                                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                        <span class="button-text">Save Changes</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    const newPasswordInput = document.getElementById('newpassword');
    const confirmPasswordInput = document.getElementById('confirmpassword');
    const messageElement = document.querySelector('.message');
    const lengthMessage = document.querySelector('.length_message');

    function checkPasswordMatch() {
        const newPassword = newPasswordInput.value.trim();
        const confirmPassword = confirmPasswordInput.value.trim();

        if (newPassword !== '' && confirmPassword !== '') {
            if (newPassword === confirmPassword) {
                if (newPassword.length < 8) {
                    lengthMessage.style.display = 'block';
                    messageElement.style.display = 'none';
                } else {
                    lengthMessage.style.display = 'none';
                    messageElement.style.display = 'none';
                }
            } else {
                messageElement.style.display = 'block';
                lengthMessage.style.display = 'none';
            }
        } else {
            messageElement.style.display = 'none';
            lengthMessage.style.display = 'none';
        }
    }

    newPasswordInput.addEventListener('input', checkPasswordMatch);
    confirmPasswordInput.addEventListener('input', checkPasswordMatch);
</script>


<?php
include('partials/javascripts.php');
include('partials/body_closing.php');
?>