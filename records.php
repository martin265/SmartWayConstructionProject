<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="main-content-container">
        <!-- ========== main content for the page will be here ====== -->
        <div class="side-navigation-area">
            <?php include("administrator_sidebar.php"); ?>
        </div>

        <!-- ============ the main content area will be here ======== -->
        <div class="content-area">
            <div class="container-xxl">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="all-records-panel">
                            
                            <div class="all-records-panel-title">
                                <h1>manage all records</h1>
                            </div>

                            <div class="all-records-cards">

                                <div class="all-records-single-card">
                                    <div class="all-records-single-card-title">
                                        <h1>available jobs</h1>
                                    </div>

                                    <div class="all-records-single-card-icon">
                                        <i class="fi fi-tr-briefcase-blank"></i>
                                    </div>

                                    <div class="all-records-single-card-details">
                                        <p>
                                            Click on the button to access the records
                                            in the jobs table, the table will allow you to delete 
                                            the record. the main purpose is to make sure that only one job 
                                            is available in the database at a time, so that there is confusion
                                            with the other jobs.
                                        </p>
                                    </div>

                                    <!-- =============== the section for the redirect button will be here =========  -->
                                    <div class="redirect-jobs-button">
                                        <a href="administrator_job_records.php" class="btn btn-lg btn-warning">
                                            <i class="bi bi-box-arrow-right me-2"></i> Check Available Jobs
                                        </a>
                                    </div>
                                </div>

                                <!-- ============== the other card will be here ===========  -->

                                <div class="all-records-single-card">
                                    <div class="all-records-single-card-title">
                                        <h1>available Questions</h1>
                                    </div>

                                    <div class="all-records-single-card-icon">
                                        <i class="bi bi-patch-question text-success"></i> 
                                    </div>

                                    <div class="all-records-single-card-details">
                                        <p>
                                            Click on the button to access the records
                                            in the jobs table, the table will allow you to delete 
                                            the record. the main purpose is to make sure that only one job 
                                            is available in the database at a time, so that there is confusion
                                            with the other jobs.
                                        </p>
                                    </div>

                                    <!-- =============== the section for the redirect button will be here =========  -->
                                    <div class="redirect-jobs-button">
                                        <a href="administrator_question_records.php" class="btn btn-lg btn-warning">
                                            <i class="bi bi-patch-question me-2"></i> Check Available Questions
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>