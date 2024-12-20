<?php include('partials/header.php'); ?>

<div id="main-content">

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Friends List</h3>
                </div>
            </div>
        </div>
        <section id="basic-vertical-layouts">
            <div class="row g-3">
                <?php
                $getFriendsListsql = "SELECT * FROM friends INNER JOIN users ON users.user_id = friends.fl_friendid WHERE fl_user = $userID";


                $getFriendsListresult = $conn->query($getFriendsListsql);

                if ($getFriendsListresult->num_rows > 0) {
                    // output data of each row
                    while ($getFriendsListrow = $getFriendsListresult->fetch_assoc()) {
                        $friendID = $getFriendsListrow['fl_id'];
                        $userFullname = $getFriendsListrow['user_fullname'];
                        $friendsDate = $getFriendsListrow['fl_date'];
                ?>
                        <div class="col-lg-5 col-xl-4 col-xxl-3 col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="avatar avatar-xl me-3">
                                        <img src="./assets/compiled/jpg/3.jpg" alt="" srcset="">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="text-capitalize"><?= $userFullname ?></h5>
                                    <form action="1" method="POST">
                                        <input type="hidden" name="friendID" value="<?= $friendID ?>">
                                        <button type="submit" class="btn btn-danger btn-sm" id="spinner_btn" onclick="showSpinner(this)">
                                            <span class="click-btn-text d-none mr-2">Removing...</span>
                                            <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                            <span class="button-text">Remove Friend</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo  blank_page("No friends found !", "no_data.png");
                }
                ?>

            </div>
        </section>
    </div>
</div>

<?php

include('partials/javascripts.php');
include('partials/body_closing.php'); ?>