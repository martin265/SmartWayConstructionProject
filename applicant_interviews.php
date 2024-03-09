<?php
// =========== getting the connection here ========= //
include("Models/Applicant.php");
$conn = $connection;
// ============ function to fetch the questions in the databse here =========== //
function fecthQuestions($conn) {
    try {
        $sqlCommand = "SELECT * FROM InterviewQuestionsDetails WHERE question_id = 8";
        // =========== running the sql command here ============ //
        $results = mysqli_query($conn, $sqlCommand);
        // ============ showing the results here =============== //
        $all_results = mysqli_fetch_all($results, MYSQLI_ASSOC);

        foreach($all_results as $single_record) {
            return $single_record;
        }

    }catch(Exception $ex) {
        print($ex);
    }
}

$single_record = fecthQuestions($conn);


// =================== function to get answers from the database here ================= //
function getAnswersFunc($conn) {
    try {
        $sqlCommand = "SELECT * FROM QuestionAnswerDetails";
        // =========== running the sql command here ============ //
        $results = mysqli_query($conn, $sqlCommand);
        // ============ showing the results here =============== //
        $all_results = mysqli_fetch_all($results, MYSQLI_ASSOC);

        foreach($all_results as $single_answer) {
            return $single_answer;
        }
    }catch(Exception $ex) {
        print($ex);
    }
}

$single_answer = getAnswersFunc($conn);

// Assuming $single_answer is an array containing the correct answers fetched from the database
$questions = [
    "question_1" => "<?php echo(\$single_answer['question_1']); ?>",
    "question_2" => "<?php echo(\$single_answer['question_2']); ?>",
    "question_3" => "<?php echo(\$single_answer['question_3']); ?>",
    "question_4" => "<?php echo(\$single_answer['question_4']); ?>",
    "question_5" => "<?php echo(\$single_answer['question_5']); ?>",
    "question_6" => "<?php echo(\$single_answer['question_6']); ?>",
    "question_7" => "<?php echo(\$single_answer['question_7']); ?>",
    "question_8" => "<?php echo(\$single_answer['question_8']); ?>",
    "question_9" => "<?php echo(\$single_answer['question_9']); ?>",
    "question_10" => "<?php echo(\$single_answer['question_10']); ?>"
];
// =============== getting the selected values from the form here ============ //
if (isset($_POST["save_responses"])) {
    $question1 = isset($conn, $_POST["question_1"]) ? mysqli_real_escape_string($conn, $_POST["question_1"]) : "";
    $question2 = isset($conn, $_POST["question_2"]) ? mysqli_real_escape_string($conn, $_POST["question_2"]) : "";
    $question3 = isset($conn, $_POST["question_3"]) ? mysqli_real_escape_string($conn, $_POST["question_3"]) : "";
    $question4 = isset($conn, $_POST["question_4"]) ? mysqli_real_escape_string($conn, $_POST["question_4"]) : "";
    $question5 = isset($conn, $_POST["question_5"]) ? mysqli_real_escape_string($conn, $_POST["question_5"]) : "";
    $question6 = isset($conn, $_POST["question_6"]) ? mysqli_real_escape_string($conn, $_POST["question_6"]) : "";
    $question7 = isset($conn, $_POST["question_7"]) ? mysqli_real_escape_string($conn, $_POST["question_7"]) : "";
    $question8 = isset($conn, $_POST["question_8"]) ? mysqli_real_escape_string($conn, $_POST["question_8"]) : "";
    $question9 = isset($conn, $_POST["question_9"]) ? mysqli_real_escape_string($conn, $_POST["question_9"]) : "";
    $question10 = isset($conn, $_POST["question_10"]) ? mysqli_real_escape_string($conn, $_POST["question_10"]) : "";

    // ========== checking if the responses are valid basing on the saved records =============== //
    if ($question1 != $single_answer["question_1"] and $question2 != $single_answer["question_2"] and $question3 != $single_answer["question_3"] and $question4 != $single_answer["question_4"] and $question5 != $single_answer["question_5"] and $question6 != $single_answer["question_6"] and $question7 != $single_answer["question_7"] and $question8 != $single_answer["question_8"] and $question9 != $single_answer["question_9"] and $question10 != $single_answer["question_10"]) {
        $error_message = "something is wrong here";
    }
    else if ($question1 == $single_answer["question_1"] or $question2 == $single_answer["question_2"] or $question3 == $single_answer["question_3"] or $question4 == $single_answer["question_4"] or $question5 == $single_answer["question_5"] or $question6 == $single_answer["question_6"] or $question7 == $single_answer["question_7"] or $question8 == $single_answer["question_8"] or $question9 == $single_answer["question_9"] or $question10 == $single_answer["question_10"]) {
        echo("some question where ");
        // Initialize a variable to store the total score
        $totalScore = 0;

        // Iterate through each question
        for ($i = 1; $i <= 10; $i++) {
            $questionKey = "question_" . $i;
            
            // Check if the question is answered and the answer is correct
            if (isset($_POST[$questionKey]) && $_POST[$questionKey] == $single_answer[$questionKey]) {
                // If the answer is correct, add 10 marks to the total score
                $totalScore += 10;
            }
        }

        // Output the total score
        echo "Total score: " . $totalScore;
    }
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
                                <h1>reviewed</h1>
                            </div>
                        </div>

                    </div>

                    <!-- ============= panel for the questions will be here -->
                    <div class="interview-questions-panel shadow-lg">
                        <div class="interview-questions-panel-title">
                            <h1>interview questions</h1>
                        </div>
                        <!-- ================= // ================ // -->
                        <div class="interview-questions-panel-info">
                            <p>
                                each question within this section carries 10 marks,
                                before answering any of the questions please make sure 
                                that you have fully understood what each question is all about. 
                                and you are only allowed to answer a single page questions at a time
                            </p>
                        </div>

                        <!-- the form for the questions will be here ======== -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>