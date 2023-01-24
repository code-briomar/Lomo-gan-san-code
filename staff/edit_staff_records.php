<?php
$db = new SQLite3("db/sanCode.db");

#A new record for a typical John Doe staff member
if (isset($_GET["staff_member_new_record"])) {
    $name = $_GET["name"];
    $temp = $_GET["temp"];
    $complain = $_GET["complain"];
    $ailment = $_GET["ailment"];
    $medication = $_GET["medication"];

    $db->exec("INSERT INTO staff(name,complain,ailment,medication,temp,time) VALUES('$name','$complain','$ailment','$medication','$temp',datetime('now','localtime'))");
    $_SESSION["toast"] = $name;
    #Data insertion done, now let's redirect back to the staff dashboard
    echo "<script>";
    echo "window.location = 'index.php'";
    echo "</script>";
}
