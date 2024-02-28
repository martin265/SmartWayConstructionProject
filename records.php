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