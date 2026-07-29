<?php
class animal
{
    public $id;
    public $name;
    public $type;
    public $age;
    public $status;
    public $foodType;
    public function __construct(string $name, string $type, int $age, $status = 1)
    {
        $this->name = $name;
        $this->type = $type;
        $this->age = $age;
        $this->status = $status;
    }
    public function insert($pdo)
    {
        $insert = "INSERT INTO animals (name,type,age,status,foodtype) VALUES (:name,:type,:age,:status,:foodType)";
        $newanimal = $pdo->prepare($insert);
        $newanimal->execute([":name" => $this->name, ":type" => $this->type, ":age" => $this->age, ":status" => $this->status, ":foodType" => $this->foodType]);
        $result = 1;
        if ($result == 1) {
            return 'اطلاعات با موفقیت ثبت شد';
        } else {
            return 'خطایی در هنگام ثبت پیش امد';
        }
    }
}
class dog extends animal
{
    public function __construct(string $name, int $age, $status = 1)
    {
        $this->name = $name;
        $this->type = 'dog';
        $this->age = $age;
        $this->status = $status;
        $this->foodType = 'bone';
    }
}
class cat extends animal
{
    public function __construct(string $name, int $age, $status = 1)
    {
        $this->name = $name;
        $this->type = 'cat';
        $this->age = $age;
        $this->status = $status;
        $this->foodType = 'fish';
    }
}
class monkey extends animal
{
    public function __construct(string $name, int $age, $status = 1)
    {
        $this->name = $name;
        $this->type = 'monkey';
        $this->age = $age;
        $this->status = $status;
        $this->foodType = 'banana';
    }
}
?>