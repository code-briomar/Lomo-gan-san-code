<?php
$db = new SQLite3("db/sanCode.db");
if (isset($_GET["adm_no"])) {
    $result = $db->query("SELECT * FROM student");
    while ($row = $result->fetchArray()) {
        if ($_GET["adm_no"] == $row["adm_no"]) {
            //Student record found.
            //Grab student details.
            $_SESSION["adm_no"] = $_GET["adm_no"];
            $_SESSION["fname"] = $row["fname"];
            $_SESSION["ailment"] = $row["ailment"];
            $_SESSION["medication"] = $row["medication"];
            $_SESSION["complain"] = $row["complain"];
            $_SESSION["temp"] = $row["temp"];
            $_SESSION["time"] = $row["time"];
            //Let's move to choose.php
            $choose = TRUE;
        }
    }
}

#Update temperature reading for a particular John Doe when they go get their medication only
if (isset($_GET["temp"])) {
    $adm_no = $_SESSION["adm_no"];
    $temp = $_GET["temp"];
    $db->exec("UPDATE student SET temp = '$temp', `time` = datetime('now','localtime') WHERE adm_no = '$adm_no'");
    #Redirect back to home page after all this John Doe stuff
    $_SESSION["toast"] = $_SESSION["fname"];
    echo "<script>";
    echo "window.location = 'index.php'";
    echo "</script>";
}

#A new record for a typical John Doe
if (isset($_GET["adm_no_new_record"])) {
    $adm_no = $_SESSION["adm_no"];
    $temp = $_GET["temp"];
    $complain = $_GET["complain"];
    $ailment = $_GET["ailment"];
    $medication = $_GET["medication"];

    $db->exec("UPDATE student SET ailment = '$ailment', medication = '$medication', complain = '$complain', temp = '$temp', `time` = datetime('now','localtime') WHERE adm_no = '$adm_no'");
    $_SESSION["toast"] = $_SESSION["fname"] . " " . $_SESSION["sname"];
    echo "<script>";
    echo "window.location = 'index.php'";
    echo "</script>";
}
