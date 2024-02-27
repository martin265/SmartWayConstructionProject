<?php
include("Models/Question.php");
// validating the questions here ======= //
// validating the input fields here ============== //
function validateInputFields($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

// ============= the array for the errors here ============= //
$all_errors = array(
    "question_1"=>"",
    "question_2"=>"",
    "question_3"=>"",
    "question_4"=>"",
    "question_5"=>"",
    "question_6"=>"",
    "question_7"=>"",
    "question_8"=>"",
    "question_9"=>"",
    "question_10"=>"",
);


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

    // ===========checking if the fields are empty here ============ //
    if (isset($_POST["save_questions"])) {

        if (empty($_POST["question_1"])) {
            $all_errors["question_1"] = "add the question before you proceed please";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $question_1)) {
                $all_errors["question_1"] = "all questions should be letters please";
            }
        }

        // ============ the other validations will be here ================ //
        if (empty($_POST["question_2"])) {
            $all_errors["question_2"] = "add the question before you proceed please";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $question_2)) {
                $all_errors["question_2"] = "all questions should be letters please";
            }
        }

        // ============ the other validations will be here ================ //
        if (empty($_POST["question_3"])) {
            $all_errors["question_3"] = "add the question before you proceed please";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $question_3)) {
                $all_errors["question_3"] = "all questions should be letters please";
            }
        }

        // ============ the other validations will be here ================ //
        if (empty($_POST["question_4"])) {
            $all_errors["question_4"] = "add the question before you proceed please";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $question_4)) {
                $all_errors["question_4"] = "all questions should be letters please";
            }
        }

        // ============ the other validations will be here ================ //
        if (empty($_POST["question_5"])) {
            $all_errors["question_5"] = "add the question before you proceed please";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $question_5)) {
                $all_errors["question_5"] = "all questions should be letters please";
            }
        }

        // ============ the other validations will be here ================ //
        if (empty($_POST["question_6"])) {
            $all_errors["question_6"] = "add the question before you proceed please";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $question_6)) {
                $all_errors["question_6"] = "all questions should be letters please";
            }
        }


        // ============ the other validations will be here ================ //
        if (empty($_POST["question_7"])) {
            $all_errors["question_7"] = "add the question before you proceed please";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $question_7)) {
                $all_errors["question_7"] = "all questions should be letters please";
            }
        }


        // ============ the other validations will be here ================ //
        if (empty($_POST["question_8"])) {
            $all_errors["question_8"] = "add the question before you proceed please";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $question_8)) {
                $all_errors["question_8"] = "all questions should be letters please";
            }
        }


        // ============ the other validations will be here ================ //
        if (empty($_POST["question_9"])) {
            $all_errors["question_9"] = "add the question before you proceed please";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $question_9)) {
                $all_errors["question_9"] = "all questions should be letters please";
            }
        }


        // ============ the other validations will be here ================ //
        if (empty($_POST["question_10"])) {
            $all_errors["question_10"] = "add the question before you proceed please";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $question_10)) {
                $all_errors["question_10"] = "all questions should be letters please";
            }
        }
        
        // ========== checking if the form has errors =========== //
        if (array_filter($all_errors)) {
            $error_message = "the form appears to have some errors";
        }
        else {
            // saving the questions details here ======== //
            $question_1 = isset($_POST["question_1"]) ? mysqli_real_escape_string($conn, $_POST["question_1"]) : "";
            $question_2 = isset($_POST["question_2"]) ? mysqli_real_escape_string($conn, $_POST["question_2"]) : "";
            $question_3 = isset($_POST["question_3"]) ? mysqli_real_escape_string($conn, $_POST["question_3"]) : "";
            $question_4 = isset($_POST["question_4"]) ? mysqli_real_escape_string($conn, $_POST["question_4"]) : "";
            $question_5 = isset($_POST["question_5"]) ? mysqli_real_escape_string($conn, $_POST["question_5"]) : "";
            $question_6 = isset($_POST["question_6"]) ? mysqli_real_escape_string($conn, $_POST["question_6"]) : "";
            $question_7 = isset($_POST["question_7"]) ? mysqli_real_escape_string($conn, $_POST["question_7"]) : "";
            $question_8 = isset($_POST["question_8"]) ? mysqli_real_escape_string($conn, $_POST["question_8"]) : "";
            $question_9 = isset($_POST["question_9"]) ? mysqli_real_escape_string($conn, $_POST["question_9"]) : "";
            $question_10 = isset($_POST["question_10"]) ? mysqli_real_escape_string($conn, $_POST["question_10"]) : "";
            // ============== creating the object for the class here =========== //
            $question = new Question(
                $question_1,
                $question_2,
                $question_3,
                $question_4,
                $question_5,
                $question_6,
                $question_7,
                $question_8,
                $question_9,
                $question_10,
            );

            // inserting the records here =========== //
            $question->saveInterviewQuestions($conn);
            $success_message = "questions saved successfully";
        }
    }

}


