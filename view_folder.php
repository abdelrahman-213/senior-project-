<?php include('partials/header.php'); ?>

<div id="main-content">
    <div class="page-heading">
        <div class="page-title mb-5">
            <div class="row align-items-center justify-content-between g-3">
                <div class="col-lg-6 col-md-6">
                    <div class="d-flex align-items-center">
                        <img src="assets/compiled/jpg/folder2.png" height="50px" width="50px" class="me-3" alt="">
                        <h3 class="text-capitalize mt-2"><?= getFolderNamebyID(getOriginalFolderID($_GET['folderID'])); ?></h3>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12  text-lg-end">
                    <a href="javascript:void(0);" class="btn btn-primary  mb-4" data-bs-toggle="modal" data-bs-target="#new_subfolder-<?= getOriginalFolderID($_GET['folderID']) ?>"><i class="bi bi-folder-plus me-1"></i> Add Folder</a>
                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#upload_document-<?= getOriginalFolderID($_GET['folderID']) ?>" class="btn btn-success  mb-4"><i class="fa-solid fa-upload"></i> Upload File</a>
                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#upload_bulk_document-<?= getOriginalFolderID($_GET['folderID']) ?>" class="btn btn-light mb-4"><i class="fa-solid fa-upload"></i> Bulk Upload</a>

                </div>
            </div>
        </div>
        <div class="btn-group" role="group" aria-label="Basic example" id="select_share_btn_group" style="display: none;">
            <button type="button" class="btn btn-primary rounded" id="select_all_button"><i class="fa-regular fa-square-check"></i> Select All</button>
            <button type="button" data-bs-toggle="modal" data-bs-target="#share_multi_files" class="btn btn-success rounded"><i class="bi bi-share me-1"></i> Share</button>
            <button type="button" data-bs-toggle="modal" data-bs-target="#delete_multi_files" class="btn btn-danger rounded"><i class="fa-solid fa-trash"></i> Delete Files</button>
        </div>
        <?php
        // create new sub folder
        include('modals/new_subfolder.php');
        // new file upload modal 
        include('modals/upload_new_file.php');
        include('modals/upload_bulk_files.php');
        include('modals/delete_multi_files.php');
        include('modals/share_multi_files.php');

        if (isValidFolderID($_GET['folderID']) && isset($_SESSION['session_folderID'])) {
            if (isFolderEncrypted(getOriginalFolderID($_GET['folderID']))) {
                if (isset($_GET['token']) && isset($_SESSION['verification_token'])) {
                    $token = $_GET['token'];
                    $storedToken = $_SESSION['verification_token'];

                    // Compare the tokens
                    if ($token === $storedToken) {
                        // Token matches, proceed with viewing the folder content
                        include('folder_content.php');
                    } else {
                        // Token does not match, possible unauthorized access attempt
                        include('widgets/folder_unauthorized_access.php');
                    }
                } else {
                    // Token is missing in the URL or session, possible unauthorized access attempt
                    include('widgets/folder_unauthorized_access.php');
                }
            } else {
                // Folder is not encrypted, proceed with viewing the folder content
                include('folder_content.php');
            }
        } else {
            // Invalid folder ID or session folder ID is not set
            include('widgets/folder_unauthorized_access.php');
        }

        ?>

    </div>
    <!-- <script>
        document.getElementById('show_checkboxes').addEventListener('click', function() {
            const checkboxContainer = document.getElementById('delete_file_btn');
            if (checkboxContainer.style.display === 'none') {
                checkboxContainer.style.display = 'block';
            } else {
                checkboxContainer.style.display = 'none';
            }
        });
    </script> -->
</div>

<?php

include('partials/javascripts.php');
include('partials/body_closing.php'); ?>