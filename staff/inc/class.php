<?php
class DB{
	public function db_con(){
		$this->server_name = "localhost";
		$this->user_name = "root";
		$this->pass_word = "";
		$this->db_name = "san-code";
		$this->con = new mysqli($this->server_name, $this->user_name, $this->pass_word, $this->db_name);
	}
	
	public function delete_yesterdays_staff_records(){
		#Delete records that don't have an adm_no
		global $con;

		$result = mysqli_query($this->con, "SELECT * FROM `tbl_student`");
		while($row = $result->fetch_assoc()){
			$yesterday = date('d',strtotime("-5 days"));
			$record_date = $row["day"];
			if($record_date <= $yesterday){
				mysqli_query($con, "DELETE FROM `tbl_student` WHERE adm_no = 0");
			}
		}
	}
}
