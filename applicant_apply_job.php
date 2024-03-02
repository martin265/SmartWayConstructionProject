<?php

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
                    <div class="applicant-apply-job-page-form">
                        <form action="applicant_apply_job.php" method="POST" enctype="">
                            <div class="row">
                                <div class="col">
                                    <label for="FirstName" class="fw-bold">First Name</label>
                                    <input type="text" name="first_name" class="form-control form-control-lg">
                                </div>

                                <!-- ============= for the last name here ========= -->
                                <div class="col">
                                    <label for="LastName" class="fw-bold">Last Name</label>
                                    <input type="text" name="last_name" class="form-control form-control-lg">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col">
                                    <label for="FirstName" class="fw-bold">Age</label>
                                    <input type="text" name="age" class="form-control form-control-lg">
                                </div>

                                <!-- ============= for the last name here ========= -->
                                <div class="col">
                                    <label for="FirstName" class="fw-bold">Gender</label>
                                    <select name="gender" id="" class="form-control form-control-lg">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    
                                </div>
                            </div>


                            <div class="row mt-3">
                                <div class="col">
                                    <label for="FirstName" class="fw-bold">Phone Number</label>
                                    <input type="text" name="phone_number" class="form-control form-control-lg">
                                </div>

                                <!-- ============= for the last name here ========= -->
                                <div class="col">
                                    <label for="FirstName" class="fw-bold">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text"></span>
                                        <input type="email" name="first_name" class="form-control form-control-lg">
                                    </div>
                                </div>
                            </div>


                            <div class="row mt-3">
                                <div class="col">
                                    <label for="FirstName" class="fw-bold">Marital Status</label>
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
                                    <label for="FirstName" class="fw-bold">Home address</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-house-add"></i></span>
                                        <input type="text" name="address" class="form-control form-control-lg">
                                    </div>
                                </div>
                            </div>

                            <div class="education-documents">
                                <!-- ============= the section for applying for a job here ========= -->
                                <div class="row mt-3">
                                    <div class="col">
                                        <label for="ForFile">
                                            <span class="fw-bold"><i class="bi bi-file-earmark-person me-2"></i>Select Cv File</span>
                                        </label>
                                        <div class="input-group">
                                            <input type="file" class="form-control form-control-lg" name="cv">
                                        </div>
                                    </div>
                                    <!-- ============== // ================ // -->
                                    <div class="col">
                                        <label for="ForCoverLetter">
                                            <span class="fw-bold"><i class="bi bi-postcard me-2"></i>Upload Cover Letter</span>
                                        </label>
                                        <div class="input-group">
                                            <input type="file" class="form-control form-control-lg" name="cover_letter">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>