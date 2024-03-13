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
        <div class="side-navigation-area">
            <?php include("administrator_sidebar.php"); ?>
        </div>

        <!-- =============== the main content will be here for administrator dashboard ====== -->
        <div class="content-area">
            <div class="container-xxl">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-dashboard shadow-sm">
                            <div class="main-dashboard-cards">
                                <div class="main-dashboard-questions">
                                    <div class="main-dashboard-questions-title">
                                        <h1>questions</h1>
                                    </div>
                                    <div class="main-dashboard-question-icon">
                                        <i class="bi bi-patch-question-fill"></i>
                                    </div>
                                </div>
                                
                                <div class="main-dashboard-jobs">2</div>
                               
                                <div class="main-dashboard-applicants">3</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>