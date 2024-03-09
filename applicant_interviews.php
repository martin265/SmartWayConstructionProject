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
    <div class="main-navigation-bar">
        <?php include("templates/header.php"); ?>
    </div>

    <div class="container-xxl">
        <div class="row">
            <div class="col-lg-12">
                <div class="interviews-panel">
                    <div class="interviews-panel-header">
                        <h1>take online interviews here</h1>
                    </div>

                    <div class="interviews-panel-cards">
                        <div class="interviews-panel-cards-1">
                            <div class="interviews-panel-cards-1-title">
                                <i class="bi bi-file-lock2"></i>
                            </div>

                            <div class="interviews-panel-cards-1-info">
                                <h1>secured</h1>
                            </div>
                        </div>
                        
                        <!-- =========== the other card here -->
                        <div class="interviews-panel-cards-2">
                            <div class="interviews-panel-cards-2-title">
                                <i class="bi bi-calculator"></i>
                            </div>

                            <div class="interviews-panel-cards-2-info">
                                <h1>auto mark</h1>
                            </div>
                        </div>

                        <!-- ============= the other card here -->
                        <div class="interviews-panel-cards-3">
                            <div class="interviews-panel-cards-3-title">
                                <i class="bi bi-layout-text-sidebar-reverse"></i>
                            </div>

                            <div class="interviews-panel-cards-3-info">
                                <h1>reviewd</h1>
                            </div>
                        </div>

                    </div>

                    <!-- ============= panel for the questions will be here -->
                    <div class="interview-questions-panel shadow-lg">
                        <div class="interview-questions-panel-title">
                            <h1>interview questions</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>