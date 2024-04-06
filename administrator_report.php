<?php
include("Connection/connect.php");
$conn = $connection;
require 'vendor/autoload.php';

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


if (isset($_POST["send_report"])) {
    $id_to_insert = mysqli_real_escape_string($conn, $_POST["id_to_insert"]);
    // ======== selecting records from the job details table here ========= //
    $sqlCommand = "SELECT * FROM ApplicantDetails WHERE applicant_id = '$id_to_insert'";
    $result = mysqli_query($conn, $sqlCommand);

    // ========= getting all the results here ========== //
    $single_record = mysqli_fetch_assoc($result);

    $first_name = $single_record["first_name"];
    $last_name = $single_record["last_name"];
    $email = $single_record["email"];
    $phone_number = $single_record["phone_number"];

    
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

        <div class="content-area">
            <div class="container-xxl">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="administrator-reports-page">
                            <div class="administrator-reports-page-title">
                                <h1>send progress and notifications</h1>
                            </div>
                            <!-- ============ the table for the applicants here ======= // -->
                            <div class="all-available-applications">
                                <div class="all-available-applicants-table">
                                    <table id="applicant-details" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-capitalize">first name</th>
                                                <th scope="col" class="text-capitalize">last name</th>
                                                <th scope="col" class="text-capitalize">age</th>
                                                <th scope="col" class="text-capitalize">gender</th>
                                                <th scope="col" class="text-capitalize">phone_number</th>
                                                <th scope="col" class="text-capitalize">home address</th>
                                                <th scope="col" class="text-capitalize">job title</th>
                                                <th scope="col" class="text-capitalize">notification</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- ============== looping through the results here ====== -->
                                            <?php if ($all_results): ?>
                                                <?php foreach($all_results as $single_record) {?>
                                                    <tr>
                                                        <td><?php echo($single_record["first_name"]); ?></td>
                                                        <td><?php echo($single_record["last_name"]); ?></td>
                                                        <td><?php echo($single_record["age"]); ?></td>
                                                        <td><?php echo($single_record["gender"]); ?></td>
                                                        <td><?php echo($single_record["phone_number"]); ?></td>
                                                        <td><?php echo($single_record["home_address"]); ?></td>
                                                        <td><?php echo($single_record["job_title"]); ?></td>
                                                        <!-- ============ for the button here -->
                                                        <td>
                                                            <form action="administrator_report.php" method="POST">
                                                                <input type="hidden" name="id_to_insert" value="<?php echo($single_record["applicant_id"]); ?>">
                                                                <input type="submit" name="send_report" value="Send Review" class="btn btn-sm btn-primary">
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