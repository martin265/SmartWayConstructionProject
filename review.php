<?php

// =========== getting the connection here ========= //
include("Models/Applicant.php");
$conn = $connection;

$all_results = null; // Initialize $all_results variable

if (isset($_GET["id"])) {
    $id_to_select = mysqli_real_escape_string($conn, $_GET["id_to_select"]);

    $sql = "SELECT * FROM ApplicantDetails WHERE applicant_id = '$id_to_select'";
    // ======== getting the results here ======== //
    $results = mysqli_query($conn, $sql);
    // ======= converting the results into an array here ========= //
    $all_results = mysqli_fetch_assoc($results);

}

if (isset($_POST["save_details"])) {
    echo($_POST["first_name"]);
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
                                <div class="row mt-3">
                                    <div class="col ms-4">
                                        <label for="ForFirstName" class="ps-3">First name</label>
                                        <?php if ($all_results):?>
                                            <input type="text" name="first_name" class="form-control form-control-lg" value="<?php echo($all_results["first_name"]); ?>" disabled>
                                        <?php else:?>
                                            <input type="text" name="first_name" class="form-control form-control-lg">
                                        <?php endif;?>
                                    </div>

                                    <div class="col me-4">
                                        <label for="ForFirstName" class="ps-3">Last name</label>
                                        <?php if ($all_results):?>
                                            <input type="text" name="last_name" class="form-control form-control-lg" value="<?php echo($all_results["last_name"]); ?>" disabled>
                                        <?php else:?>
                                            <input type="text" name="last_name" class="form-control form-control-lg">
                                        <?php endif;?>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col ms-4">
                                        <label for="ForFirstName" class="ps-3">Age</label>
                                        <?php if ($all_results):?>
                                            <input type="text" name="age" class="form-control form-control-lg" value="<?php echo($all_results["age"]); ?>" disabled>
                                        <?php else:?>
                                            <input type="text" name="age" class="form-control form-control-lg">
                                        <?php endif;?>
                                    </div>

                                    <div class="col me-4">
                                        <label for="ForFirstName" class="ps-3">Gender</label>
                                        <?php if ($all_results):?>
                                            <input type="text" name="gender" class="form-control form-control-lg" value="<?php echo($all_results["gender"]); ?>" disabled>
                                        <?php else:?>
                                            <input type="text" name="gender" class="form-control form-control-lg">
                                        <?php endif;?>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col ms-4">
                                        <label for="ForFirstName" class="ps-3">Phone number</label>
                                        <?php if ($all_results):?>
                                            <input type="text" name="phone_number" class="form-control form-control-lg" value="<?php echo($all_results["phone_number"]); ?>" disabled>
                                        <?php else:?>
                                            <input type="text" name="phone_number" class="form-control form-control-lg">
                                        <?php endif;?>
                                    </div>

                                    <div class="col me-4">
                                        <label for="ForFirstName" class="ps-3">Email</label>
                                        <?php if ($all_results):?>
                                            <input type="text" name="email" class="form-control form-control-lg" value="<?php echo($all_results["email"]); ?>" disabled>
                                        <?php else:?>
                                            <input type="text" name="email" class="form-control form-control-lg">
                                        <?php endif;?>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col ms-4 me-4">
                                        <textarea name="review_message" id="" cols="30" rows="7" class="form-control form-control-lg text-start">

                                        </textarea>
                                    </div>
                                </div>

                                <div class="save-details ms-4 mt-4 mb-5">
                                    <input type="hidden" name="id_to_select" value="<?php echo($all_results["applicant_id"]); ?>">
                                    <input type="submit" name="save_details" class="btn btn-lg btn-primary mb-5" value="send a review and notification">
                                </div>
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