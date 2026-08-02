<?php
interface movement
{
    public function run($name);
}
class animal
{
    public $id;
    public $name;
    public $type;
    public $age;
    public $status;
    public $foodType;
    public function __construct(string $name, int $age, string $type, string $foodType, $status = 1)
    {
        $this->name = $name;
        $this->type = $type;
        $this->age = $age;
        $this->foodType = $foodType;
    }
    public function insert($pdo)
    {
        $insert = "INSERT INTO animals (name,type,age,status,foodtype) VALUES (:name,:type,:age,:status,:foodType)";
        $newanimal = $pdo->prepare($insert);
        $result = $newanimal->execute([":name" => $this->name, ":type" => $this->type, ":age" => $this->age, ":status" => $this->status, ":foodType" => $this->foodType]);
        if ($result) {
            return 'اطلاعات با موفقیت ثبت شد';
        } else {
            return 'خطایی در هنگام ثبت پیش امد';
        }
    }
}
class update
{
    public function update($pdo, $id)
    {
        $change = "UPDATE animals set status_id=2 where id=:id";
        $change = $pdo->prepare($change);
        $change->execute([":id" => $id]);
    }
}
class getinform
{
    public function show($pdo)
    {
        $get = "SELECT animals.id,type,age,name,status,foodtype FROM animals JOIN type on animals.type_id=type.id JOIN status on animals.status_id=status.id";
        $get_inform = $pdo->prepare($get);
        $get_inform->execute();
        $getinform = $get_inform->fetchALL(pdo::FETCH_ASSOC);
        return $getinform;
    }
}
class dog extends animal implements movement
{
    public function run($name)
    {
        return $name . 'راه میرود';
    }
    public function __construct(string $name, int $age)
    {
        parent::__construct($name, $age, 'dog', 'bone');
    }
}
class cat extends animal implements movement
{
    public function run($name)
    {
        return $name . 'راه میرود';
    }

    public function __construct(string $name, int $age)
    {
        parent::__construct($name, $age, 'cat', 'fish');
    }
}
class monkey extends animal implements movement
{
    public function run($name)
    {
        return $name . 'راه میرود';
    }
    public function __construct(string $name, int $age)
    {
        parent::__construct($name, $age, 'monkey', 'banana');
    }
}
class snake extends animal
{
    public function __construct(string $name, int $age)
    {
        parent::__construct($name, $age, 'snake', 'meat');
    }
}
?>