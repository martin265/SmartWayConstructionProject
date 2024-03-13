<?php
// =========== getting the connection here ========= //
include("Models/Applicant.php");
$conn = $connection;

// validating the input fields here ============== //
function validateInputFields($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

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

// =========== the array to keep the errors ========= //
$all_errors = array("first_name"=>"", "last_name"=>"", "age"=>"", "gender"=>"", "phone_number"=>"",
"email"=>"", "marital_status"=>"", "home_address"=>"");

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
    if (isset($_POST["save_details"])) {

        if (empty($_POST["first_name"])) {
            $all_errors["first_name"] = "enter the first name please";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $first_name)) {
                $all_errors["first_name"] = "enter valid characters please";
            }
        }


        if (empty($_POST["last_name"])) {
            $all_errors["last_name"] = "enter the last name please";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $last_name)) {
                $all_errors["last_name"] = "enter valid characters please";
            }
        }


        if (empty($_POST["age"])) {
            $all_errors["age"] = "enter the age name please";
        }
        else {
            if (preg_match("/^[a-zA-Z-' ]*$/", $age)) {
                $all_errors["age"] = "enter valid characters please";
            }
        }


        if (empty($_POST["gender"])) {
            $all_errors["gender"] = "enter the first name please";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $gender)) {
                $all_errors["gender"] = "enter valid characters please";
            }
        }


        if (empty($_POST["phone_number"])) {
            $all_errors["phone_number"] = "provide a phone number please";
        }
        else {
            if (preg_match("/^[a-zA-Z-' ]*$/", $phone_number)) {
                $all_errors["phone_number"] = "enter valid characters please";
            }
        }


        if (empty($_POST["email"])) {
            $all_errors["email"] = "please provide an email";
        }
        else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $all_errors["email"] = "provide valid email";
            }
        }


        if (empty($_POST["home_address"])) {
            $all_errors["home_address"] = "enter home address";
        }
        else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $home_address)) {
                $all_errors["address"] = "enter valid characters please";
            }
        }
        
        // ========== filtering the errors here // ================= //
        if (array_filter($all_errors)) {
            $error_message = "the form still has some errors";
        }
        else {
            
            if (isset($_FILES["cv"]) && isset($_FILES["cover_letter"])) {

                $allowed_extensions = array('pdf', 'docx', 'txt');
                $file_name = $_FILES['document_file']['name'];
                $file_tmp = $_FILES['document_file']['tmp_name'];
                $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);

                // Check if the file extension is allowed
                if (in_array(strtolower($file_extension), $allowed_extensions)) {
                    // Read file data
                    $data = file_get_contents($file_tmp);

                    // Insert file data into database
                    $sql = "INSERT INTO document_files (name, data) VALUES ('$file_name', '$data')";
                    if ($conn->query($sql) === TRUE) {
                        echo "Document file uploaded successfully.";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    echo "Error: Unsupported file type. Only PDF, DOCX, and TXT files are allowed.";
                }
                // ========= creating an object for the applicant class here ======= //
                $job_title = isset($conn, $_POST["job_title"]) ? mysqli_real_escape_string($conn, $_POST["job_title"]) : "";
                $first_name = isset($conn, $_POST["first_name"]) ? mysqli_real_escape_string($conn, $_POST["first_name"]) : "";
                $last_name = isset($conn, $_POST["last_name"]) ? mysqli_real_escape_string($conn, $_POST["last_name"]) : "";
                $age = isset($conn, $_POST["age"]) ? mysqli_real_escape_string($conn, $_POST["age"]) : "";
                $gender = isset($conn, $_POST["gender"]) ? mysqli_real_escape_string($conn, $_POST["gender"]) : "";
                $phone_number = isset($conn, $_POST["phone_number"]) ? mysqli_real_escape_string($conn, $_POST["phone_number"]) : "";
                $email = isset($conn, $_POST["email"]) ? mysqli_real_escape_string($conn, $_POST["email"]) : "";
                $marital_status = isset($conn, $_POST["marital_status"]) ? mysqli_real_escape_string($conn, $_POST["marital_status"]) : "";

                // calling the function here =====//
                $applicant = new Applicant(
                    $first_name, $last_name, $age, $gender, $phone_number, $email,
                    $marital_status, $home_address, $job_title, $cvFilePath, $coverLetterFilePath
                );
                $applicant->saveApplicantDetails($conn);
                // showing the success message here //
                $success_message = "job application sent successfully successfully";
                $_SESSION["success"] = true;
            }

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

                    <!-- ============ the success message will be shown here ======= -->
                     <!-- =========== the error message will be shown here ======== -->
                    <div class="success-message-panel">
                        <?php if (isset($success_message)) : ?>
                            <div id="successAlert" class="alert alert-success w-50 fw-bold text-uppercase" role="alert">
                                <?php echo $success_message; ?>
                            </div>
                            <script>
                                // Automatically dismiss the success alert after 5 seconds
                                setTimeout(function() {
                                    document.getElementById("successAlert").style.display = "none";
                                }, 60000);
                            </script>
                            <?php elseif (isset($error_message)) : ?>
                                <div class="alert alert-danger w-50 fw-bold text-uppercase" role="alert" id="errorAlert">
                                    <?php echo($error_message); ?>
                                </div>
                                <script>
                                    // Automatically dismiss the success alert after 5 seconds
                                    setTimeout(function() {
                                        document.getElementById("errorAlert").style.display = "none";
                                    }, 60000);
                                </script>
                        <?php endif; ?>
                    </div>
                    <!-- ============= the form to collect the details here -->
                    <div class="applicant-apply-job-page-form">
                        <form action="applicant_apply_job.php" method="POST" enctype="multipart/form-data">
                            <div class="row mt-3">
                                <div class="col">
                                <select name="job_title" id="" class="form-control form-control-lg">
                                    <?php if ($singl_record && isset($singl_record["job_title"])) : ?>
                                        <option value="<?php echo $singl_record["job_title"]; ?>"><?php echo $singl_record["job_title"]; ?></option>
                                    <?php else: ?>
                                        <option value="">No Job Details Available</option>
                                    <?php endif; ?>
                                </select>
                                </div>
                            </div>
                            <div class="row pt-3">
                                <div class="col">
                                    <label for="FirstName" class="fw-bold ms-2">First Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-body-text"></i></span>
                                        <input type="text" name="first_name" class="form-control form-control-lg">
                                    </div>
                                    <div class="error-message">
                                        <?php echo($all_errors["first_name"]); ?>
                                    </div>
                                </div>

                                <!-- ============= for the last name here ========= -->
                                <div class="col">
                                    <label for="LastName" class="fw-bold ms-2">Last Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-body-text"></i></span>
                                        <input type="text" name="last_name" class="form-control form-control-lg">
                                    </div>
                                    <div class="error-message">
                                        <?php echo($all_errors["last_name"]); ?>
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
                                    <div class="error-message">
                                        <?php echo($all_errors["age"]); ?>
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
                                    <div class="error-message">
                                        <?php echo($all_errors["phone_number"]); ?>
                                    </div>
                                </div>

                                <!-- ============= for the last name here ========= -->
                                <div class="col">
                                    <label for="FirstName" class="fw-bold ms-2">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                        <input type="email" name="email" class="form-control form-control-lg">
                                    </div>
                                    <div class="error-message">
                                        <?php echo($all_errors["email"]); ?>
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
                                        <input type="text" name="home_address" class="form-control form-control-lg">
                                    </div>
                                    <div class="error-message">
                                        <?php echo($all_errors["home_address"]); ?>
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
                            <input type="hidden" name="id_to_insert" value="<?php echo($all_results["job_id"]); ?>">
                            <input type="submit" name="save_details" class="btn btn-primary btn-lg mt-3 mb-5" value="save details">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>