<?php include('partials/header.php'); ?>

<div id="main-content">
    <div class="page-heading">
        <div class="page-title mb-5">
            <div class="row align-items-center justify-content-between g-3">
                <div class="col-lg-6 col-md-8">
                    <div class="d-flex align-items-center">
                        <img src="assets/compiled/jpg/sharefolder.png" height="50px" width="50px" class="me-3" alt="">
                        <h3 class="text-capitalize mt-2"><?= getShareFolderNamebyID($_GET['sharefolder']); ?></h3>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4 text-end">
                    <?php include('widgets/sharefolder_permissions.php'); ?>
                </div>
            </div>
        </div>
        <?php
        // add member modal 
        include('modals/add_sharefoler_member.php');
        include('modals/sharefolder_settings.php');

        if (isset($_GET['token']) && isset($_SESSION['sharefolder_token'])) {
            $token = $_GET['token'];
            $storedToken = $_SESSION['sharefolder_token'];
            // Compare the tokens
            if ($token === $storedToken) {
                // Token matches, proceed with viewing the folder content
                include('widgets/share_folder_content.php');
            } else {
                // Token does not match, possible unauthorized access attempt
                include('widgets/share_folder_unauthorized_access.php');
            }
        } else {
            // Token is missing in the URL or session, possible unauthorized access attempt
            include('widgets/share_folder_unauthorized_access.php');
        }

        ?>

    </div>
</div>

<?php

include('partials/javascripts.php');
include('partials/body_closing.php'); ?>