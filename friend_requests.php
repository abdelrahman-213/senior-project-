<?php include('partials/header.php'); ?>

<div id="main-content">


    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3> Friend Requests</h3>
                </div>
            </div>
        </div>
        <section id="basic-vertical-layouts">
            <div class="row g-3">
                <?php
                $getFriendRequestsListsql = "SELECT * FROM friend_request INNER JOIN users ON users.user_id = friend_request.fr_from WHERE fr_to = $userID AND fr_status = 0";
                $getFriendRequestsListresult = $conn->query($getFriendRequestsListsql);

                if ($getFriendRequestsListresult->num_rows > 0) {
                    // output data of each row
                    while ($getFriendRequestsListrow = $getFriendRequestsListresult->fetch_assoc()) {
                        $requestID = $getFriendRequestsListrow['fr_id'];
                        $friendID = $getFriendRequestsListrow['user_id'];
                        $userFullname = $getFriendRequestsListrow['user_fullname'];
                        $requestStatus = $getFriendRequestsListrow['fr_status'];
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
                                    <?php
                                    if ($requestStatus == 0) {
                                    ?>
                                        <div class="d-flex gap-2">
                                            <form action="php/friends/accept_friend_request.php" method="POST">
                                                <input type="hidden" name="requestID" value="<?= $requestID ?>">
                                                <button type="submit" class="btn btn-success" id="spinner_btn" onclick="showSpinner(this)">
                                                    <span class="click-btn-text d-none mr-2">Accepting...</span>
                                                    <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                                    <span class="button-text">Accept</span>
                                                </button>
                                            </form>
                                            <form action="php/friends/cancel_friend_request.php" method="POST">
                                                <input type="hidden" name="requestID" value="<?= $requestID ?>">
                                                <input type="hidden" name="fr_from" value="<?= $userID ?>">
                                                <input type="hidden" name="fr_to" value="<?= $friendID ?>">
                                                <button type="submit" class="btn btn-danger" id="spinner_btn" onclick="showSpinner(this)">
                                                    <span class="click-btn-text d-none mr-2">Rejecting...</span>
                                                    <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                                    <span class="button-text">Reject</span>
                                                </button>
                                            </form>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo  blank_page("No requests found !", "no_data.png");
                }
                ?>

            </div>
        </section>
    </div>
</div>

<?php

include('partials/javascripts.php');
include('partials/body_closing.php'); ?>