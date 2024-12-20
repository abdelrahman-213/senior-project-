<?php include('partials/header.php'); ?>

<div id="main-content">
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create New Folder</h4>
                    </div>
                    <div class="card-body">
                        <form class="form form-vertical" method="POST" action="php/folders/new_folder.php" autocomplete="off">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Folder Name <span class="text-danger">*</span></label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" <?= (isset($_SESSION['new_folder_name']) ? 'value="' . $_SESSION['new_folder_name'] . '"' : '');
                                                                                        unset($_SESSION['new_folder_name']); ?> name="folder_name" placeholder="Folder Name" id="first-name-icon" required>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-folder"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="email-id-icon">Password</label>
                                            <div class="position-relative">
                                                <input type="password" class="form-control" name="password" placeholder="Enter Password Key" id="email-id-icon">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-shield-lock"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-text"><b>Note:</b> The folder PIN must be at least 6 digits long. If you do not wish to set a PIN, leave it blank.</div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end mt-3">
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        <button type="submit" class="btn btn-primary me-1 mb-1" id="spinner_btn" onclick="showSpinner(this)">
                                            <span class="click-btn-text d-none mr-2">Please wait...</span>
                                            <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                            <span class="button-text">Create Folder</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php

include('partials/javascripts.php');
include('partials/body_closing.php'); ?>