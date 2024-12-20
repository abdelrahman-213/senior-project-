<?php include('partials/header.php'); ?>

<div id="main-content">
   
    <div class="page-heading">
        <div class="page-title mb-5">
            <div class="row align-items-center justify-content-between g-3">
                <div class="col-lg-6 col-md-8">
                    <div class="d-flex align-items-center">
                        <img src="assets/compiled/jpg/folder2.png" height="50px" width="50px" class="me-3" alt="">
                        <h3 class="text-capitalize mt-2">Image Gallery</h3>
                    </div>
                </div>
            </div>
        </div>
        <section id="content-types">
           
                <div class="mb-4" ID="ngy2p" data-nanogallery2='{
                        "thumbnailWidth": "auto",
                        "thumbnailLabel": {
                        "position": "overImageOnBottom"
                        },
                        "thumbnailHoverEffect2": "imageScaleIn80",
                        "thumbnailAlignment": "center",
                        "thumbnailOpenImage": true
                    }'>

                    <?php
                    // Fetch unprotected folders
                    $unprotectedFolders = fetchUnprotectedFolders();
                    foreach ($unprotectedFolders as $folder_id) {
                        // SQL query to select files from unprotected folders
                        $getImageGallerysql = "SELECT * FROM files INNER JOIN folders ON files.file_folder = folders.folder_id  WHERE file_user = $userID AND file_folder = $folder_id AND (file_path LIKE '%.jpg' OR file_path LIKE '%.jpeg' OR file_path LIKE '%.png' OR file_path LIKE '%.gif')";
                        $getImageGalleryresult = $conn->query($getImageGallerysql);

                        if ($getImageGalleryresult->num_rows > 0) {
                            while ($getImageGalleryrow = $getImageGalleryresult->fetch_assoc()) {
                                $fileId = $getImageGalleryrow['file_id'];
                                $folderID = $getImageGalleryrow['file_folder'];
                                $folderName = getFolderNamebyID($folderID);
                                $fileName = $getImageGalleryrow['file_name'];
                                $filePath = $getImageGalleryrow['file_path'];
                                $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
                                $fileDesc = $getImageGalleryrow['file_desc'];
                                $fileSize = $getImageGalleryrow['file_size'];
                                $uploadedDate = date("d M, y", strtotime($getImageGalleryrow['file_uploaded']));
                                $folderPath = generateFolderPath($folderID);
                                $folderPath = substr($folderPath, 6);
                                $complete_image_path = $folderPath . '' . $filePath;

                    ?>
                                <a href="<?= $complete_image_path ?>" data-ngThumb="<?= $complete_image_path ?>"> </a>
                    <?php
                            }
                        }
                    }
                    ?>


                </div>
           
        </section>

    </div>
</div>

<?php

include('partials/javascripts.php');
include('partials/body_closing.php'); ?>