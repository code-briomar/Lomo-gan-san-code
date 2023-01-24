<?php
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
class DB
{
	public function db_con()
	{
		$this->server_name = "localhost";
		$this->user_name = "root";
		$this->pass_word = "";
		$this->db_name = "san-code";
		$this->con = new mysqli($this->server_name, $this->user_name, $this->pass_word, $this->db_name);
	}
	public function validate($adm_no)
	{
		global $con;
		$result = mysqli_query($this->con, "SELECT * FROM `tbl_student` WHERE adm_no = '$adm_no'");
		return $result;
	}
	public function getRecordsByAdmissionNumber($adm_no)
	{
		global $con;
		$result = mysqli_query($this->con, "SELECT * FROM `tbl_student` WHERE adm_no = '$adm_no'");
		return $result;
	}
	public function update_medication_only($adm_no, $temp)
	{
		$day = date("j");
		$month = date("m");
		$result = mysqli_query($this->con, "UPDATE `tbl_student` set temp='$temp',day='$day',month='$month' WHERE adm_no='$adm_no'");
		return $result;
	}
	public function update_new_record($adm_no, $temp, $ailment, $medication, $comment, $toOtherHealthFacility, $fromOtherHealthFacility, $toCommunityUnit, $fromCommunityUnit)
	{
		global $con;
		$day = date("j");
		$month = date("m");
		$r = mysqli_query($con, "SELECT first FROM `tbl_student` WHERE adm_no = '$adm_no'");
		while ($row = $r->fetch_assoc()) {
			if ($row["first"] == 1) {
				$result = mysqli_query($con, "UPDATE `tbl_student` set temp='$temp',ailment='$ailment',medication='$medication',comment = '$comment',toOtherHealthFacility='$toOtherHealthFacility',fromOtherHealthFacility='$fromOtherHealthFacility',toCommunityUnit='$toCommunityUnit',fromCommunityUnit='$fromCommunityUnit', day='$day', month='$month' WHERE adm_no='$adm_no'");
			} else {
				$result = mysqli_query($con, "UPDATE `tbl_student` set temp='$temp',ailment='$ailment',medication='$medication',comment = '$comment', toOtherHealthFacility='$toOtherHealthFacility',fromOtherHealthFacility='$fromOtherHealthFacility',toCommunityUnit='$toCommunityUnit',fromCommunityUnit='$fromCommunityUnit', first=1, day='$day', month = '$month' WHERE adm_no='$adm_no'");
			}
		}
		return $result;
	}
	public function first_cases($adm_no)
	{
		global $con;
		$day = date("j");
		$result = mysqli_query($con, "SELECT COUNT('ailment') AS FirstAilments,ailment FROM `tbl_student` WHERE day = '$day' AND counted = 0 AND first = 1");
		return $result;
	}
	public function reCases($adm_no)
	{
		global $con;
		$day = date("j");
		$result = mysqli_query($con, "SELECT COUNT('ailment') AS reAilments,ailment FROM `tbl_student` WHERE day = '$day' AND first = 1  AND counted = 1");
		return $result;
	}
	public function display_cases($ailment)
	{
		global $con;
		$result = mysqli_query($con, "SELECT ailment,day,sum(cases) as casesCount  FROM `summary_table` WHERE ailment = '$ailment'");
		return $result;
	}
	public function getTotalA($day)
	{
		global $con;
		$result = mysqli_query($con, "SELECT sum(cases) as TotalCases FROM `summary_table` WHERE day = '$day'");
		while ($row = mysqli_fetch_assoc($result)) {
			$sum = 0;
			$sum += $row['TotalCases'];
		}
		if ($sum > 0) {
			for ($t = 1; $t < 2; $t++) {
				echo $sum;
				continue;
			}
		}
	}

