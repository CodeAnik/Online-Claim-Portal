<?php

    class Validate
    {
        private $db;

        public function __construct($conn)
        {
            $this->db=$conn;
        }

        public function verify_signup_data($username,$email,$user_type,$pass1,$pass2)
        {
            $errors=array();
            if(strlen($username)<5)
            {
                $errors[]='Username is too short';
            }
            elseif (!preg_match('/^[a-z\d]{2,64}$/i', $username))
            {
                $errors[]='Username can not contain special character';
            }
            else if(strlen($pass1)<5 || strlen($pass2)<5)
            {
                $errors[]='password is too short';
            }
            else if(strcasecmp( $pass1,$pass2 )!=0)
            {
                $errors[]='password does not match';
            }

            try
            {
                $stmt = $this->db->prepare("SELECT id FROM users where email='$email'");
                $stmt->execute();
                $count = $stmt->rowCount();
                if($count>0)
                {
                    $errors[]='email already exist';
                }
            }
            catch(PDOException $e)
            {
                $errors[]='may be sql query error';
            }

            return $errors;
        }

        public function varify_login_data($email,$pass)
        {
            $errors=array();

            try
            {
                $stmt = $this->db->prepare("SELECT id,active_status FROM users where email='$email' and pass='$pass'");
                $stmt->execute();
                $count = $stmt->rowCount();
                $results = $stmt->fetch(PDO::FETCH_ASSOC);
                if($count==0)
                {
                     $errors[]='email and password you provided are invalid';
                }
                else
                {
                    if($results['active_status']==0)
                    {
                        $errors[]='account is not activated yet';
                    }
                }
            }
            catch(PDOException $e)
            {
                $errors[]='may be sql query error';
            }

            return $errors;
        }


        public function validate_parttime_teaching_data($post_dict)
        {
            $errors=array();

            try
            {

                if( !isset($post_dict['name']) || !isset($post_dict['schoolof']) || !isset($post_dict['month']) || !isset($post_dict['department']) || !isset($post_dict['lecture_rate']) ||
                !isset($post_dict['tutorial_rate']) ||  !isset($post_dict['traveling_days'])  || !isset($post_dict['signature']) || !isset($post_dict['cur_date']) ||  !isset($post_dict['signature_hod']) || !isset($post_dict['signature_dean']) )
                {
                    $errors[]='Please fill up input fields perfectly there are something wrongggggg';
                    return $errors;
                }

            }
            catch(Exception $e)
            {
                 $errors[]='There are some problem from exception blockkkkk';
                 return $errors;
            }

            try
            {
                $number=$post_dict['total_object'];
                for ($x = 0; $x <$number; $x++)
                {
                    $my_date="my_date-".$x;
                    $subject="subject-".$x;
                    $hours="hours-".$x;
                    $lecture_type="lecture_type-".$x;
                    $varified_by="varified_by-".$x;

                    if(!isset($post_dict[$my_date]) || !isset($post_dict[$subject]) || !isset($post_dict[$hours]) || !isset($post_dict[$lecture_type]) || !isset($post_dict[$varified_by]))
                    {
                         $errors[]='Please fill up input fields perfectly there are something wrong';
                         return $errors;
                    }
                }

            }
            catch(Exception $e)
            {
                 $errors[]='There are some problem from exception block';
            }

            return $errors;
        }

        public function validate_overtime_teaching_data($post_dict)
        {
            $errors=array();

            try
            {
                if(!isset($post_dict['name']) || !isset($post_dict['facultyof']) || !isset($post_dict['emp_no']) || !isset($post_dict['department']) || !isset($post_dict['position']) || !isset($post_dict['semester']) || !isset($post_dict['total_contact']) || !isset($post_dict['total_excess_252']) || !isset($post_dict['diploma_lecture_rate']) || !isset($post_dict['diploma_tutorial_rate']) || !isset($post_dict['degree_lecture_rate']) || !isset($post_dict['degree_tutorial_rate']) || !isset($post_dict['signature_hod']) || !isset($post_dict['signature_dean']) || !isset($post_dict['signature_deputy_vc']))
                {
                    $errors[]='Please fill up input fields perfectly there are something wrongggggg';
                    return $errors;
                }
            }
            catch(Exception $e)
            {
                $errors[]='There are some problem from exception blockkkkk';
                return $errors;
            }
            
            try
            {
                $number=$post_dict['total_object'];

                for($x=0;$x<$number;$x++)
                {
                    $my_date="my_date-".$x;
                    $day="day-".$x;
                    $subject="subject-".$x;
                    $subject_code="subject_code-".$x;
                    $no_of_std="no_of_std-".$x;
                    $level="level-".$x;
                    $lecture="lecture-".$x;
                    $tutorial="tutorial-".$x;

                    if(!isset($post_dict[$my_date]) || !isset($post_dict[$day]) || !isset($post_dict[$subject]) || !isset($post_dict[$subject_code]) || !isset($post_dict[$no_of_std]) || !isset($post_dict[$level]) || !isset($post_dict[$lecture]) || !isset($post_dict[$tutorial]))
                    {
                        $errors[]='Please fill up input fields perfectly there are something wrong';
                        return $errors;
                    }
                }
            }
            catch(Exception $e)
            {
                $errors[]='There are some problem from exception block';
            }

            return $errors;
        }


        public function validate_question_paper_form_data($post_dict)
        {
            $errors=array();


            try
            {

                if(!isset($post_dict['name']) || !isset($post_dict['school']) || !isset($post_dict['emp_no']) || !isset($post_dict['department']) || !isset($post_dict['status']) || !isset($post_dict['month']) || !isset($post_dict['two_hour_script']) || !isset($post_dict['two_and_half_hour_script']) || !isset($post_dict['three_hour_script']) || !isset($post_dict['two_hour_paper']) || !isset($post_dict['two_and_half_hour_paper']) || !isset($post_dict['three_hour_paper']) )
                {
                    $errors[]='Please fill up input fields perfectly there are something wrongggggg';
                    return $errors;                   
                }

            }
            catch(Exception $e)
            {
                $errors[]='There are some problem from exception blockkkkk';
                return $errors;
            }

            try
            {
                $number=$post_dict['total_object'];

                for($i=0;$i<$number;++$i)
                {
                    $semester="semester-".$i;
                    $subject="subject-".$i;
                    $question_duration="question_duration-".$i;
                    $answer_script_or_question="answer_script_or_question_paper-".$i;
                    $answer_script_or_question_type="answer_script_or_question_paper_type-".$i;

                    if(!isset($post_dict[$semester]) || !isset($post_dict[$subject]) || !isset($post_dict[$question_duration]) || !isset($post_dict[$answer_script_or_question]) || !isset($post_dict[$answer_script_or_question_type]) )
                    {
                        $errors[]='Please fill up input fields perfectly there are something wrong';
                        return $errors;
                    }
                }

            }
            catch(Exception $e)
            {
                $errors[]='There are some problem from exception block';
            }

            return $errors;
        }



        public function validate_expense_claim_data($post_dict)
        {
            $errors=array();

            try
            {


                if(!isset($post_dict['name']) || !isset($post_dict['staff_no']) || !isset($post_dict['department']) || !isset($post_dict['month']) || !isset($post_dict['first_500']) || !isset($post_dict['there_after']) || !isset($post_dict['staff_signature']) || !isset($post_dict['signature']) )
                {
                    $errors[]='Please fill up input fields perfectly there are something wrong';
                    return $errors;
                }
            }
            catch(Exception $e)
            {
                $errors[]='There are some problem from exception blockkkkk';
                return $errors;
            }

            try
            {
                $number=$post_dict['total_object'];

                for($i=0;$i<$number;++$i)
                {
                    $my_date="my_date-".$i;
                    $description="description-".$i;
                    $remarks="remarks-".$i;
                    $amount_1="amount_1-".$i;
                    $amount_2="amount_2-".$i;

                    if(!isset($post_dict[$my_date]) || !isset($post_dict[$description]) || !isset($post_dict[$remarks]) || !isset($post_dict[$amount_1]) || !isset($post_dict[$amount_2]) )
                    {
                        $errors[]='Please fill up input fields perfectly there are something wrong';
                        return $errors;
                    }
                }

            }
            catch(Exception $e)
            {
                $errors[]='There are some problem from exception block';
            }


            try
            {
                $number=$post_dict['total_object'];

                for($i=0;$i<$number;++$i)
                {

                    $destination_and_purpose="destination_and_purpose-".$i;
                    $no_of_km="no_of_km-".$i;
                    $parj_and_toll="parj_and_toll-".$i;
                    $account_rm="account_rm-".$i;
                    $misc_rm="misc_rm-".$i;
                    $b_fast="b_fast-".$i;
                    $lunch="lunch-".$i;
                    $dinner="dinner-".$i;
                    $amount_rm_1="amount_rm_1-".$i;
                    $amount_rm_2="amount_rm_2-".$i;
                    // i am here
                    if(!isset($post_dict[$destination_and_purpose]) || !isset($post_dict[$no_of_km]) || !isset($post_dict[$parj_and_toll]) || !isset($post_dict[$account_rm]) || !isset($post_dict[$misc_rm]) || !isset($post_dict[$b_fast]) || !isset($post_dict[$lunch]) || !isset($post_dict[$dinner]) || !isset($post_dict[$amount_rm_1]) || !isset($post_dict[$amount_rm_2]) )
                    {
                        $errors[]='Please fill up input fields perfectly there are something wrong';
                        return $errors;
                    }
                }

            }
            catch(Exception $e)
            {
                $errors[]='There are some problem from exception block';
            }

            return $errors;


        }
    }
?>