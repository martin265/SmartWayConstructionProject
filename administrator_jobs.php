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

                            <div class="all-job-details-form">
                                <form action="administrator_jobs.php" method="POST">
                                    <div class="row">
                                        <div class="col">
                                            <label for="ForJobTitle" class="ps-2 fw-bold">Job Title</label>
                                            <div class="input-group">
                                                <input type="text" name="job_title" class="form-control form-control-lg" id="ForJobTitle">
                                            </div>
                                        </div>

                                        <div class="col"> 
                                            <label for="ForJobType" class="ps-2 fw-bold">Job Type</label>
                                            <div class="input-group">
                                                <input type="text" name="job_type" class="form-control form-control-lg" id="ForJobType">
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
                                        </div>

                                        <div class="col"> 
                                            <label for="ForJobPhonenumber" class="ps-2 fw-bold">Job Phone Number</label>
                                            <div class="input-group">
                                                <input type="text" name="job_phone_number" class="form-control form-control-lg" id="ForJobPhonenumber">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ================= for technical skills and qualifications -->
                                    <div class="row mt-3">
                                        <div class="col">
                                            <label for="" class="fw-bold">Select Qualification</label>
                                            <select name="qualification" id="" class="form-control form-control-lg">
                                                <option value="Certificate">Certificate</option>
                                                <option value="Diploma">Diploma</option>
                                                <option value="Advanced Diploma">Advance Diploma</option>
                                                <option value="Degree">Degree</option>
                                            </select>
                                        </div>

                                        <!-- ================== // ====================== // -->
                                        <div class="col">
                                            <label for="" class="fw-bold">Select Technical skill</label>
                                            <select name="qualification" id="" class="form-control form-control-lg">
                                                <option value="Construction Management">Construction Management</option>
                                                <option value="Civil Engineering">Civil Engineering</option>
                                                <option value="Archtectural Design">Archtectural Design</option>
                                                <option value="Surveying and Site Planning">Surveying and Site Planning</option>
                                            </select>
                                        </div>
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