<?php
include("Connection/connect.php");
$conn = $connection;

class Register{
    public $role;
    public $username;
    public $password;

    // ============ the constructor for the class here =========== //
    public function __construct($role, $username, $password)
    {
        $this->role = $role;
        $this->username = $username;
        $this->password = $password;
    }

    // ============== the function to register a new applicant ========== //
    public function registerPeople($conn) {
        try {
            $sqlCommand = $conn->prepare(
                "INSERT INTO RegisterDetails(
                    login_role, username, password
                ) VALUES (?,?,?)"
            );
            // ======= binding the parameters here ========= //
            $sqlCommand->bind_param(
                "sss",
                $this->role, $this->username, $this->password
            );
            // ======= running the query here ======= //
            $sqlCommand->execute();
        }catch(Exception $ex) {
            print($ex);
        }
    }
}

?>