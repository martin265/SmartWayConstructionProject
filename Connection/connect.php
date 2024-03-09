<?php
// the fill will be used to connect with the database
$host = "localhost";
$username = "root";
$password = "";
$database = "SmartWayDB";

// ===== initialising the database connection here ======= //
$connection = mysqli_connect(
    $host,
    $username,
    $password,
    $database
);

// ========= checking if the connection has been initialised successfully
if ($connection) {
    // echo("connected successfully");
}
else {
    echo("failed to connect with the database");
}

// ============== functions to connect with the databse =//
function createJobDetailsTable($connection) {
    $sqlCommand = (
        "CREATE TABLE IF NOT EXISTS JobDetails(
            job_id INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            job_title VARCHAR(100) NOT NULL,
            job_type VARCHAR(100) NOT NULL,
            job_email VARCHAR(100) NOT NULL,
            job_phone_number VARCHAR(50) NOT NULL,
            qualification VARCHAR(100) NOT NULL,
            technical_skills VARCHAR(100) NOT NULL,
            benefits VARCHAR(100) NOT NULL,
            location VARCHAR(100) NOT NULL,
            job_description VARCHAR(100) NOT NULL,
            application_instructions VARCHAR(100) NOT NULL,
            job_start_date VARCHAR(100) NOT NULL,
            application_deadline VARCHAR(100) NOT NULL
        )"
    );

    // ========== running the query here =========== //
    $results = mysqli_query($connection, $sqlCommand);
    if ($results) {
        echo("table created successfully");
    }
}


function createInterviewQuestionsTable($connection) {
    $sqlCommand = (
        "CREATE TABLE IF NOT EXISTS InterviewQuestionsDetails(
            interview_question_id INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            question_1 VARCHAR(100) NOT NULL,
            question_2 VARCHAR(100) NOT NULL,
            question_3 VARCHAR(100) NOT NULL,
            question_4 VARCHAR(100) NOT NULL,
            question_5 VARCHAR(100) NOT NULL,
            question_6 VARCHAR(100) NOT NULL,
            question_7 VARCHAR(100) NOT NULL,
            question_8 VARCHAR(100) NOT NULL,
            question_9 VARCHAR(100) NOT NULL,
            question_10 VARCHAR(100) NOT NULL
        )"
    );

    // ========== running the query here =========== //
    $results = mysqli_query($connection, $sqlCommand);
    if ($results) {
        echo("table created successfully");
    }
}

function createInterviewAnswersTable($connection) {
    $sqlCommand = (
        "CREATE TABLE IF NOT EXISTS InterviewAnswersDetails(
            interview_question_id INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            question_1 VARCHAR(100) NOT NULL,
            question_2 VARCHAR(100) NOT NULL,
            question_3 VARCHAR(100) NOT NULL,
            question_4 VARCHAR(100) NOT NULL,
            question_5 VARCHAR(100) NOT NULL,
            question_6 VARCHAR(100) NOT NULL,
            question_7 VARCHAR(100) NOT NULL,
            question_8 VARCHAR(100) NOT NULL,
            question_9 VARCHAR(100) NOT NULL,
            question_10 VARCHAR(100) NOT NULL
        )"
    );

    // ========== running the query here =========== //
    $results = mysqli_query($connection, $sqlCommand);
    if ($results) {
        echo("table created successfully");
    }
}

// ========= function to create the applicant details table ========= //
function createApplicantDetailsTable($connection) {
    $sqlCommand = (
        "CREATE TABLE IF NOT EXISTS ApplicantDetails(
            applicant_id INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            first_name VARCHAR(100) NOT NULL,
            last_name VARCHAR(100) NOT NULL,
            age VARCHAR(100) NOT NULL,
            gender VARCHAR(100) NOT NULL,
            phone_number VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL,
            marital_status VARCHAR(100) NOT NULL,
            home_address VARCHAR(100) NOT NULL,
            cv VARCHAR(100) NOT NULL,
            cover_letter VARCHAR(100) NOT NULL
        )"
    );

    // ========== running the query here =========== //
    $results = mysqli_query($connection, $sqlCommand);
    if ($results) {
        echo("table created successfully");
    }
}

// createJobDetailsTable($connection);
//createInterviewQuestionsTable($connection);
//createInterviewAnswersTable($connection);
//createApplicantDetailsTable($connection);
?>