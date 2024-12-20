<?php include('partials/header.php'); ?>

<div id="main-content">
   

    <div class="page-heading">
        <div class="page-title mb-3">
            <div class="row">
                <div class="">
                    <h3><img src="assets/compiled/jpg/folder2.png" height="50px" width="50px" alt=""> All Folders
                    <a href="new_folder.php" class="btn btn-primary float-end"><i class="bi bi-folder-plus me-1"></i> New Folder</a>
                </h3>
                </div>
            </div>
        </div>
        <section id="content-types">
            <div class="row g-3">
                <?php
                include('widgets/search_files.php');
                $getFoldersListsql = "SELECT * from folders where folder_user = $userID AND folder_type = 'parent'";
                $getFoldersListresult = $conn->query($getFoldersListsql);
                include('widgets/folders_card.php');
               ?>

            </div>
        </section>

    </div>
</div>

<?php

include('partials/javascripts.php');
include('partials/body_closing.php'); ?>