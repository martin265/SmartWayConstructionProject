<?php
// =========== the class for the job details will be here ======= //
include("Connection/connect.php");
$conn = $connection;

class Question{

    // ============ the public attributes for the class here ========= //
    public $question_1;
    public $question_2;
    public $question_3;
    public $question_4;
    public $question_5;
    public $question_6;
    public $question_7;
    public $question_8;
    public $question_9;
    public $question_10;

    // ================ the constructor for the class will be here ============ //
    public function __construct($question_1, $question_2, $question_3, $question_4, $question_5, $question_6, $question_7, $question_8, $question_9, $question_10)
    {
        $this->question_1 = $question_1;
        $this->question_2 = $question_2;
        $this->question_3 = $question_3;
        $this->question_4 = $question_4;
        $this->question_5 = $question_5;
        $this->question_6 = $question_6;
        $this->question_7 = $question_7;
        $this->question_8 = $question_8;
        $this->question_9 =$question_9;
        $this->question_10 = $question_10;
    }


    // the function to save the question details here =========== //
    
}

?>