<?php
session_start();
require_once "../all/connection.php";
require_once "animalInform.php";
$get = new getinform();
$get = $get->show($pdo);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['pet_id'] = $_POST['pet_id'];
    header("location:../person/adopter.php");
    exit;
}
?>
<html>

<head>
    <title>Animal List</title>
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
    <div class="tableA">
        <table>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>type</th>
                <th>age</th>
                <th>status</th>
                <th>foodType </th>
            </tr>

            <?php
            if (!empty($get)) {
                foreach ($get as $getInform) {
                    echo '<tr>';
                    echo "<td>" . $getInform['id'] . "</td>";
                    echo "<td>" . $getInform['name'] . "</td>";
                    echo "<td>" . $getInform['type'] . "</td>";
                    echo "<td>" . $getInform['age'] . "</td>";
                    echo "<td>" . $getInform['status'] . "</td>";
                    echo "<td>" . $getInform['foodtype'] . "</td>";
                    echo '</tr>';
                }
            }
            ?>

        </table>
    </div>
    <form method="POST">
        <input type="text" name="pet_id" id="pet_id" class="form" placeholder="ایدی مورد نظر خود را وارد کنید">
        <label for="pet_id"></label>
        <input type="submit" name="submit" id="submit" class="submitB" value="ثبت">
        <label for="submit"></label>

    </form>
</body>

</html>