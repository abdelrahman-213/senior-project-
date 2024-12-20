<?php include('partials/header.php'); 

if (getUserRole($userID) == 0) {
    // users dashboard 
    include('partials/dashboard/user_dasboard.php');
}elseif (getUserRole($userID) == 1) {
    // admin dashboard
    include('partials/dashboard/admin_dashboard.php');
}
else {
    echo "Unknown Role Found !";
}

include('partials/javascripts.php');
include('partials/body_closing.php'); ?>