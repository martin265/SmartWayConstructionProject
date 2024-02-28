<?php
include("Connection/connect.php");
$conn = $connection;
// ================= function to fetch patient details here ===============//
function fetchPatientDetails($conn) {
    try {
        $sqlCommand = "SELECT * FROM JobDetails";
        // =========== getting the results here =================//
        $results = mysqli_query($conn, $sqlCommand);
        // ============== passing the results into an array here ==========//
        $all_results = mysqli_fetch_all($results, MYSQLI_ASSOC);

        return $all_results;
        
    }catch(Exception $ex) {
        print($ex);
    }
}

$all_results = fetchPatientDetails($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- ============== the main content for the page will be here =========== -->
    <div class="main-content-container">
        <div class="side-navigation-area">
            <?php include("administrator_sidebar.php"); ?>
        </div>

        <div class="content-area">
            <div class="containwer-xxl">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="job-records-panel">
                            <div class="job-records-panel-title">
                                <h1>job records table</h1>
                            </div>

                            <div class="job-records-panel-table">
                                <div class="recent-job-data-table">
                                    <table id="recent-table" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-capitalize">job title</th>
                                                <th scope="col" class="text-capitalize">job type</th>
                                                <th scope="col" class="text-capitalize">job email</th>
                                                <th scope="col" class="text-capitalize">job phone number</th>
                                                <th scope="col" class="text-capitalize">qualification</th>
                                                <th scope="col" class="text-capitalize">technical skills</th>
                                                <th scope="col" class="text-capitalize">actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- ============== looping through the results here ====== -->
                                            <?php if ($all_results): ?>
                                                <?php foreach($all_results as $single_record) {?>
                                                    <tr>
                                                        <td><?php echo($single_record["job_title"]); ?></td>
                                                        <td><?php echo($single_record["job_type"]); ?></td>
                                                        <td><?php echo($single_record["job_email"]); ?></td>
                                                        <td><?php echo($single_record["job_phone_number"]); ?></td>
                                                        <td><?php echo($single_record["qualification"]); ?></td>
                                                        <td><?php echo($single_record["technical_skills"]); ?></td>
                                                        <!-- ============ for the button here -->
                                                        <td>
                                                            <form action="administrator_job_records"></form>
                                                        </td>
                                                    </tr>
                                                <?php }?>
                                                <?php else: ?>

                                                <?php endif; ?>
                                        </tbody>
                                    </table>
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