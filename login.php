<?php
session_start();
include('Connection/connect.php');
$conn = $connection;

createJobDetailsTable($conn);
createInterviewQuestionsTable($conn);
createInterviewAnswersTable($conn);
createApplicantDetailsTable($conn);
createRegisterTable($conn);

// function to validate the fields
function validateInputFields($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

$all_errors = array("username"=>"", "password"=>"");

// ========== getting the input fields from the form here ========== //
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $data = validateInputFields($_POST["role"]);
    $data = validateInputFields($_POST["username"]);
    $data = validateInputFields($_POST["password"]);
    
    // checking if the input fields are not empty here ========= //
    if (empty($_POST["username"]) && empty($_POST["password"])) {
        $all_errors["username"] = "please fill in the blanks";
        $all_errors["password"] = "enter your password plese";
    }
    else {
        if (array_filter($all_errors)) {
            $error_message = "something is wrong with the form";
        }
        else {
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
                $username = $_POST["username"];
                $password = $_POST["password"];
                $role = $_POST["role"];
            
                // Check if the role is valid
                if (!in_array($role, ["Administrator", "Applicant"])) {
                    $error_message = "Invalid role selected";
                    exit;
                }
            
                // Fetch user from database
                $sql = "SELECT * FROM RegisterDetails WHERE username='$username' AND login_role='$role'";
                $result = $conn->query($sql);
            
                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    $stored_password = $row["password"]; // Password stored in the database
                
                    // Check if the provided password matches the stored password (assuming it's not hashed)
                    if ($password === $stored_password) {
                        // Set session variables
                        $_SESSION["loggedin"] = true;
                        $_SESSION["username"] = $username;
                        $_SESSION["role"] = $role; // Add role to session
                        
                        // Redirect based on role or to a welcome page
                        if ($role == "Administrator") {
                            header("location: administrator_index.php");
                        } else {
                            header("location: applicant_index.php");
                        }
                    } else {
                        $error_message = "Invalid username or password";
                    }
                } else {
                    $error_message = "Invalid username or password";
                }
                
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
    <link rel="stylesheet" href="assets/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- =========== bootstrap links here ============= -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <!-- ============= css link here ========== -->
    <link rel="stylesheet" href="Styles/login.css">
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- other links will be here -->
    <!-- Include Bootstrap DateTimePicker CSS and JavaScript -->
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="assets/bootstrap-datepicker-1.9.0-dist/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="assets/bootstrap-datepicker-1.9.0-dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="assets/bootstrap-datepicker-1.9.0-dist/css/bootstrap-datepicker3.min.css">
    
    <script defer src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script defer src="styles/style.js"></script>

    <script defer src="assets/bootstrap-datepicker-1.9.0-dist/js/bootstrap-datepicker.min.js"></script>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-thin-rounded/css/uicons-thin-rounded.css'>
    
</head>
<body>
    <!-- the file for logging in into the system will be here -->
    <div class="container-xxl">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-login-page">
                    <div class="center-login-panel shadow-lg">
                        <div class="center-login-panel-title">
                            <h1>welcome to smartway construction</h1>
                        </div>

                        <div class="center-login-panel-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>

                        <div class="success-message-panel d-flex justify-center">
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

                        <form action="login.php" method="POST">
                            <div class="center-login-panel-controls">
                                <div class="row">
                                    <div class="col">
                                        <label for="ForUsername" class="fw-bold ps-2">Role</label>
                                        <div class="input-group">
                                        <select name="role" id="" class="form-control form-control-lg">
                                                <option value="Administrator">Administrator</option>
                                                <option value="Applicant">Applicant</option>
                                        </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col">
                                        <label for="ForUsername" class="fw-bold ps-2">Username</label>
                                        <div class="input-group">
                                            <input type="text" name="username" class="form-control form-control-lg">
                                        </div>
                                        <div class="error-message fw-bold text-danger ps-2">
                                            <?php echo($all_errors["username"]); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col">
                                        <label for="ForUsername" class="fw-bold ps-2">Password</label>
                                        <div class="input-group">
                                            <input type="password" name="password" class="form-control form-control-lg">
                                        </div>
                                        <div class="error-message fw-bold text-danger ps-2">
                                            <?php echo($all_errors["password"]); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col">
                                        <input type="submit" class="btn btn-lg btn-dark" value="login" name="login">
                                    </div>

                                    <div class="col">
                                        <a href="register.php">Dont have account? Register Here</a>
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