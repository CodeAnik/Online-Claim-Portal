<?php
	
	class Query
	{
		private $db;
		public function __construct($conn)
		{
			$this->db=$conn;
		}


		public function part_time_claim_data($user_id)
		{

			try
			{
				$statement = $this->db->prepare("SELECT * from `part_time_teaching`
					where part_time_teaching.added_by=:added_by
					");
				$statement->execute(array(':added_by' => $user_id));
				$rows = $statement->fetchAll();
				return $rows;
 
			}
			catch(PDOException $e)
			{
				echo "The error is ".$e;
			}
 		}


 		public function overtime_claim_data($user_id)
 		{
 			try
			{
				$statement = $this->db->prepare("SELECT overtime_teaching.* from `overtime_teaching`
					where overtime_teaching.added_by=:added_by
					");
				$statement->execute(array(':added_by' => $user_id));
				$rows = $statement->fetchAll();
				return $rows;
 
			}
			catch(PDOException $e)
			{
				echo "The error is ".$e;
			}
 		}

 		public function expense_claim_data($user_id)
 		{
 			try
			{
				$statement = $this->db->prepare("SELECT expense_claim.* from expense_claim
					where expense_claim.uploaded_by=:added_by
					");
				$statement->execute(array(':added_by' => $user_id));
				$rows = $statement->fetchAll();
				return $rows;
 
			}
			catch(PDOException $e)
			{
				echo "The error is ".$e;
			} 			
 		}

 		public function question_claim_data($user_id)
 		{

 			try
			{
				$statement = $this->db->prepare("SELECT `question_paper_form`.* from question_paper_form
					where question_paper_form.uploaded_by=:added_by
					");
				$statement->execute(array(':added_by' => $user_id));
				$rows = $statement->fetchAll();
				return $rows;
 
			}
			catch(PDOException $e)
			{
				echo "The error is ".$e;
			} 	 		
		}


		public function form_wise_total_data($table_name)
		{
			$sql = "SELECT count(*) FROM $table_name"; 
			$result = $this->db->prepare($sql); 
			$result->execute(); 
			$rows = $result->fetchColumn(); 
			return $rows;
		}


		public function part_time_claim_data_for_admin()
		{
			try
			{
				$statement = $this->db->prepare("SELECT * from `part_time_teaching`");
				$statement->execute();
				$rows = $statement->fetchAll();
				return $rows;
 
			}
			catch(PDOException $e)
			{
				echo "The error is ".$e;
			}
		}


		public function overtime_claim_data_for_admin()
		{
			try
			{
				$statement = $this->db->prepare("SELECT overtime_teaching.* from `overtime_teaching`");
				$statement->execute();
				$rows = $statement->fetchAll();
				return $rows;
 
			}
			catch(PDOException $e)
			{
				echo "The error is ".$e;
			}
		}

		public function expense_claim_data_for_admin()
		{
			try
			{
				$statement = $this->db->prepare("SELECT expense_claim.* from expense_claim ");
				$statement->execute();
				$rows = $statement->fetchAll();
				return $rows;
 
			}
			catch(PDOException $e)
			{
				echo "The error is ".$e;
			} 
		}


		public function question_claim_data_for_admin()
		{
			try
			{
				$statement = $this->db->prepare("SELECT `question_paper_form`.* from question_paper_form");
				$statement->execute();
				$rows = $statement->fetchAll();
				return $rows;
 
			}
			catch(PDOException $e)
			{
				echo "The error is ".$e;
			} 
		}


		public function find_user($id)
		{
			try
			{
				$stmt = $this->db->prepare("SELECT id,username FROM users WHERE id=$id LIMIT 1"); 
				$stmt->execute(); 
				$row = $stmt->fetch();
				return $row;
			}
			catch(PDOException $e)
			{
				echo "The error is ".$e;
			}

		}

		public function get_parttime_claim_data_by_id($id)
		{
			$stmt = $this->db->prepare("SELECT * FROM part_time_teaching WHERE id=$id LIMIT 1"); 
			$stmt->execute(); 
			$row = $stmt->fetch();
			return $row;
		}


		public function get_parttime_all_data_by_id($id)
		{
			$stmt = $this->db->prepare("SELECT `part_time_teaching_data`.* FROM part_time_teaching_data WHERE part_time_teaching_tbl_id=$id"); 
			$stmt->execute(); 
			$rows = $stmt->fetchAll();
			return $rows;	
		}

		public function get_overtime_data_by_id($id)
		{
			
			$stmt = $this->db->prepare("SELECT * FROM overtime_teaching WHERE id=$id LIMIT 1"); 
			$stmt->execute(); 
			$row = $stmt->fetch();
			return $row;			
		}

		public function get_all_overtime_data($id)
		{
			$stmt = $this->db->prepare("SELECT `overtime_teaching_data`.* FROM overtime_teaching_data WHERE overtime_teaching_tbl_id=$id"); 
			$stmt->execute(); 
			$rows = $stmt->fetchAll();
			return $rows;	
		}

		public function get_expense_claim_data_by_id($id)
		{
			$stmt = $this->db->prepare("SELECT * FROM expense_claim WHERE id=$id LIMIT 1"); 
			$stmt->execute(); 
			$row = $stmt->fetch();
			return $row;

		}

		public function get_all_expense_claim_data_tableA($id)
		{
			$stmt = $this->db->prepare("SELECT `expense_claim_form_data_a`.* FROM expense_claim_form_data_a WHERE expense_claim_id=$id"); 
			$stmt->execute(); 
			$rows = $stmt->fetchAll();
			return $rows;			
		}

		public function get_all_expense_claim_data_tableB($id)
		{
			$stmt = $this->db->prepare("SELECT `expense_claim_form_data_b`.* FROM expense_claim_form_data_b WHERE explain_claim_id=$id"); 
			$stmt->execute(); 
			$rows = $stmt->fetchAll();
			return $rows;			
		}

		public function get_question_data_by_id($id)
		{
			$stmt = $this->db->prepare("SELECT * FROM question_paper_form WHERE id=$id LIMIT 1"); 
			$stmt->execute(); 
			$row = $stmt->fetch();
			return $row;	
		}


		public function get_all_question_data($id)
		{
			$stmt = $this->db->prepare("SELECT `question_paper_form_data`.* FROM question_paper_form_data WHERE question_paper_form_id=$id"); 
			$stmt->execute(); 
			$rows = $stmt->fetchAll();
			return $rows;
		}

	}
?>