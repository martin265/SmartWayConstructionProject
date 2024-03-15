<?php
include("Connection/connect.php");
$conn = $connection;

// ================== function to count the databse records here ============ //
function countQuestionRecords($conn) {
    try {
        $sqlCommand = "SELECT COUNT(*) AS total_records FROM InterviewQuestionsDetails";
        // =========== running the query here ==============//
        $results = mysqli_query($conn, $sqlCommand);
        // ============ checking is there available results ============ //
        if ($results) {
            // fetching the results as an associative array ========= //
            $row = mysqli_fetch_assoc($results);
            $totalQuestions = $row["total_records"];

            return $totalQuestions;
        }
    }catch(Exception $ex) {
        print($ex);
    }
}
$totalQuestions = countQuestionRecords($conn);

// ============= function to fetching all the available jobs here ========= //
function countJobRecords($conn) {
    try {
        $sqlCommand = "SELECT COUNT(*) AS total_records FROM JobDetails";
        // =========== running the query here ==============//
        $results = mysqli_query($conn, $sqlCommand);
        // ============ checking is there available results ============ //
        if ($results) {
            // fetching the results as an associative array ========= //
            $row = mysqli_fetch_assoc($results);
            $totalJobs = $row["total_records"];

            return $totalJobs;
        }
    }catch(Exception $ex) {
        print($ex);
    }
}

$totalJobs = countJobRecords($conn);

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
                            <div class="main-dashboard-title">
                                <h1>
                                    <span class="pe-2"><i class="fi fi-tr-objects-column"></i></span>dashboard
                                </h1>
                            </div>
                            <div class="main-dashboard-cards">
                                <!-- =========== the cards for the main dashboard -->
                                <div class="main-dashboard-questions">
                                    <div class="main-dashboard-questions-title">
                                        <h1>questions</h1>
                                    </div>
                                    <!-- ================ // ==================== // -->
                                    <div class="main-dashboard-questions-icon">
                                        <i class="bi bi-patch-question-fill"></i>
                                    </div>
                                    <!-- =================== // ================ // -->
                                    <div class="main-dashboard-questions-counter">
                                        <h1>
                                            Total Questions <?php echo($totalQuestions); ?>
                                        </h1>
                                    </div>
                                </div>
                                <!-- ================ // ================= // -->
                                <div class="main-dashboard-jobs">
                                    <div class="main-dashboard-jobs-title">
                                        <h1>jobs</h1>
                                    </div>
                                    <!-- ================ // ==================== // -->
                                    <div class="main-dashboard-jobs-icon">
                                        <i class="fi fi-sr-briefcase"></i>
                                    </div>
                                    <!-- =================== // ================ // -->
                                    <div class="main-dashboard-jobs-counter">
                                        <h1>
                                            Total Jobs <?php echo($totalJobs); ?>
                                        </h1>
                                    </div>
                                </div>
                               
                                <div class="main-dashboard-applicants">
                                    <div class="main-dashboard-applicants-title">
                                        <h1>Applicants</h1>
                                    </div>
                                    <!-- ================ // ==================== // -->
                                    <div class="main-dashboard-applicants-icon">
                                        <i class="fi fi-sr-poll-h"></i>
                                    </div>
                                    <!-- =================== // ================ // -->
                                    <div class="main-dashboard-applicants-counter">
                                        <h1>
                                            Total Applicants <?php echo($totalJobs); ?>
                                        </h1>
                                    </div>
                                </div>
                                <!-- =============== // =============== // -->

                                <div class="recent-activity">
                                    <h1>recent activity</h1>
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