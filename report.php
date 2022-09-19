<?php
session_start();
include 'inc/header.php';
$diseasesList = array(
    "1" => "Diarrhoea",
    "2" => "Tuberculosis",
    "3" => "Dysentery ( Bloody Diarrhoea )",
    "4" => "Cholera",
    "5" => "Meningococcal Meningitis",
    "6" => "Other Meningitis",
    "7" => "Tetanus",
    "8" => "Poliomyelitis (AFP)",
    "9" => "Chicken Pox",
    "10" => "Measles",
    "11" => "Hepatitis",
    "12" => "Mumps",
    "13" => "Fevers",
    "14" => "Suspected Malaria",
    "15" => "Confirmed Malaria ( Only Positive Cases )",
    "16" => "Malaria in Pregnancy",
    "17" => "Typhoid Fever",
    "18" => "Sexually Transmitted Infections",
    "19" => "Urinary Tract Infections",
    "20" => "Bilharzia",
    "21" => "Intestinal Worms",
    "22" => "Malnutrition",
    "23" => "Anaemia",
    "24" => "Eye Infections",
    "25" => "Other Eye Conditions",
    "26" => "Ear Infections",
    "27" => "Upper Respiratory Tract Infections",
    "28" => "Asthma",
    "29" => "Pneumonia",
    "30" => "Other Dis. of Respiratory System",
    "31" => "Arbotion",
    "32" => "Dis. of Puerperium and Child Birth",
    "33" => "Hypertension",
    "34" => "Mental Disorders",
    "35" => "Dental Disroders",
    "36" => "Jiggers Infestation",
    "37" => "Diseases of the Skin",
    "38" => "Anthritis, Joint Pains, etc.",
    "39" => "Poisoning",
    "40" => "Road Traffic Injuries",
    "41" => "Other Injuries",
    "42" => "Sexual Assualt",
    "43" => "Violence Related Injuries",
    "44" => "Burns",
    "45" => "Snake Bites",
    "46" => "Dog Bites",
    "47" => "Other Bites",
    "48" => "Diabetes",
    "49" => "Epilepsy",
    "50" => "Newly Diagnosed HIV",
    "51" => "Brucellosis",
    "52" => "Cardiovascular conditions",
    "53" => "Central Nervous System Condtions",
    "54" => "Overweight ( BMI > 25 )",
    "55" => "Muscular Skeletal Condtions",
    "56" => "Fistula ( Birth Related )",
    "57" => "Neoplams",
    "58" => "Physical Disability",
    "59" => "Tryponosomiasis",
    "60" => "Kalazar ( Leshmenaiasis )",
    "61" => "Dracunculosis ( Guinea Worm )",
    "62" => "Yellow Fever",
    "63" => "Viral Haemorrhagic Fever",
    "64" => "Plague",
    "65" => "Death due to road traffic injuries",
    "66" => "Fractures",
    "67" => "<b>ALL OTHER DISEASES</b>",
    "68" => "<b>NO. OF FIRST ATTENDANCES</b>",
    "69" => "<b>RE-ATTENDACES</b>",
    "70" => "<b>Referrals from other health facility</b>",
    "71" => "<b>Referrals to other health facility</b>",
    "72" => "<b>Referrals from Community Unit</b>",
    "73" => "<b>Referrals to Community Unit</b>"
);
?>
<!DOCTYPE html>
<html>

<head>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .td {
            text-align: center;
            min-width: 0.5cm;
        }
    </style>
</head>

<body>
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large red">
            <i class="large material-icons">format_list_bulleted</i>
        </a>
        <ul>
            <li><a class="btn-floating red" onclick="window.print()"><i class="material-icons">print</i></a></li>
            <li><a class="btn-floating yellow darken-1 tooltipped" data-position="top" data-tooltip="Email the secretary"><i class="material-icons">email</i></a></li>
            <li><a class="btn-floating green tooltipped" data-position="top" data-tooltip="Save copy offline"><i class="material-icons">download</i></a></li>
            <li><a class="btn-floating blue tooltipped" data-position="top" data-tooltip="Go back" href="./"><i class="material-icons">keyboard_backspace</i></a></li>
        </ul>
    </div>
    <table style="width:100%" id="print">
        <thead>
            <tr id="table-header" class="col s12 push s1">
                <b class="col s2" style="margin-right: 650px;">Facility Name : <u>ALLIANCE HIGH SCHOOL</u></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <b class="col s2" style="margin-right: 650px;">Ward : <u>KIKUYU</u></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <b class="col s2" style="margin-right: 650px;">Sub-county : <u>KIKUYU</u></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <b class="col s2" style="margin-right: 650px;">County : <u>KIAMBU</u></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <b class="col s2" style="margin-right: 650px;">Month : <u><?php echo  strtoupper(date("F")); ?></u></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <b class="col s2" style="margin-left: 100px;">Year : <u><?php echo  strtoupper(date("Y")); ?></u></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </tr>
        </thead>
        <tr>
            <th colspan="2">Diseases ( New Cases Only )</th>
            <!--Days of the month go here-->
            <?php for ($i = 1; $i <= 31; $i++) : ?>
                <th class="td"><?php echo $i; ?></th>
            <?php endfor ?>
            <!-- That ends here -->
        </tr>
        <!-- Put this is a loop to print out this data 73 times -->
        <?php for ($h = 1; $h <= 73; $h++) : ?>
            <tr>
                <!-- Here, code blocks will be used to list the diseases -->
                <td class="td">
                    <?php
                    switch ($h) {
                        case 67:
                            echo "<b>" . $h . "</b>";
                            break;
                        case 68:
                            echo "<b>" . $h . "</b>";
                            break;
                        case 69:
                            echo "<b>" . $h . "</b>";
                            break;
                        case 70:
                            echo "<b>" . $h . "</b>";
                            break;
                        case 71:
                            echo "<b>" . $h . "</b>";
                            break;
                        case 72:
                            echo "<b>" . $h . "</b>";
                            break;
                        case 73:
                            echo "<b>" . $h . "</b>";
                            break;
                        default:
                            echo $h;
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $eachDisease = array_shift($diseasesList);
                    echo $eachDisease;
                    ?>
                </td>
                <!-- That ends here... -->
                <!-- Values for that particular disease for the month to go here, if empty place 0 -->
                <?php
                #Increase maximum execution time
                ini_set('max_execution_time', '300');
                for ($i = 1; $i <= 31; $i++) :
                    $con2 = new mysqli("localhost", "root", "", "test");
                    $result = mysqli_query($con2, "SELECT * FROM `summary_table` WHERE disease_name = '$eachDisease'");
                    if ($row = $result->fetch_assoc()) {
                        echo '<td class="td">' . $row[$i] . '</td>';
                    }
                endfor
                ?>
                <!-- That ends here... -->
            </tr>
        <?php endfor ?>
    </table>
</body>

</html>