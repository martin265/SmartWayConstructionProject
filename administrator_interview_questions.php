<?php

// validating the questions here ======= //
// validating the input fields here ============== //
function validateInputFields($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question_1 = validateInputFields($_POST["question_1"]);
    $question_2 = validateInputFields($_POST["question_2"]);
    $question_3 = validateInputFields($_POST["question_3"]);
    $question_4 = validateInputFields($_POST["question_4"]);
    $question_5 = validateInputFields($_POST["question_5"]);
    $question_6 = validateInputFields($_POST["question_6"]);
    $question_7 = validateInputFields($_POST["question_7"]);
    $question_8 = validateInputFields($_POST["question_8"]);
    $question_9 = validateInputFields($_POST["question_9"]);
    $question_10 = validateInputFields($_POST["question_10"]);

}

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
                                            <label for="ForQuestion1" class="fw-bold ps-2">Question 2</label>
                                            <div class="input-group">
                                                <input type="text" name="question_2" class="form-control form-control-lg">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ===================== the other row for the question will be here ====== -->
                                    <div class="row">
                                        <div class="col">
                                            <label for="ForQuestion1" class="fw-bold ps-2">Question 3</label>
                                            <div class="input-group">
                                                <input type="text" name="question_3" class="form-control form-control-lg">
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label for="ForQuestion1" class="fw-bold ps-2">Question 4</label>
                                            <div class="input-group">
                                                <input type="text" name="question_4" class="form-control form-control-lg">
                                            </div>
                                        </div>
                                    </div>


                                    <!-- ===================== the other row for the question will be here ====== -->
                                    <div class="row">
                                        <div class="col">
                                            <label for="ForQuestion1" class="fw-bold ps-2">Question 5</label>
                                            <div class="input-group">
                                                <input type="text" name="question_5" class="form-control form-control-lg">
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label for="ForQuestion1" class="fw-bold ps-2">Question 6</label>
                                            <div class="input-group">
                                                <input type="text" name="question_6" class="form-control form-control-lg">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ===================== the other row for the question will be here ====== -->
                                    <div class="row">
                                        <div class="col">
                                            <label for="ForQuestion1" class="fw-bold ps-2">Question 7</label>
                                            <div class="input-group">
                                                <input type="text" name="question_8" class="form-control form-control-lg">
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label for="ForQuestion1" class="fw-bold ps-2">Question 8</label>
                                            <div class="input-group">
                                                <input type="text" name="question_8" class="form-control form-control-lg">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ===================== the other row for the question will be here ====== -->
                                    <div class="row">
                                        <div class="col">
                                            <label for="ForQuestion1" class="fw-bold ps-2">Question 9</label>
                                            <div class="input-group">
                                                <input type="text" name="question_9" class="form-control form-control-lg">
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label for="ForQuestion1" class="fw-bold ps-2">Question 10</label>
                                            <div class="input-group">
                                                <input type="text" name="question_10" class="form-control form-control-lg">
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <!-- ================ the row for the button will be here ======== -->
                                    <div class="save-questions-button mt-4">
                                        <button type="submit" name="save_questions" class="btn btn-primary btn-lg">
                                            <i class="bi bi-save me-2"></i>Save Questions
                                        </button>
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