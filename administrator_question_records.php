<?php
include("Models/job.php");
$conn = $connection;
// ================= function to fetch patient details here ===============//
function fetchPatientDetails($conn) {
    try {
        $sqlCommand = "SELECT * FROM nterviewQuestionsDetails";
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

// ================ checking if the job ID is set here =========== //
if (isset($_POST["delete_record"])) {
    $id_to_delete = mysqli_real_escape_string($conn, $_POST["id_to_delete"]);
    // calling the function to delete the record here ======= //
    // getting the connection with the databse here ============= //
    // ================ getting the sql command here ================ //
    $sqlCommand = $conn->prepare(
        "DELETE FROM nterviewQuestionsDetails WHERE question_id = ?"
    );

    // ============== binding the query here ================= //
    $sqlCommand->bind_param(
        "s",
        $id_to_delete
    );
    $sqlCommand->execute();
    $success_message = "record deleted successfully";

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

                            <!-- ============== the succee massage will be here =========== -->
                            <div class="success-message-panel d-flex justfy-center">
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

                            <!-- =============== the other section of the page here ===== -->
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
                                                            <form action="administrator_job_records.php" method="POST">
                                                                <input type="hidden" name="id_to_delete" value="<?php echo($single_record["job_id"]); ?>">
                                                                <input type="submit" name="delete_record" value="Delete Record" class="btn btn-sm btn-danger">
                                                            </form>
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