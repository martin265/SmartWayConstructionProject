<?php
// ============= fetching the records in the database here ============ //
include("Connection/connect.php");
// =========== getting the actual database connection here ======= //
$conn = $connection;

// ================= the function will be used to fetch for all the available job details here ======== //
function getAllAvailableJobs($conn) {
    try {
        $sqlCommand = "SELECT * FROM JobDetails";
        // ======== getting the results here ======== //
        $results = mysqli_query($conn, $sqlCommand);
        // ======= converting the results into an array here ========= //
        $all_results = mysqli_fetch_all($results, MYSQLI_ASSOC);
        
        return $all_results;
    }catch(Exception $ex) {
        print($ex);
    }
}

$all_results = getAllAvailableJobs($conn);


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

    <!-- the main content for the applicant page will be here ======= -->
    <div class="container-xxl">
        <div class="row">
            <div class="col-lg-12">
                <div class="applicant-jobs-page">
                    <div class="applicant-jobs-page-title">
                        <h1>apply for job</h1>
                    </div>
                    <div class="applicant-jobs-page-cards">
                        <div class="applicant-jobs-single-card">
                            <div class="applicant-jobs-single-card-title-icon">
                                <i class="bi bi-brightness-low"></i>
                            </div>
                            <!-- ============= the information about the application here -->
                            <div class="applicant-jobs-single-card-title-information">
                                <p>
                                    In today's digital age, online platforms
                                    have revolutionized the way we conduct interviews,
                                    making the process more accessible and efficient than
                                    ever before. As you embark on your journey to register
                                    with our online interview site, we want to ensure that
                                    your experience is seamless and successful.
                                </p>
                            </div>

                            <div class="applicant-jobs-single-card-features">
                                <div class="applicant-jobs-single-card-features-1 shadow-lg">

                                    <div class="applicant-jobs-single-card-features-title">
                                        <i class="bi bi-intersect"></i>
                                    </div>
                                    <!-- ========== the text will be here ========= -->
                                    <div class="applicant-jobs-single-card-features-header">
                                        <p>monitored</p>
                                    </div>
                                </div>
                                <!-- ================ // ========= -->
                                <div class="applicant-jobs-single-card-features-2 shadow-lg">
                                    <div class="applicant-jobs-single-card-features-title">
                                        <i class="bi bi-clipboard-data"></i>
                                    </div>
                                    <!-- ========== the text will be here ========= -->
                                    <div class="applicant-jobs-single-card-features-header">
                                        <p>monitored</p>
                                    </div>
                                </div>
                                <!-- ================== // ================= // -->
                                <div class="applicant-jobs-single-card-features-3 shadow-lg">
                                    <div class="applicant-jobs-single-card-features-title">
                                        <i class="bi bi-tree"></i>
                                    </div>
                                    <!-- ========== the text will be here ========= -->
                                    <div class="applicant-jobs-single-card-features-header">
                                        <p>monitored</p>
                                    </div>
                                </div>
                                <div class="applicant-jobs-single-card-features-4 shadow-lg">
                                    <div class="applicant-jobs-single-card-features-title">
                                        <i class="bi bi-palette2"></i>
                                    </div>
                                    <!-- ========== the text will be here ========= -->
                                    <div class="applicant-jobs-single-card-features-header">
                                        <p>monitored</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- ============== the container for all the available jobs will be here ======= -->
    <div class="container-xxl">
        <div class="row">
            <div class="col-lg-12">
                <div class="all-available-jobs-panel">
                    <div class="all-available-jobs-panel-header">
                        <h1>available jobs</h1>
                    </div>

                    <div class="available-jobs-cards">
                        <!-- ========== looping through the database results here ====== -->
                        <?php if ($all_results) : ?>
                            <?php foreach($all_results as $single_result) {?>
                                <div class="available-jobs-single-card shadow-lg">
                                    <div class="available-jobs-single-card-header">
                                        <i class="bi bi-journal-medical"></i>
                                    </div>
                                    <!-- ============ main content for the job applications page -->
                                    <div class="available-jobs-single-card-details">
                                        <p><i class="bi bi-body-text me-2 ms-2"></i><?php echo($single_result["job_title"]); ?></p>
                                    </div>
                                </div>
                            <?php }?>
                        <?php else :?>
                            <div class="available-jobs-single-card shadow-lg">
                                <div class="available-jobs-single-card-header">
                                    <i class="bi bi-journal-medical"></i>
                                </div>
                                <!-- ============ main content for the job applications page -->
                                <p class="text-center">no available jobs</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>