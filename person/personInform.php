<?php
require_once "../all/connection.php";
class person
{
    public $id;
    public $Fname;
    public $Lname;
    public $nationalCode;
    public $phoneNumber;

    public function __construct(string $Fname, string $Lname, string $nationalCode, string $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
        $this->nationalCode = $nationalCode;
        $this->Lname = $Lname;
        $this->Fname = $Fname;
    }
    public function insert($pdo)
    {
        $insert = "INSERT INTO adopter (firstName,lastName,nationalCode,phoneNumber) VALUES (:Fname,:Lname,:nationalCode,:phoneNumber)";
        $newadopter = $pdo->prepare($insert);
        $result = $newadopter->execute([":Fname" => $this->Fname, ":Lname" => $this->Lname, ":nationalCode" => $this->nationalCode, ":phoneNumber" => $this->phoneNumber]);
        if ($result) {
            return 'اطلاعات با موفقیت ثبت شد';
        } else {
            return 'خطایی در هنگام ثبت پیش امد';
        }
    }
}
?>