<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    // Redirect the user to the login page if they are not logged in
    header("location: login.php");
    exit;
}

// Continue to display the content of the restricted page

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
    <link rel="stylesheet" href="Styles/style.css">
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
    <section>
        <div class="side-navigation-panel">
            <!-- the navigation items for the navigation will be here -->
            <div class="navigation-item">
                <i class="bi bi-ui-checks-grid"></i>
                <a href="administrator_index.php">home</a>
            </div>

            <!-- the navigation item for the jobs section -->
            <div class="navigation-item">
                <i class="bi bi-clipboard-pulse"></i>
                <a href="administrator_jobs.php">job Details</a>
            </div>

            <!-- the navigation item for the jobs section -->
            <div class="navigation-item">
                <i class="bi bi-patch-question"></i>
                <a href="administrator_interview_questions.php">questions</a>
            </div>

            <!-- the navigation item for the jobs section -->
            <div class="navigation-item">
                <i class="bi bi-file-pdf"></i>
                <a href="administrator_application.php">applications</a>
            </div>

            <!-- the navigation item for the jobs section -->
            <div class="navigation-item">
                <i class="bi bi-file-earmark-bar-graph"></i>
                <a href="records.php">records</a>
            </div>
            
        </div>
    </section>
</body>
</html>