<?php include('partials/header.php'); ?>

<div id="main-content">


    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Find Friends</h3>
                </div>
            </div>
        </div>
        <section id="basic-vertical-layouts">
            <div class="row g-3">
                <?php
                $getUsersListsql = "SELECT * FROM users WHERE user_id != $userID AND user_id NOT IN (SELECT fl_friendid FROM friends WHERE fl_user = $userID) AND user_id NOT IN (SELECT fr_from FROM friend_request WHERE fr_to = $userID AND fr_status = 0)";


                $getUsersListresult = $conn->query($getUsersListsql);

                if ($getUsersListresult->num_rows > 0) {
                    // output data of each row
                    while ($getUsersListrow = $getUsersListresult->fetch_assoc()) {
                        $friendID = $getUsersListrow['user_id'];
                        $userFullname = $getUsersListrow['user_fullname'];
                ?>
                        <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="avatar avatar-xl me-3">
                                        <img src="./assets/compiled/jpg/3.jpg" alt="" srcset="">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="text-capitalize"><?= $userFullname ?></h5>
                                    <?php
                                    if (isFriendRequestSent($userID, $friendID) == true) {
                                    ?>
                                        <form action="php/friends/cancel_friend_request.php" method="POST">
                                            <input type="hidden" name="requestID" value="<?= getFriendRequestID($userID, $friendID) ?>">
                                            <input type="hidden" name="fr_from" value="<?= $userID ?>">
                                            <input type="hidden" name="fr_to" value="<?= $friendID ?>">
                                            <button type="submit" class="btn btn-primary" id="spinner_btn" onclick="showSpinner(this)">
                                                <span class="click-btn-text d-none mr-2">Cancelling...</span>
                                                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                                <span class="button-text">Cancel Request</span>
                                            </button>
                                        </form>
                                    <?php
                                    } else {
                                    ?>
                                        <form action="php/friends/send_friend_request.php" method="POST">
                                            <input type="hidden" name="fr_from" value="<?= $userID ?>">
                                            <input type="hidden" name="fr_to" value="<?= $friendID ?>">
                                            <button type="submit" class="btn btn-primary" id="spinner_btn" onclick="showSpinner(this)">
                                                <span class="click-btn-text d-none mr-2">Sending...</span>
                                                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                                <span class="button-text">Send Request</span>
                                            </button>
                                        </form>
                                    <?php
                                    }
                                    ?>


                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo blank_page("No users found !", "nousers.png");
                }
                ?>

            </div>
        </section>
    </div>
</div>

<?php

include('partials/javascripts.php');
include('partials/body_closing.php'); ?>