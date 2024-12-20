<section id="content-types">
    <div class="row g-3">
        <div class="col-md-12">
            <div class="row g-3">
                <?php
                $folderID = getOriginalFolderID($_GET['folderID']);
                $getFoldersListsql = "SELECT * from folders where folder_user = $userID AND folder_type = 'subfolder' AND folder_parent = $folderID";
                $getFoldersListresult = $conn->query($getFoldersListsql);
                include('widgets/folders_card.php');
                ?>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row g-3">
                <?php
                $folderID = getOriginalFolderID($_GET['folderID']);
                $getFilesListsql = "SELECT * from files where file_user = $userID AND file_folder = $folderID";
                $getFilesListresult = $conn->query($getFilesListsql);

                if ($getFilesListresult->num_rows > 0) :
                    include('widgets/files_list.php');
                endif;
                ?>
            </div>
        </div>

    </div>
</section>