	public function getTotalRe($day)
	{
		global $con;
		$result = mysqli_query($con, "SELECT sum(reCases) as TotalReCases FROM `summary_table` WHERE day =" . $day);
		while ($row = mysqli_fetch_assoc($result)) {
			$sum = 0;
			$sum += $row['TotalReCases'];
		}
		if ($sum > 0) {
			for ($t = 1; $t < 2; $t++) {
				echo $sum;
				continue;
			}
		}
	}
	public function getSum()
	{
		global $con;
		$result = mysqli_query($con, "SELECT sum(reCases) as reCases FROM `summary_table`");
		while ($row = mysqli_fetch_assoc($result)) {
			$sum = 0;
			$sum += $row['reCases'];
		}
		echo $sum;
		# Goodness gratious it works....it works
		# Copy it to other functions
	}

	public function yesterday()
	{
		#date('d.m.Y',strtotime("-1 days"));
		global $con;
		$yesterday = date('d', strtotime("-1 days"));
		$result = mysqli_query($con, "UPDATE `tbl_student` set first = 0, counted = 0 WHERE day = '$yesterday'");
		return $result;
	}

	public function last_month()
	{
		global $con;
		mysqli_query($con, "UPDATE `tbl_student` set first = 0, counted = 0 WHERE `time` <= DATE_SUB(NOW(), INTERVAL 1 MONTH)");
	}


	public function toOtherHealthFacility($day)
	{
		global $con;
		$result = mysqli_query($con, "SELECT sum(toOtherHealthFacility) as toOther FROM `tbl_student` WHERE day =" . $day);
		while ($row = mysqli_fetch_assoc($result)) {
			$sum = 0;
			$sum += $row["toOther"];
		}
		echo $sum;
	}

	public function toCommunityUnit($day)
	{
		global $con;
		$result = mysqli_query($con, "SELECT sum(toCommunityUnit) as toCommunity FROM `tbl_student` WHERE day =" . $day);
		while ($row = mysqli_fetch_assoc($result)) {
			$sum = 0;
			$sum += $row["toCommunity"];
		}
		echo $sum;
	}

	public function fromCommunityUnit($day)
	{
		global $con;
		$result = mysqli_query($con, "SELECT sum(toCommunityUnit) as fromCommunity FROM `tbl_student` WHERE day =" . $day);
		while ($row = mysqli_fetch_assoc($result)) {
			$sum = 0;
			$sum += $row["fromCommunity"];
		}
		echo $sum;
	}

	public function summary_table_new_ailment($adm_no, $ailment)
	{
		global $con;
		mysqli_query($con, "UPDATE `tbl_student` set ailment = '$ailment' WHERE adm_no = '$adm_no'");
	}


	#Database : tbl_student
	#No. of days since the last time the student was at the sanatorium
	function dateDifference($start_date, $end_date)
	{
		# calulating the difference in timestamps 
		$diff = strtotime($start_date) - strtotime($end_date);

		# 1 day = 24 hours 
		# 24 * 60 * 60 = 86400 seconds
		if (strtotime($start_date) < strtotime($end_date)) {
			return 0;
		} else {
			return ceil(abs($diff / 86400));
		}
	}


	#Diseases that are not represented in the list to be added to the `ALL OTHER DISEASES` column
	public function unlisted_diseases()
	{
		global $con;
		$day = date('j');
		return mysqli_query($con, "SELECT ailment FROM `tbl_student` WHERE day = '$day'");
	}

	public function listed_diseases_compare($listedDisease)
	{
		global $con2;
		return mysqli_query($con2, "SELECT count(disease_name) as diseasePresent FROM `summary_table` WHERE disease_name = '$listedDisease'");
	}
	#Count all occurrences of this particular disease
	public function diseaseOccurrence($eachDisease)
	{
		global $con;
		$day = date("j");
		$result = mysqli_query($con, "SELECT COUNT(ailment) as ailmentCount FROM `tbl_student` WHERE ailment = '$eachDisease' AND day = '$day'");
		while ($row = $result->fetch_assoc()) {
			return $row["ailmentCount"];
		}
	}
	#Add unlisted disease into the "ALL OTHER DISEASES" row
	public function unlisted_diseases_push($NoOfUnliistedDiseases)
	{
		global $con2;
		$today = date('j');
		mysqli_query($con2, "UPDATE `summary_table` SET `$today`='$NoOfUnliistedDiseases' WHERE disease_name='<b>ALL OTHER DISEASES</b>'");
	}


