<?php
include("Connection/connect.php");
$conn = $connection;

// function to fetch the records here ======= //
function fetchAllApplicants($conn) {
    try {
        $sqlCommand = "SELECT * FROM ApplicantDetails";
        // ======== getting the results here ======== //
        $results = mysqli_query($conn, $sqlCommand);
        // ======= converting the results into an array here ========= //
        $all_results = mysqli_fetch_all($results, MYSQLI_ASSOC);
        
        return $all_results;

    }catch(Exception $ex) {
        print($ex);
    }
}

$all_results = fetchAllApplicants($conn);
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

        <div class="content-area">
            <div class="container-xxl">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="administrator-reports-page">
                            <div class="administrator-reports-page-title">
                                <h1>send progress and notifications</h1>
                            </div>
                            <!-- ============ the table for the applicants here ======= // -->
                            <div class="applicants-table">

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>