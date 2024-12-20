<?php include('partials/header.php'); ?>

<div id="main-content">
   

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>My Logs</h3>
                </div>
            </div>
        </div>
        <section id="basic-vertical-layouts">
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-group rounded-3">
                                <?php
                                $sql = "SELECT * from user_logs where log_user = $userID ORDER BY log_id DESC LIMIT 50";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        $logTime = $row['log_time'];
                                        $formattedLogs = date("d M Y \a\\t h:i A", strtotime($logTime));
                                ?>

                                        <li class="list-group-item">
                                            <?= $formattedLogs ?>
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