	#to/from - referrals
	public function to_other_health_facility()
	{
		global $con, $con2;
		$day = date('j');
		$result = mysqli_query($con, "SELECT count(toOtherHealthFacility) AS countToOtherHealthFacility FROM tbl_student WHERE day = '$day' AND toOtherHealthFacility != '0'");
		while ($row = mysqli_fetch_assoc($result)) {
			$noToOtherHealthFacility = $row["countToOtherHealthFacility"];
		}
		mysqli_query($con2, "UPDATE `summary_table` SET `$day`='$noToOtherHealthFacility' WHERE id='72'");
	}
	public function from_other_health_facility()
	{
		global $con, $con2;
		$day = date('j');
		$result = mysqli_query($con, "SELECT count(fromOtherHealthFacility) AS countFromOtherHealthFacility FROM tbl_student WHERE day = '$day' AND fromOtherHealthFacility != '0'");
		while ($row = mysqli_fetch_assoc($result)) {
			$noFromOtherHealthFacility = $row["countFromOtherHealthFacility"];
		}
		mysqli_query($con2, "UPDATE `summary_table` SET `$day`='$noFromOtherHealthFacility' WHERE id='71'");
	}
	public function to_community_unit()
	{
		global $con, $con2;
		$day = date('j');
		$result = mysqli_query($con, "SELECT count(toCommunityUnit) AS countToCommunityUnit FROM tbl_student WHERE day = '$day'");
		while ($row = mysqli_fetch_assoc($result)) {
			$noToCommunityUnit = $row["countToCommunityUnit"];
		}
		mysqli_query($con2, "UPDATE `summary_table` SET `$day`='$noToCommunityUnit' WHERE id='74'");
	}

	public function from_community_unit()
	{
		global $con, $con2;
		$day = date('j');
		$result = mysqli_query($con, "SELECT count(fromCommunityUnit) AS countfromCommunityUnit FROM tbl_student WHERE day = '$day'");
		while ($row = mysqli_fetch_assoc()) {
			$nofromCommunityUnit = $row["countfromCommunityUnit"];
		}
		mysqli_query($con2, "UPDATE `summary_table` SET `$day`='$nofromCommunityUnit' WHERE id='73'");
	}

	# Count the number of first attendances to the nurse's
	function count_first_attendances(){
		global $con,$con2;
		$today = date("j");
		$result = mysqli_query($con, "SELECT count(first) AS firstAttendance FROM tbl_student WHERE day = '$today' AND first = '1'");
		while($row = mysqli_fetch_assoc($result)){
			# Outputs a number....remember that
			$no_of_first_attendances = $row["firstAttendance"];
		}
		#Now insert this number into the `test` db
		mysqli_query($con2, "UPDATE `summary_table` SET `$today`='$no_of_first_attendances' WHERE id='69'");
	}

	# Count the number of re-attendances to the nurse's
	function count_re_attendances(){
		global $con,$con2;
		$today = date("j");
		$result = mysqli_query($con, "SELECT count(counted) AS reAttendance FROM tbl_student WHERE day = '$today' AND counted != '0'");
		while($row = mysqli_fetch_assoc($result)){
			# Outputs a number....remember that
			$no_of_re_attendances = $row["reAttendance"];
		}
		#Now insert this number into the `test` db
		mysqli_query($con2, "UPDATE `summary_table` SET `$today`='$no_of_re_attendances' WHERE id='70'");
	}

	#Total number of first attendances; for particular disease
	public function listed_diseases_push($NoOfliistedDiseases, $eachDisease)
	{
		global $con2;
		$today = date('j');
		mysqli_query($con2, "UPDATE `summary_table` SET `$today`='$NoOfliistedDiseases' WHERE disease_name='$eachDisease'");
	}

	#Clear tomorrow's records to clean report
	
	function clear_tomorrow(){
		global $con2;
		$tomorrow = date("j", strtotime('tomorrow'));
		mysqli_query($con2, "UPDATE `summary_table` SET `$tomorrow`='0'");
	}
}
