<?php
// including the model here ====//
include("Models/job.php");

// validating the input fields here ============== //
function validateInputFields($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

// ========== the array for the all the errors ========= //
$all_errors = array(
    "job_title"=>"",
    "job_type"=>"",
    "job_email"=>"",
    "job_phone_number"=>"",
    "qualification"=>"",
    "technical_skills"=>"",
    "benefits"=>"",
    "location"=>"",
    "job_description"=>"",
    "application_instructions"=>"",
    "job_start_date"=>"",
    "application_deadline"=>""
);
// ================= getting inputs from the form here =============== //
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $job_title = validateInputFields($_POST["job_title"]);
    $job_type = validateInputFields($_POST["job_type"]);
    $job_email = validateInputFields($_POST["job_email"]);
    $job_phone_number = validateInputFields($_POST["job_phone_number"]);
    $qualification = validateInputFields($_POST["qualification"]);
    $technical_skills = validateInputFields($_POST["technical_skills"]);
    $benefits = validateInputFields($_POST["benefits"]);
    $location = validateInputFields($_POST["location"]);
    $job_description = validateInputFields($_POST["job_description"]);
    $application_instructions = validateInputFields($_POST["application_instructions"]);
    $job_start_date = validateInputFields($_POST["job_start_date"]);
    $application_deadline = validateInputFields($_POST["application_deadline"]);

    // ============= checking if the fields are empty here =========== //
    if (isset($_POST["save_details"])) {
        // ======== validating the input fields here ============ //
        if (empty($_POST["job_title"])) {
            $all_errors["job_title"] = "please fill in the blanks please";
        }
        else {
            if (!preg_match("/^[a-zA-Z -']*$/", $job_title)) {
                $all_errors["job_title"] = "enter valid characters for the job title";
            }
        }

        // ======== validating the input fields here ============ //
        if (empty($_POST["job_type"])) {
            $all_errors["job_type"] = "please fill in the blanks please";
        }
        else {
            if (!preg_match("/^[a-zA-Z -']*$/", $job_type)) {
                $all_errors["job_type"] = "enter valid characters for the job type please";
            }
        }

        // ======== validating the input fields here ============ //
        if (empty($_POST["job_email"])) {
            $all_errors["job_email"] = "please fill in the blanks please";
        }
        else {
            if(!filter_var($job_email, FILTER_VALIDATE_EMAIL)) {
                $all_errors["job_email"] = "enter valid email";
            }
        }

        // ======== validating the input fields here ============ //
        if (empty($_POST["job_phone_number"])) {
            $all_errors["job_phone_number"] = "please fill in the blanks please";
        }
        else {
            if (preg_match("/^[a-zA-Z -']*$/", $job_phone_number)) {
                $all_errors["job_phone_number"] = "enter valid numbers";
            }
        }

        // ======== validating the input fields here ============ //
        if (empty($_POST["location"])) {
            $all_errors["location"] = "please fill in the blanks please";
        }
        else {
            if (!preg_match("/^[a-zA-Z -']*$/", $location)) {
                $all_errors["location"] = "your location should be letters only";
            }
        }

        // inserting the records here ======== //
        if (array_filter($all_errors)) {
            $error_message = "the form still has some errors";
        }
        else {
            // creating an object for the model here //
            
            $success_message = "records here";
        }

    }

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
                        <div class="job-details-panel">
                            <div class="job-details-panel-title">
                                <h1>job details</h1>
                            </div>
                            <!-- ============= the section for the form to add the job details -->

                            <div class="success-message-panel">
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

                            <div class="all-job-details-form">
                                <form action="administrator_jobs.php" method="POST">
                                    <div class="row">
                                        <div class="col">
                                            <label for="ForJobTitle" class="ps-2 fw-bold">Job Title</label>
                                            <div class="input-group">
                                                <input type="text" name="job_title" class="form-control form-control-lg" id="ForJobTitle">
                                            </div>

                                            <div class="error-message">
                                                <?php echo($all_errors["job_title"]); ?>
                                            </div>
                                        </div>

                                        <div class="col"> 
                                            <label for="ForJobType" class="ps-2 fw-bold">Job Type</label>
                                            <div class="input-group">
                                                <input type="text" name="job_type" class="form-control form-control-lg" id="ForJobType">
                                            </div>

                                            <div class="error-message">
                                                <?php echo($all_errors["job_type"]); ?>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- ============ for the email and phone number ========= -->
                                    <div class="row mt-3">
                                        <div class="col">
                                            <label for="ForJobEmail" class="ps-2 fw-bold">Job Email</label>
                                            <div class="input-group">
                                                <input type="email" name="job_email" class="form-control form-control-lg" id="ForJobEmail" placeholder="@example.com...">
                                            </div>

                                            <div class="error-message">
                                                <?php echo($all_errors["job_email"]); ?>
                                            </div>
                                        </div>

                                        <div class="col"> 
                                            <label for="ForJobPhonenumber" class="ps-2 fw-bold">Job Phone Number</label>
                                            <div class="input-group">
                                                <input type="text" name="job_phone_number" class="form-control form-control-lg" id="ForJobPhonenumber">
                                            </div>

                                            <div class="error-message">
                                                <?php echo($all_errors["job_phone_number"]); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ================= for technical skills and qualifications -->
                                    <div class="row mt-3">
                                        <div class="col">
                                            <label for="" class="ps-2 fw-bold">Select Qualification</label>
                                            <select name="qualification" id="" class="form-control form-control-lg">
                                                <option value="Certificate">Certificate</option>
                                                <option value="Diploma">Diploma</option>
                                                <option value="Advanced Diploma">Advance Diploma</option>
                                                <option value="Degree">Degree</option>
                                            </select>
                                        </div>

                                        <!-- ================== // ====================== // -->
                                        <div class="col">
                                            <label for="" class="ps-2 fw-bold">Select Technical skill</label>
                                            <select name="technical_skills" id="" class="form-control form-control-lg">
                                                <option value="Construction Management">Construction Management</option>
                                                <option value="Civil Engineering">Civil Engineering</option>
                                                <option value="Archtectural Design">Archtectural Design</option>
                                                <option value="Surveying and Site Planning">Surveying and Site Planning</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- ================= for location and benefits -->
                                    <div class="row mt-3">
                                        <div class="col">
                                            <label for="" class="ps-2 fw-bold">Select Job benefits</label>
                                            <select name="benefits" id="" class="form-control form-control-lg">
                                                <option value="Health Insurance">Health Insurance</option>
                                                <option value="Retirement Plans">Retirement Plans</option>
                                                <option value="Professional and Development Opportunitie">Professional and Development Opportunitie</option>
                                            </select>
                                        </div>

                                        <!-- ================== // ====================== // -->
                                        <div class="col">
                                            <label for="" class="ps-2 fw-bold">Job Location</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-lg" name="location">
                                            </div>

                                            <div class="error-message">
                                                <?php echo($all_errors["location"]); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ============ for job description and application instructions -->
                                    <div class="row mt-3">
                                        <div class="col">
                                            <label for="" class="ps-2 fw-bold">Enter Job Description</label>
                                            <textarea name="job_description" id="" cols="30" rows="5" class="form-control form-control-lg">

                                            </textarea>
                                        </div>

                                        <!-- ================== // ====================== // -->
                                        <div class="col">
                                            <label for="" class="ps-2 fw-bold">Enter Application Instructions</label>
                                            <textarea name="application_instructions" id="" cols="30" rows="5" class="form-control form-control-lg">

                                            </textarea>
                                        </div>
                                    </div>

                                    <!-- for the job start date and application date line here -->
                                    <div class="row mt-3 mb-5">
                                        <div class="col">
                                            <label for="ForJobEmail" class="ps-2 fw-bold">Job Start Date</label>
                                            <div class="input-group">
                                                <input type="text" name="job_start_date" class="form-control form-control-lg" id="ApplicationStartDate" value="12-02-2024">
                                            </div>

                                            <div class="error-message">
                                                <?php echo($all_errors["job_start_date"]); ?>
                                            </div>
                                        </div>

                                        <div class="col"> 
                                            <label for="ForJobPhonenumber" class="ps-2 fw-bold">Application Deadline</label>
                                            <div class="input-group">
                                                <input type="text" name="application_deadline" class="form-control form-control-lg" id="ApplicationDeadlineDate" value="12-02-2024">
                                            </div>

                                            <div class="error-message">
                                                <?php echo($all_errors["application_deadline"]); ?>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- ============= for the button to save the details here ======== -->
                                    <div class="save-details-button">
                                        <button type="submit" class="btn btn-primary btn-lg mb-4" name="save_details">
                                            <i class="bi bi-save me-2"></i> Save Job Details
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Your Datepicker Initialization Script -->
    <script type="text/javascript">
        // ============getting the signature date here
        $(document).ready(function () {
            // Initialize the datepicker
            $.fn.datepicker.defaults.format = "mm/dd/yyyy";
            $('#ApplicationDeadlineDate').datepicker({
                autoclose: true
            });
        });
        // ============= the code for the input validations ===============//
        $(document).ready(function () {
            // Initialize the datepicker
            $.fn.datepicker.defaults.format = "mm/dd/yyyy";
            $('#ApplicationStartDate').datepicker({
                autoclose: true
            });
        });
    </script>
</body>
</html>