<?php
session_start();
include("Models/Registration.php");
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
    
}

?>