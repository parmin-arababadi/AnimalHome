<?php
require_once "../all/connection.php";
require_once "animalInform.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['type'] == 'dog') {
        $newanimal = new dog($_POST['name'], $_POST['age']);
        $result = $newanimal->insert($pdo);
        echo $result;
    }
    if ($_POST['type'] == 'cat') {
        $newanimal = new cat($_POST['name'], $_POST['age']);
        $result = $newanimal->insert($pdo);
        echo $result;
    }
    if ($_POST['type'] == 'monkey') {
        $newanimal = new monkey($_POST['name'], $_POST['age']);
        $result = $newanimal->insert($pdo);
        echo $result;
    }
}
?>
<html>

<head>
    <title>create animal</title>
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
    <div class="boxA">
        <form method="POST">
            <P class="titleA">اسم</P>
            <input type="text" id="name" name="name" class="signup" placeholder="اسم انتخابی خود را وارد کنید">
            <label for="name"></label>
            <P class="titleA">نوع حیوان</P>
            <input type="text" id="type" name="type" class="signup" placeholder="نوع حیوان را وارد کنید">
            <label for="type"></label>
            <P class="titleA">سن حیوان</P>
            <input type="date" id="age" name="age" class="signup" placeholder="سن حیوان را وارد کنید">
            <label for="age"></label>
            <input type="submit" id="submit" name="submit" class="submitA" value="ثبت">
            <label for="submit"></label>
        </form>
    </div>
</body>

</html>