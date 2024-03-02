<?php

// =========== getting the connection here ========= //
// validating the input fields here ============== //
function validateInputFields($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

// =========== the array to keep the errors ========= //
// =========== getting inputs here ============ //
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = validateInputFields($_POST["first_name"]);
    $last_name = validateInputFields($_POST["last_name"]);
    $age = validateInputFields($_POST["age"]);
    $gender = validateInputFields($_POST["gender"]);
    $phone_number = validateInputFields($_POST["phone_number"]);
    $email = validateInputFields($_POST["email"]);
    $marital_status = validateInputFields($_POST["marital_status"]);
    $home_address = validateInputFields($_POST["home_address"]);

    // ============ checking if the fields are empty when submitting the form here
    if (empty($_POST["first_name"])) {

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
    <div class="main-navigation-bar">
        <?php include("templates/header.php"); ?>
    </div>

     

    <div class="container-xxl">
        <div class="row">
            <div class="col-lg-12">
                <div class="applicant-apply-job-page">
                    <!-- =========== the container for the top page will be here = -->
                    <div class="welcome-jobs-page">
                        <h1>apply for job</h1>
                    </div>

                    <!-- ============= the form to collect the details here -->
                    <div class="applicant-apply-job-page-form">
                        <form action="applicant_apply_job.php" method="POST" enctype="">
                            <div class="row pt-5">
                                <div class="col">
                                    <label for="FirstName" class="fw-bold ms-2">First Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-body-text"></i></span>
                                        <input type="text" name="first_name" class="form-control form-control-lg">
                                    </div>
                                </div>

                                <!-- ============= for the last name here ========= -->
                                <div class="col">
                                    <label for="LastName" class="fw-bold ms-2">Last Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-body-text"></i></span>
                                        <input type="text" name="last_name" class="form-control form-control-lg">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col">
                                    <label for="FirstName" class="fw-bold ms-2">Age</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-123"></i></span>
                                        <input type="text" name="age" class="form-control form-control-lg">
                                    </div>
                                </div>

                                <!-- ============= for the last name here ========= -->
                                <div class="col">
                                    <label for="FirstName" class="fw-bold ms-2">Gender</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                                        <select name="gender" id="" class="form-control form-control-lg">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="row mt-3">
                                <div class="col">
                                    <label for="FirstName" class="fw-bold ms-2">Phone Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-phone"></i></span>
                                        <input type="text" name="phone_number" class="form-control form-control-lg">
                                    </div>
                                </div>

                                <!-- ============= for the last name here ========= -->
                                <div class="col">
                                    <label for="FirstName" class="fw-bold ms-2">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                        <input type="email" name="first_name" class="form-control form-control-lg">
                                    </div>
                                </div>
                            </div>


                            <div class="row mt-3">
                                <div class="col">
                                    <label for="FirstName" class="fw-bold ms-2">Marital Status</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person-hearts"></i></span>
                                        <select name="marital_status" id="" class="form-control form-control-lg">
                                            <option value="Married">Married</option>
                                            <option value="Single">Single</option>
                                            <option value="Divorced">Divorced</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- ============= for the last name here ========= -->
                                <div class="col">
                                    <label for="FirstName" class="fw-bold ms-2">Home address</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-house-add"></i></span>
                                        <input type="text" name="address" class="form-control form-control-lg">
                                    </div>
                                </div>
                            </div>

                            <div class="available-job-documents">

                            </div>

                            <div class="education-documents">
                                <!-- ============= the section for applying for a job here ========= -->
                                <div class="row mt-3">
                                    <div class="col">
                                        <label for="ForFile">
                                            <span class="fw-bold ms-2"><i class="bi bi-file-earmark-person me-2"></i>Select Cv File</span>
                                        </label>
                                        <div class="input-group">
                                            <input type="file" class="form-control form-control-lg" name="cv">
                                        </div>
                                    </div>
                                    <!-- ============== // ================ // -->
                                    <div class="col">
                                        <label for="ForCoverLetter">
                                            <span class="fw-bold ms-2"><i class="bi bi-postcard me-2"></i>Upload Cover Letter</span>
                                        </label>
                                        <div class="input-group">
                                            <input type="file" class="form-control form-control-lg" name="cover_letter">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- =============== the section for the form here =========== -->
                            <input type="hidden" name="id_to_insert" value="">
                            <input type="submit" name="save_details" class="btn btn-primary btn-lg mt-3 mb-5" value="save details">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>