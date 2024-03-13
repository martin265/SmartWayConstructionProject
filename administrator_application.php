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

// ================ checking if the job ID is set here =========== //
if (isset($_POST["delete_record"])) {
    $id_to_delete = mysqli_real_escape_string($conn, $_POST["id_to_delete"]);
    // calling the function to delete the record here ======= //
    // getting the connection with the databse here ============= //
    // ================ getting the sql command here ================ //
    $sqlCommand = $conn->prepare(
        "DELETE FROM JobDetails WHERE job_id = ?"
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
    <div class="main-content-container">
        <div class="side-navigation-area">
            <?php include("administrator_sidebar.php"); ?>
        </div>

        <!-- =============== the main content will be here for administrator dashboard ====== -->
        <div class="content-area">
            <div class="container-xxl">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="administrator-preview-documents">
                            <div class="administrator-preview-documents-title">
                                <h1>preview application documents</h1>
                            </div>

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
                                                <th scope="col" class="text-capitalize">operations</th>
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
                                                            <form action="administrator_application.php" method="POST">
                                                                <input type="hidden" name="id_to_delete" value="<?php echo($single_record["applicant_id"]); ?>">
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