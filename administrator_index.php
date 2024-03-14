<?php
include("Connection/connect.php");
$conn = $connection;

// ================== function to count the databse records here ============ //
function countPatientRecords($conn) {
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


$totalQuestions = countPatientRecords($conn);
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
                                        <h1></h1>
                                    </div>
                                </div>
                                <!-- ================ // ================= // -->
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