<?php

// =========== getting the connection here ========= //
include("Models/Applicant.php");
$conn = $connection;

function getSingleRecord($conn) {
    // =========== getting the current id to apply for the job here ============= //
    if (isset($_GET["id"])) {
        $id_to_insert = mysqli_real_escape_string($conn, $_GET["id"]);
        // ======== selecting records from the job details table here ========= //
        $sqlCommand = "SELECT * FROM JobDetails WHERE job_id = '$id_to_insert'";
        $result = mysqli_query($conn, $sqlCommand);

        // ========= getting all the results here ========== //
        $singl_record = mysqli_fetch_assoc($result);

        return $singl_record;
    }

}

$singl_record = getSingleRecord($conn);



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

        <!-- ============== the content area will be here =========== -->
        <div class="content-area">
            <div class="container-xxl">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="notification-panel">
                            <div class="notification-title">
                                <h1>send report</h1>
                            </div>


                            <!-- the reviews form for the page will be here ====== -->
                            <div class="notification-form">
                                <form action="review.php" method="POST">
                                    <?php if ($singl_record):?>
                                        <div class="row mt-4">
                                            <div class="col ms-4 me-4">
                                                <label for="ForFirstName" class="ps-3">First name</label>
                                                <input type="text" name="first_name" class="form-control form-control-lg">
                                            </div>
                                        </div>
                                    <?php else:?>
                                    <?php endif;?>
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