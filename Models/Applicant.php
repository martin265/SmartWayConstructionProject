<?php
// ======== inclusing the connection here
include("Connection/connect.php");
$conn = $connection;

class Applicant{
    // public methods for the class will be here
    public $first_name;
    public $last_name;
    public $age;
    public $gender;
    public $phone_number;
    public $email;
    public $marital_status;
    public $home_address;
    public $job_title;
    public $job_type;
    public $cv;
    public $cover_letter;

    // =============== constructor function for the class will be here ====== //
    public function __construct($first_name, $last_name, $age, $gender, $phone_number, $email, $marital_status, $home_address, $job_title, $cv, $cover_letter)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->age = $age;
        $this->gender = $gender;
        $this->phone_number = $phone_number;
        $this->email = $email;
        $this->marital_status = $marital_status;
        $this->home_address = $home_address;
        $this->job_title = $job_title;
        $this->cv = $cv;
        $this->cover_letter = $cover_letter;
    }

    // ============ the function to save the records will be here ========= //
    public function saveApplicantDetails($conn) {
        try {
            $sqlCommand = $conn->prepare(
                "INSERT INTO ApplicantDetails (
                    first_name, last_name, age, gender,
                    phone_number, email, marital_status,
                    home_address, job_title, cv, cover_letter
                ) VALUES (?,?,?,?,?,?,?,?,?,?,?)"
            );
            // ======= binding the parameters here ========= //
            $sqlCommand->bind_param(
                "sssssssssss",
                $this->first_name, $this->last_name, $this->age,
                $this->gender, $this->phone_number, $this->email,
                $this->marital_status, $this->home_address, $this->job_title, $this->cv, $this->cover_letter
            );
            // ======= running the query here ======= //
            $sqlCommand->execute();
        }catch(Exception $ex){
            print($ex);
        }
    }
}


?>