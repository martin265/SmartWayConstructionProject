<?php
// =========== the class for the job details will be here ======= //
include("Connection/connect.php");
$conn = $connection;

class Job{
    public $job_title;
    public $job_type;
    public $job_email;
    public $job_phone_number;
    public $qualification;
    public $technical_skills;
    public $benefits;
    public $location;
    public $job_description;
    public $application_instructions;
    public $job_start_date;
    public $application_deadline;

    // ============ the constructor for the class here ======== //
    public function __construct($job_title, $job_type, $job_email, $job_phone_number, $qualification, $technical_skills, $benefits, $location, $job_description, $application_instructions, $job_start_date, $application_deadline)
    {
        $this->job_title = $job_title;
        $this->job_type = $job_type;
        $this->job_email = $job_email;
        $this->job_phone_number = $job_phone_number;
        $this->qualification = $qualification;
        $this->technical_skills = $technical_skills;
        $this->benefits = $benefits;
        $this->location = $location;
        $this->job_description = $job_description;
        $this->application_instructions = $application_instructions;
        $this->job_start_date = $job_start_date;
        $this->application_deadline = $application_deadline;
    }

    // ================ function to insert the records into the database ======== //
    public function saveJobDetails($conn) {
        $sqlCommand = $conn->prepare(
            "INSERT INTO JobDetails (
                job_title, job_type, job_email, job_phone_number,
                qualification, technical_skills, benefits, location, 
                job_description, application_instructions, job_start_date
            ) VLUES ()"
        );
        
    }
}


?>