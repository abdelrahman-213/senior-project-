<?php include('partials/header.php'); ?>

<div id="main-content">
   

    <div class="page-heading">
        <div class="page-title mb-3">
            <div class="row">
                <div class="">
                    <h3><img src="assets/compiled/jpg/sharefolder.png" height="50px" width="50px" alt=""> My Sharefolders
                    </h3>
                    <a class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#newsharefolder">
                        <i class="bi bi-plus"></i> New Sharefolder
                    </a>
                    <?php include('modals/new_sharefolder.php'); ?>
                </div>
            </div>
        </div>
        <section id="content-types">
            <div class="row g-3">
                <?php
                $getFoldersListsql = "SELECT DISTINCT sharefolder.*
              FROM sharefolder
              LEFT JOIN sharefolder_members ON sharefolder_members.sfm_sfid = sharefolder.sf_id
              WHERE sharefolder.sf_user = $userID OR sharefolder_members.sfm_memberid = $userID ORDER BY sf_name ASC";
                $getFoldersListresult = $conn->query($getFoldersListsql);
                include('widgets/share_folders_card.php');
                ?>
            </div>
        </section>
    </div>
</div>

<?php

include('partials/javascripts.php');
include('partials/body_closing.php'); ?>