<?php include('partials/header.php');

?>
<div id="main-content">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Release Notes</h3>
                </div>
            </div>
        </div>
        <section id="basic-vertical-layouts">
            <div class="row">
                <div class="col-md-12">
                    <!-- Version 2.2.1 -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Version 2.2.1 <span class="badge text-bg-primary ms-2">New</span></h4>
                            <p class="my-0 small fw-bold text-muted">13 Sept 2024</p>
                        </div>
                        <div class="card-body">
                            <h5>New Features:</h5>
                            <ul>
                                <li>Introduced the ability for users to select multiple files simultaneously and efficiently share them into sharefolders in a single action. This enhancement simplifies the process of managing file sharing by allowing bulk operations, which saves time and effort.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Version 2.2.0 -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Version 2.2.0 <span class="badge text-bg-primary ms-2">New</span></h4>
                            <p class="my-0 small fw-bold text-muted">13 Sept 2024</p>
                        </div>
                        <div class="card-body">
                            <h5>New Features:</h5>
                            <ul>
                                <li>Enhanced functionality to enable users to select and delete multiple files simultaneously, making file management more efficient.</li>
                                <li>Introduced a "Select All" button to streamline the process of checking or unchecking all files at once, simplifying bulk file operations.</li>
                            </ul>
                        </div>
                    </div>




                    <!-- Version 2.1.1 -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Version 2.1.1</h4>
                        </div>
                        <div class="card-body">
                            <h5>Minor Bug Fixes:</h5>
                            <ul>
                                <li>Resolved an issue preventing file downloads from the dashboard.</li>
                                <li>Fixed a bug that failed to download the renamed files.</li>
                                <li>Introduced a new version page to display the latest updates and changes made to the project.</li>

                            </ul>
                        </div>
                    </div>

                    <!-- Version 2.1.0 -->
                    <div class="card mt-4">
                        <div class="card-header">
                            <h4>Version 2.1.0</h4>
                        </div>
                        <div class="card-body">
                            <h5>New Feature Update 🔔🔔</h5>
                            <p>We have significantly improved the security of our File Manager login system. This update enhances protection against brute force attacks, SQL injection, and XSS attacks.</p>
                            <ul>
                                <li><strong>Login Attempts Mechanism:</strong> To mitigate brute force attacks, we have implemented a limit of 5 login attempts per user. After reaching this limit, the account will be temporarily locked for 5 minutes.</li>
                                <li><strong>Input Value Sanitization:</strong> A new function has been added to sanitize input values, providing robust defense against SQL injection and XSS attacks.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Version 2.0 -->
                    <div class="card mt-4">
                        <div class="card-header">
                            <h4>Version 2.0</h4>
                        </div>
                        <div class="card-body">
                            <h5>New Features:</h5>
                            <ul>
                                <li><strong>Enhanced Search Functionality:</strong> A powerful search feature has been introduced, allowing users to quickly locate files and folders.</li>
                                <li><strong>Subfolder Creation:</strong> Users can now create nested folders, enhancing organizational capabilities within the File Manager.</li>
                                <li><strong>File Relocation:</strong> Seamlessly move files between different folders with improved ease.</li>
                                <li><strong>Bulk File Upload:</strong> Upload multiple files simultaneously, streamlining the file management process.</li>
                                <li><strong>Integrated Image Gallery:</strong> All image files from various folders are aggregated into a comprehensive gallery view.</li>
                                <li><strong>Activity Logs:</strong> Access a detailed log of your login history directly within your account.</li>
                                <li><strong>Account Activity Tracking:</strong> Monitor all actions performed within your account for enhanced oversight and security.</li>
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