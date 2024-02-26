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

        <!-- ============ main content container will be here ============ -->
        <div class="content-area">
            <div class="container-xxl">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="interview-questions-panel">
                            <div class="interview-questions-panel-title">
                                <h1>interview questions</h1>
                            </div>

                            <!-- =============== main panel for the questions here ========= -->
                            <div class="interview-questions-panel-form">
                                <form action="administrator_interview_questions.php" method="POST">
                                    <div class="row">
                                        <div class="col">
                                            <label for="ForQuestion1" class="fw-bold ps-2">Question 1</label>
                                            <div class="input-group">
                                                <input type="text" name="question_1" class="form-control form-control-lg">
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label for="ForQuestion1" class="fw-bold ps-2">Question 1</label>
                                            <div class="input-group">
                                                <input type="text" name="question_1" class="form-control form-control-lg">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>