// ================ saving the answers for the questions here ============== //
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $answer_1 = validateInputFields($_POST["answer_1"]);
    $answer_2 = validateInputFields($_POST["answer_2"]);
    $answer_3 = validateInputFields($_POST["answer_3"]);
    $answer_4 = validateInputFields($_POST["answer_4"]);
    $answer_5 = validateInputFields($_POST["answer_5"]);
    $answer_6 = validateInputFields($_POST["answer_6"]);
    $answer_7 = validateInputFields($_POST["answer_7"]);
    $answer_8 = validateInputFields($_POST["answer_8"]);
    $answer_9 = validateInputFields($_POST["answer_9"]);
    $answer_10 = validateInputFields($_POST["answer_10"]);

    // ============= getting the inputs from the form here =========== //
    $answer_1 = isset($conn, $_POST["answer_1"]) ? mysqli_real_escape_string($conn, $_POST["answer_1"]) : "";
    $answer_2 = isset($conn, $_POST["answer_2"]) ? mysqli_real_escape_string($conn, $_POST["answer_2"]) : "";
    $answer_3 = isset($conn, $_POST["answer_3"]) ? mysqli_real_escape_string($conn, $_POST["answer_3"]) : "";
    $answer_4 = isset($conn, $_POST["answer_4"]) ? mysqli_real_escape_string($conn, $_POST["answer_4"]) : "";
    $answer_5 = isset($conn, $_POST["answer_5"]) ? mysqli_real_escape_string($conn, $_POST["answer_4"]) : "";
    $answer_6 = isset($conn, $_POST["answer_6"]) ? mysqli_real_escape_string($conn, $_POST["answer_6"]) : "";
    $answer_7 = isset($conn, $_POST["answer_7"]) ? mysqli_real_escape_string($conn, $_POST["answer_7"]) : "";
    $answer_8 = isset($conn, $_POST["answer_8"]) ? mysqli_real_escape_string($conn, $_POST["answer_8"]) : "";
    $answer_9 = isset($conn, $_POST["answer_9"]) ? mysqli_real_escape_string($conn, $_POST["answer_9"]) : "";
    $answer_10 = isset($conn, $_POST["answer_10"]) ? mysqli_real_escape_string($conn, $_POST["answer_10"]) : "";
    
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

                            <!-- =========== the error message will be shown here ======== -->
                            <div class="success-message-panel">
                                <?php if (isset($success_message)) : ?>
                                    <div id="successAlert" class="alert alert-success w-50 fw-bold text-uppercase" role="alert">
                                        <?php echo $success_message; ?>
                                    </div>
                                    <script>
                                        // Automatically dismiss the success alert after 5 seconds
                                        setTimeout(function() {
                                            document.getElementById("successAlert").style.display = "none";
                                        }, 5000);
                                    </script>
                                    <?php elseif (isset($error_message)) : ?>
                                        <div class="alert alert-danger w-50 fw-bold text-uppercase" role="alert" id="errorAlert">
                                            <?php echo($error_message); ?>
                                        </div>
                                        <script>
                                            // Automatically dismiss the success alert after 5 seconds
                                            setTimeout(function() {
                                                document.getElementById("errorAlert").style.display = "none";
                                            }, 5000);
                                        </script>
                                <?php endif; ?>
                            </div>

                            <!-- =============== main panel for the questions here ========= -->
                            <div class="interview-questions-panel-form">
                                <form action="administrator_interview_questions.php" method="POST">
                                    <div class="row mt-3">
                                        <div class="col">
                                            <label for="ForQuestion1" class="fw-bold ps-2">Question 1</label>
                                            <div class="input-group">
                                                <input type="text" name="question_1" class="form-control form-control-lg">
                                            </div>

                                            <div class="error-message">
                                                <?php echo($all_errors["question_1"]); ?> 
                                            </div>

                                        </div>

                                        <div class="col">
                                            <label for="ForQuestion1" class="fw-bold ps-2">Question 2</label>
                                            <div class="input-group">
                                                <input type="text" name="question_2" class="form-control form-control-lg">
                                            </div>

                                            <div class="error-message">
                                                <?php echo($all_errors["question_2"]); ?> 
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ===================== the other row for the question will be here ====== -->
                                    <div class="row mt-3">
                                        <div class="col">
                                            <label for="ForQuestion1" class="fw-bold ps-2">Question 3</label>
                                            <div class="input-group">
                                                <input type="text" name="question_3" class="form-control form-control-lg">
                                            </div>

                                            <div class="error-message">
                                                <?php echo($all_errors["question_3"]); ?> 
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label for="ForQuestion1" class="fw-bold ps-2">Question 4</label>
                                            <div class="input-group">
                                                <input type="text" name="question_4" class="form-control form-control-lg">
                                            </div>

                                            <div class="error-message">
                                                <?php echo($all_errors["question_4"]); ?> 
                                            </div>
                                        </div>
                                    </div>


                                    <!-- ===================== the other row for the question will be here ====== -->
                                    <div class="row mt-3">
                                        <div class="col">
                                            <label for="ForQuestion1" class="fw-bold ps-2">Question 5</label>
                                            <div class="input-group">
                                                <input type="text" name="question_5" class="form-control form-control-lg">
                                            </div>
                                            <div class="error-message">
                                                <?php echo($all_errors["question_5"]); ?> 
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label for="ForQuestion1" class="fw-bold ps-2">Question 6</label>
                                            <div class="input-group">
                                                <input type="text" name="question_6" class="form-control form-control-lg">
                                            </div>
                                            <div class="error-message">
                                                <?php echo($all_errors["question_6"]); ?> 
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ===================== the other row for the question will be here ====== -->
                                    <div class="row mt-3">
                                        <div class="col">
                                            <label for="ForQuestion1" class="fw-bold ps-2">Question 7</label>
                                            <div class="input-group">
                                                <input type="text" name="question_7" class="form-control form-control-lg">
                                            </div>
                                            <div class="error-message">
                                                <?php echo($all_errors["question_7"]); ?> 
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label for="ForQuestion1" class="fw-bold ps-2">Question 8</label>
                                            <div class="input-group">
                                                <input type="text" name="question_8" class="form-control form-control-lg">
                                            </div>
                                            <div class="error-message">
                                                <?php echo($all_errors["question_8"]); ?> 
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ===================== the other row for the question will be here ====== -->
                                    <div class="row mt-3">
                                        <div class="col">
                                            <label for="ForQuestion1" class="fw-bold ps-2">Question 9</label>
                                            <div class="input-group">
                                                <input type="text" name="question_9" class="form-control form-control-lg">
                                            </div>
                                            <div class="error-message">
                                                <?php echo($all_errors["question_9"]); ?> 
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label for="ForQuestion1" class="fw-bold ps-2">Question 10</label>
                                            <div class="input-group">
                                                <input type="text" name="question_10" class="form-control form-control-lg">
                                            </div>
                                            <div class="error-message">
                                                <?php echo($all_errors["question_10"]); ?> 
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


                            <!-- =============== the panel for the answers will be here ========== -->
                            <div class="all-answers-panel">
                                <div class="all-answers-panel-title">
                                    <h1>add answers to questions</h1>
                                </div>

                                <div class="all-answers-panel-instructions">
                                    <div class="all-answers-panel-card">
                                        <p>
                                            select a question and pass the answer to it, the added 
                                            answer will be attached to the question. Since the questions
                                            will be in a multiple choice format the other answers for the 
                                            questions will be pre added to the code, but the answer that is correct 
                                            will be among the pre added answer. 
                                        </p>
                                    </div>
                                </div>

                                <!-- ============= the main answers for the questions will be here -->
                                <div class="all-answers-panel-form">
                                    <form action="administrator_interview_questions.php" method="POST">

                                        <!-- the container for the question will be here ===== -->
                                        <div class="all-answers-card">
                                            <div class="single-card-answer">

                                                <div class="single-card-answer-title">
                                                    <h1>Question 1</h1>
                                                </div>

                                                <!-- =========== the main area ========= -->
                                                <div class="col ms-5 me-5">
                                                    <div class="row mt-4">
                                                        <label for="" class="fw-bold text-primary">Select a Question</label>
                                                        <select name="select_question_1" id="" class="form-control form-control-lg">
                                                            <option value="some">Some</option>
                                                        </select>
                                                    </div>

                                                    <div class="row mt-3 mb-4">
                                                        <label for="" class="fw-bold text-primary">Add answer to the selected question</label>
                                                        <input type="text" class="form-control form-control-lg" name="answer_1">
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- ============= the other card will be here ===== -->
                                            <div class="single-card-answer">

                                                 <div class="single-card-answer-title">
                                                    <h1>Question 2</h1>
                                                </div>

                                                <!-- =========== the main area ========= -->
                                                <div class="col ms-5 me-5">
                                                    <div class="row mt-4">
                                                        <label for="" class="fw-bold text-primary">Select a Question</label>
                                                        <select name="select_question_1" id="" class="form-control form-control-lg">
                                                            <option value="some">Some</option>
                                                        </select>
                                                    </div>

                                                    <div class="row mt-3 mb-4">
                                                        <label for="" class="fw-bold text-primary">Add answer to the selected question</label>
                                                        <input type="text" class="form-control form-control-lg" name="answer_2">
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <!-- ========= end of the cards will be here ======== -->
                                        <!-- the container for the question will be here ===== -->
                                        <div class="all-answers-card">
                                            <div class="single-card-answer">

                                                <div class="single-card-answer-title">
                                                    <h1>Question 3</h1>
                                                </div>

                                                <!-- =========== the main area ========= -->
                                                <div class="col ms-5 me-5">
                                                    <div class="row mt-4">
                                                        <label for="" class="fw-bold text-primary">Select a Question</label>
                                                        <select name="select_question_1" id="" class="form-control form-control-lg">
                                                            <option value="some">Some</option>
                                                        </select>
                                                    </div>

                                                    <div class="row mt-3 mb-4">
                                                        <label for="" class="fw-bold text-primary">Add answer to the selected question</label>
                                                        <input type="text" class="form-control form-control-lg" name="answer_3">
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- ============= the other card will be here ===== -->
                                            <div class="single-card-answer">

                                                 <div class="single-card-answer-title">
                                                    <h1>Question 4</h1>
                                                </div>

                                                <!-- =========== the main area ========= -->
                                                <div class="col ms-5 me-5">
                                                    <div class="row mt-4">
                                                        <label for="" class="fw-bold text-primary">Select a Question</label>
                                                        <select name="select_question_1" id="" class="form-control form-control-lg">
                                                            <option value="some">Some</option>
                                                        </select>
                                                    </div>

                                                    <div class="row mt-3 mb-4">
                                                        <label for="" class="fw-bold text-primary">Add answer to the selected question</label>
                                                        <input type="text" class="form-control form-control-lg" name="answer_4">
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <!-- ============== // ================ // -->

                                        <!-- the container for the question will be here ===== -->
                                        <div class="all-answers-card">
                                            <div class="single-card-answer">

                                                <div class="single-card-answer-title">
                                                    <h1>Question 5</h1>
                                                </div>

                                                <!-- =========== the main area ========= -->
                                                <div class="col ms-5 me-5">
                                                    <div class="row mt-4">
                                                        <label for="" class="fw-bold text-primary">Select a Question</label>
                                                        <select name="select_question_3" id="" class="form-control form-control-lg">
                                                            <option value="some">Some</option>
                                                        </select>
                                                    </div>

                                                    <div class="row mt-3 mb-4">
                                                        <label for="" class="fw-bold text-primary">Add answer to the selected question</label>
                                                        <input type="text" class="form-control form-control-lg" name="answer_5">
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- ============= the other card will be here ===== -->
                                            <div class="single-card-answer">

                                                 <div class="single-card-answer-title">
                                                    <h1>Question 6</h1>
                                                </div>

                                                <!-- =========== the main area ========= -->
                                                <div class="col ms-5 me-5">
                                                    <div class="row mt-4">
                                                        <label for="" class="fw-bold text-primary">Select a Question</label>
                                                        <select name="select_question_1" id="" class="form-control form-control-lg">
                                                            <option value="some">Some</option>
                                                        </select>
                                                    </div>

                                                    <div class="row mt-3 mb-4">
                                                        <label for="" class="fw-bold text-primary">Add answer to the selected question</label>
                                                        <input type="text" class="form-control form-control-lg" name="answer_6">
                                                    </div>
                                                </div>

                                            </div>

                                        </div>


                                        <!-- ================== // ================ // -->

                                        <!-- the container for the question will be here ===== -->
                                        <div class="all-answers-card">
                                            <div class="single-card-answer">

                                                <div class="single-card-answer-title">
                                                    <h1>Question 7</h1>
                                                </div>

                                                <!-- =========== the main area ========= -->
                                                <div class="col ms-5 me-5">
                                                    <div class="row mt-4">
                                                        <label for="" class="fw-bold text-primary">Select a Question</label>
                                                        <select name="select_question_1" id="" class="form-control form-control-lg">
                                                            <option value="some">Some</option>
                                                        </select>
                                                    </div>

                                                    <div class="row mt-3 mb-4">
                                                        <label for="" class="fw-bold text-primary">Add answer to the selected question</label>
                                                        <input type="text" class="form-control form-control-lg" name="answer_7">
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- ============= the other card will be here ===== -->
                                            <div class="single-card-answer">

                                                 <div class="single-card-answer-title">
                                                    <h1>Question 8</h1>
                                                </div>

                                                <!-- =========== the main area ========= -->
                                                <div class="col ms-5 me-5">
                                                    <div class="row mt-4">
                                                        <label for="" class="fw-bold text-primary">Select a Question</label>
                                                        <select name="select_question_1" id="" class="form-control form-control-lg">
                                                            <option value="some">Some</option>
                                                        </select>
                                                    </div>

                                                    <div class="row mt-3 mb-4">
                                                        <label for="" class="fw-bold text-primary">Add answer to the selected question</label>
                                                        <input type="text" class="form-control form-control-lg" name="answer_8">
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <!-- ================== // =============== //  -->
                                        <!-- the container for the question will be here ===== -->
                                        <div class="all-answers-card">
                                            <div class="single-card-answer">

                                                <div class="single-card-answer-title">
                                                    <h1>Question 9</h1>
                                                </div>

                                                <!-- =========== the main area ========= -->
                                                <div class="col ms-5 me-5">
                                                    <div class="row mt-4">
                                                        <label for="" class="fw-bold text-primary">Select a Question</label>
                                                        <select name="select_question_1" id="" class="form-control form-control-lg">
                                                            <option value="some">Some</option>
                                                        </select>
                                                    </div>

                                                    <div class="row mt-3 mb-4">
                                                        <label for="" class="fw-bold text-primary">Add answer to the selected question</label>
                                                        <input type="text" class="form-control form-control-lg" name="answer_9">
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- ============= the other card will be here ===== -->
                                            <div class="single-card-answer">

                                                 <div class="single-card-answer-title">
                                                    <h1>Question 10</h1>
                                                </div>

                                                <!-- =========== the main area ========= -->
                                                <div class="col ms-5 me-5">
                                                    <div class="row mt-4">
                                                        <label for="" class="fw-bold text-primary">Select a Question</label>
                                                        <select name="select_question_1" id="" class="form-control form-control-lg">
                                                            <option value="some">Some</option>
                                                        </select>
                                                    </div>

                                                    <div class="row mt-3 mb-4">
                                                        <label for="" class="fw-bold text-primary">Add answer to the selected question</label>
                                                        <input type="text" class="form-control form-control-lg" name="answer_10"> 
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                        <!-- ============ the container for the save answers button ====== -->
                                        <div class="save-answers ms-5 mt-4 mb-5">
                                            <input type="submit" value="Save Answers" class="btn btn-lg btn-primary" name="save_answers">
                                        </div>
                                    </form>
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