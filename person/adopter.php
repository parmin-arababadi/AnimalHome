<?php
session_start();
require_once "../all/connection.php";
require_once "../animal/animalInform.php";
require_once "personInform.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newstatus = new update($pdo, $_SESSION['pet_id']);
    $newstatus->update($pdo, $_SESSION['pet_id']);
    $newadopter = new person($_POST['fname'], $_POST['lname'], $_POST['nationalCode'], $_POST['phoneNumber']);
    $newadopter->insert($pdo);

}
?>
<html>

<head>
    <title>Information</title>
    <Link href="../css/style.css" rel="stylesheet">
</head>

<body>
    <form method="POST">
        <p class="titleB">نام</p><br>
        <input type="text" name="fname" id="fname" class="personsignup" placeholder="اسم خود را وارد کنید"><br>
        <label for="fname"></label>
        <p class="titleB">نام خانوادگی</p><br>
        <input type="text" name="lname" id="lname" class="personsignup" placeholder="نام خانوادگی خود را وارد کنید"><br>
        <label for="lname"></label>
        <p class="titleB">کد ملی</p><br>
        <input type="text" name="nationalCode" id="nationalCode" class="personsignup"
            placeholder="کد ملی خود را وارد کنید"><br>
        <label for=nationalCode></label>
        <p class="titleB">شماره تماس</p><br>
        <input type="text" name="phoneNumber" id="phoneNumber" class="personsignup"
            placeholder="شماره تماس خود را وارد کنید"><br>
        <label for=phoneNumber></label>
        <input type="submit" name="submit" id="submit" class="submitB"><br>
        <label for=submit></label>
    </form>
</body>

</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $newstatus = new update($pdo, $_SESSION['pet_id']);
    $newstatus->update($pdo, $_SESSION['pet_id']);
    $newadopter = new person($_POST['fname'], $_POST['lname'], $_POST['nationalCode'], $_POST['phoneNumber']);
    $newadopter->insert($pdo);

}
?>