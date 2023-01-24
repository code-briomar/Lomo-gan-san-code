<?php
$db = new SQLite3("sanCode.db");

#Diseases List
$diseasesListProcess = array(
    "Diarrhoea", "Tuberculosis", "Dysentery ( Bloody Diarrhoea )", "Cholera", "Meningococcal Meningitis", "Other Meningitis", "Tetanus", "Poliomyelitis (AFP)", "Chicken Pox",
    "Measles",
    "Hepatitis",
    "Mumps",
    "Fevers",
    "Suspected Malaria",
    "Confirmed Malaria ( Only Positive Cases )",
    "Malaria in Pregnancy",
    "Typhoid Fever",
    "Sexually Transmitted Infections",
    "Urinary Tract Infections",
    "Bilharzia",
    "Intestinal Worms",
    "Malnutrition",
    "Anaemia",
    "Eye Infections",
    "Other Eye Conditions",
    "Ear Infections",
    "Upper Respiratory Tract Infections",
    "Asthma",
    "Pneumonia",
    "Other Dis. of Respiratory System",
    "Arbotion",
    "Dis. of Puerperium and Child Birth",
    "Hypertension",
    "Mental Disorders",
    "Dental Disroders",
    "Jiggers Infestation",
    "Diseases of the Skin",
    "Anthritis, Joint Pains, etc.",
    "Poisoning",
    "Road Traffic Injuries",
    "Other Injuries",
    "Sexual Assualt",
    "Violence Related Injuries",
    "Burns",
    "Snake Bites",
    "Dog Bites",
    "Other Bites",
    "Diabetes",
    "Epilepsy",
    "Newly Diagnosed HIV",
    "Brucellosis",
    "Cardiovascular conditions",
    "Central Nervous System Condtions",
    "Overweight ( BMI > 25 )",
    "Muscular Skeletal Condtions",
    "Fistula ( Birth Related )",
    "Neoplams",
    "Physical Disability",
    "Tryponosomiasis",
    "Kalazar ( Leshmenaiasis )",
    "Dracunculosis ( Guinea Worm )",
    "Yellow Fever",
    "Viral Haemorrhagic Fever",
    "Plague",
    "Death due to road traffic injuries",
    "Fractures",
    "<b>ALL OTHER DISEASES</b>",
    "<b>NO. OF FIRST ATTENDANCES</b>",
    "<b>RE-ATTENDACES</b>",
    "<b>Referrals from other health facility</b>",
    "<b>Referrals to other health facility</b>",
    "<b>Referrals from Community Unit</b>",
    "<b>Referrals to Community Unit</b>"
);

$noOfDiseases = 0;
$ailmentCount = array();
$current_day = date("j");

# Step 1 : Count the number of occurrences of a certain ailment for today
while ($noOfDiseases < count($diseasesListProcess)) {
    $disease = $diseasesListProcess[$noOfDiseases];
    $stmt = $db->prepare("SELECT count(ailment) AS ailmentCount FROM student WHERE date(`time`) = date('now') AND ailment = ?");
    $stmt->bindValue(1, $disease, SQLITE3_TEXT);
    $result = $stmt->execute();
    $row = $result->fetchArray();
    $ailmentCount[$noOfDiseases] = $row["ailmentCount"];
    $noOfDiseases++;
}

#Step 2 : Insert the number of occurrences of a certain ailment into the users.db
foreach ($ailmentCount as $diseaseNo => $occurrence) {
    $diseaseId = $diseaseNo + 2;
    while ($noOfDiseases < count($diseasesListProcess)) {
        $db->exec("UPDATE summary_table SET '$current_day' = $occurrence WHERE id = $diseaseId");
        $noOfDiseases++;
    }
    $noOfDiseases = 0;
}

#Step 3: Clear tomorrow's records ++.
$calendar = CAL_GREGORIAN;
$month = date("m");
$year = date("Y");
$current_day++;
while ($current_day <= cal_days_in_month($calendar, $month, $year)) {
    while ($noOfDiseases < count($diseasesListProcess)) {
        $disease = $diseasesListProcess[$noOfDiseases];
        $db->exec("UPDATE summary_table SET '$current_day' = 0 WHERE disease_name = '$disease'");
        $noOfDiseases++;
    }
    $noOfDiseases = 0;
    $current_day++;
}
