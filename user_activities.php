<?php include('partials/header.php'); ?>

<div id="main-content">


    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Account Activities</h3>
                </div>
            </div>
        </div>
        <section id="basic-vertical-layouts">
            <div class="row">

                <div class="col-md-12 col-lg-8 col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            if (isset($_SESSION['activity_filter_from']) && isset($_SESSION['activity_filter_to'])) {
                                // Construct the SQL query with the date range filter
                                $fromDate = mysqli_real_escape_string($conn, $_SESSION['activity_filter_from']);
                                $toDate = mysqli_real_escape_string($conn, $_SESSION['activity_filter_to']);

                                $note  = "Search Result From <b>" . date("d M Y", strtotime($fromDate)) . "</b> To <b>" . date("d M Y", strtotime($toDate)) . "</b> <br> <a href='php/filters/clear_activity_filter.php'>Clear results</a>";

                                $sql = "SELECT * FROM user_activities WHERE activity_user_id = $userID AND timestamp >= '$fromDate' AND timestamp <= '$toDate' ORDER BY activity_id DESC";
                            } else {
                                $note = "<b>Note: </b> Only Last 50 activities. For more search by date range.";
                                // If the form is not submitted or date range is not selected, fetch last 50 activities
                                $sql = "SELECT * FROM user_activities WHERE activity_user_id = $userID ORDER BY activity_id DESC LIMIT 50";
                            }


                            $result = $conn->query($sql);

                            // Display activity logs
                            ?>
                            <form action="php/filters/filter_activities.php" method="post" class="row g-3 mb-3 d-block d-lg-none">
                                <div class="col-md-12">
                                    <label for="">From</label>
                                    <input type="date" name="from" <?= (isset($_SESSION['activity_filter_from']) ? 'value="' . $_SESSION['activity_filter_from'] . '"' : '') ?> class="form-control" max="<?= date('Y-m-d') ?>" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="">To</label>
                                    <input type="date" name="to" <?= (isset($_SESSION['activity_filter_to']) ? 'value="' . $_SESSION['activity_filter_to'] . '"' : '') ?> class="form-control" required>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary" id="spinner_btn" onclick="showSpinner(this)">
                                        <span class="click-btn-text d-none mr-2">Searching...</span>
                                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                        <span class="button-text">Search</span>
                                    </button>
                                </div>
                            </form>
                            <form action="php/filters/filter_activities.php" method="post" class="row mb-3 d-none d-lg-block">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="date" name="from" <?= (isset($_SESSION['activity_filter_from']) ? 'value="' . $_SESSION['activity_filter_from'] . '"' : '') ?> class="form-control" max="<?= date('Y-m-d') ?>" required>
                                        <input type="date" name="to" <?= (isset($_SESSION['activity_filter_to']) ? 'value="' . $_SESSION['activity_filter_to'] . '"' : '') ?> class="form-control" required>

                                        <button type="submit" class="btn btn-primary" id="filderActivities2" onclick="showSpinner(this)">
                                        <span class="click-btn-text d-none mr-2">Searching...</span>
                                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                        <span class="button-text">Search</span>
                                    </button>
                                    </div>
                                </div>
                            </form>
                            <p><?= $note ?></p>
                            <ul class="list-group rounded-3">
                                <?php
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        $logTime = $row['timestamp'];
                                        $activity_details = $row['activity_details'];
                                        $formattedLogs = date("d M Y \a\\t h:i A", strtotime($logTime));
                                ?>

                                        <li class="list-group-item">
                                            <p class="mb-0 small"><?= $formattedLogs ?></p>
                                            <p class="mb-0"><i class="bi bi-bezier2 fs-5 me-2"></i> <?= $activity_details ?></p>
                                        </li>
                                <?php
                                    }
                                } else {
                                    echo "No logs found !";
                                }
                                ?>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?php

include('partials/javascripts.php');
include('partials/body_closing.php'); ?>