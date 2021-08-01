<?php
    session_start();
    $page_title="Welcome to question paper & answer script teaching page";
    include_once '../db/DB.php';
    include_once '../db/Validate.php';
    $conn=DB::getConnection();
    $validate=new Validate($conn);
    $errors = array();

    if(!isset($_SESSION['user_id']))
    {
        $_SESSION['error_message']="You Have to log In first";
        header("Location: ../index.php");
    }
    
    if(isset($_POST['submit_form']))
    {
        $errors=$validate->validate_question_paper_form_data($_POST);
        if(empty($errors))
        {
            try
            {
                $name=$_POST['name'];
                $school=$_POST['school'];
                $emp_no=$_POST['emp_no'];
                $department=$_POST['department'];

                $status=$_POST['status'];
                $month=$_POST['month'];
                $two_hour_script=$_POST['two_hour_script'];
                $two_and_half_hour_script=$_POST['two_and_half_hour_script'];

                $three_hour_script=$_POST['three_hour_script'];
                $two_hour_paper=$_POST['two_hour_paper'];
                $two_and_half_hour_paper=$_POST['two_and_half_hour_paper'];
                $three_hour_paper=$_POST['three_hour_paper'];


                $signature=$_POST['signature'];
                $signature_date=$_POST['signature_date']; 
                $signature_hod_or_cordinator=$_POST['signature_hod_or_cordinator'];
                $signature_dean_school=$_POST['signature_dean_school'];
                $signature_head_exam_unit=$_POST['signature_head_exam_unit'];

                $uploaded_by=$_SESSION['user_id'];

                $sql = "INSERT INTO question_paper_form (name, school , emp_no , department , cur_status, cur_month , two_hour_script , two_and_half_hour_script , three_hour_script ,two_hour_paper, two_and_half_hour_paper , three_hour_paper ,signature , cur_date , signature_hod_or_cordinator , signature_dean_of_school , signature_head_of_exam_unit , uploaded_by ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $stmt= $conn->prepare($sql);
                $stmt->execute([$name,$school,$emp_no,$department,$status,$month,$two_hour_script,$two_and_half_hour_script,$three_hour_script,$two_hour_paper,$two_and_half_hour_paper,$three_hour_paper,$signature,$signature_date,$signature_hod_or_cordinator,$signature_dean_school,$signature_head_exam_unit,$uploaded_by]);
                $last_id = $conn->lastInsertId();

                $number=$_POST['total_object'];

                for($i=0;$i<$number;++$i)
                {
                    $semester="semester-".$i;
                    $subject="subject-".$i;
                    $question_duration="question_duration-".$i;
                    $answer_script_or_question="answer_script_or_question_paper-".$i;
                    $answer_script_or_question_type="answer_script_or_question_paper_type-".$i;

                    $sql = "INSERT INTO question_paper_form_data ( semester , subject ,   duration_of_question , ans_script_or_question_set_amount , ans_script_or_question_set_amount_type , question_paper_form_id ) VALUES (?,?,?,?,?,?)";
                    $stmt= $conn->prepare($sql);
                    $stmt->execute([$_POST[$semester] ,$_POST[$subject] , $_POST[$question_duration] , $_POST[$answer_script_or_question] ,$_POST[$answer_script_or_question_type] , $last_id]);
                }
                $_SESSION['success_message']="question paper data inserted successfully";
                header("Location: ../index.php");


            }
            catch(PDOException $e)
            {
                echo "Sql pdo query error".$e;
            }
        }
    }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Claim For Marking of Answer Scripts & Questions Papers | Nilai University</title>
    <?php include '../partials/css_files.php' ?>
<style type="text/css">
/* body style here */

body {
    background: rgb(204,204,204);
    background-color:white;
    overflow:scroll;
}

                        /* page style here */
/*---------------------------------------------------------------------------------*/

page {
    background: white;
    display: block;
    margin: 0 auto;
    margin-bottom: 0.5cm;
    box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
page[size="A4"] {  
    width: 21cm;
    height: auto;
 
}
@media print {
  body, page {
    margin: 0;
    box-shadow: 0;
  }
}
.box{
    width: auto;
    height:auto;  
    padding: 20px;

}
                                  /* page style end here*/
/*---------------------------------------------------------------------------------*/


                                /* Part II style Start here*/
/*---------------------------------------------------------------------------------*/

.rightbox {
    float: right;
    right: -20px;
    width: 300px;
    text-align:center;

}
.leftbox{
    float: left;
    left: 0px;
    width: 300px;
    text-align:center;
}

 /* Part II text box style*/
.text-block {
    padding-left: 10px;
    padding-right: 10px;
    padding-top: 10px;
    padding-bottom: 10px;
    background-color: rgb(6, 171, 177);
    color: rgb(0, 0, 0);
    text-align: justify;
    -moz-text-align-last:right ;
    text-align-last:left;
}

button{
    background-color: #f4511e;
    border: 2px solid #ffffff;
    border-radius: none;
    color: #fcfcfc;
    padding: 10px 25px;
    font-size: 16px;
    outline: none;
    opacity: 0.6;
    transition: 0.5s;
    display: inline-block;
    text-decoration: none;
    cursor: pointer;
  }
.button:hover {opacity: 1}

                                /* Part II style End here*/
/*---------------------------------------------------------------------------------*/


                                /* input form style Start here*/
/*---------------------------------------------------------------------------------*/


.form-inline {  
  display: flex;
  align-items:flex-end;
  text-align: justify;
  -moz-text-align-last:justify;
  text-align-last:justify;
  
}

.form-inline label {
  margin: 5px 10px 5px 50px;
}

.form-inline input {
  vertical-align: middle;
  margin: 5px 10px 5px 0;
  padding: 5px;
  background-color: #fff;
  border: 1px solid #ddd;
}
@media (max-width: 800px) {
  .form-inline input {
    margin: 10px 0px;
  }
  
  .form-inline {
    flex-direction: column;
    align-items:stretch;
  }
}
input[type=text] {
  width: auto;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 1px solid rgb(65, 65, 65);
}

                                /* input form style End here*/
/*---------------------------------------------------------------------------------*/

</style>
</head>
<body>  
    <div class="">
        <img src="../assets/images/QuestionPaper.png" alt="QuestionsMarking" width="100%" height="175px">
            <div class="row">
                <?php
                    if(!empty($errors))
                    {
                         foreach ($errors as $error) 
                         {
                ?>
                    <div class="col-md-6 offset-md-3">
                        <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                        </div>
                    </div>

                <?php
                        }
                    $errors=array();   
                   }
                ?>
            </div>

        <input class="" type="number" id="member" name="member" value="">How Many Row You Want?<br />
        <button style="color:#fff;" href="#" id="filldetails" onclick="add_rows()">Add Rows</button> 
         <div id="main_table"/>
<!--         <form method="POST" class="container card">

                <div class="row">
                
                    <div class="col-md-6">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="col-md-6">
                        <label for="school"> School</label>
                        <input type="text" class="form-control" id="school" name="school">
                    </div>
                    <div class="col-md-6">
                        <label for="emp_no">Emp No:</label>
                        <input type="text" class="form-control" id="emp_no" name="emp_no">
                    </div>
                    <div class="col-md-6">
                        <label for="department"> Department:</label>
                        <input type="text" class="form-control" id="department" name="department">
                    </div>
                    <div class="col-md-6">
                        <label for="status"> Status</label>
                        <input type="text" class="form-control" id="status" name="status" placeholder="partime/fulltime">
                    </div>                    
                    <div class="col-md-6">
                        <label for="month"> Month</label>
                        <input type="text" class="form-control" id="month" name="month">
                    </div>
                </div>

            <table class="table table-striped">

                <thead>
                    <tr class="">
                        <th rowspan="2" >Semester</th>
                        <th rowspan="2">Subject</th>
                        <th rowspan="2" >Duration of question</th>
                        <th colspan="2" >Marked answer script/Question Paper set</th>
                    </tr>
                    <tr>
                        <th>Amount</th>
                        <th>Select Type</th>
                    </tr>
                </thead>
                <tbody>
                <tr class="">
                  <td ><input type="text" name="my_date"class="form-control" required></td>
                  <td ><input type="text" name="no_of_std"class="form-control" required></td>
                  <td ><input type="text" name="level"class="form-control" required></td>
                  <td> <input type="number" name="lecture"class="form-control" required></td>
                  <td >
                      <select id="inputState" name="answer_type" class="form-control">
                        <option value="0">Answer Script</option>
                        <option value="1">Question set</option>
                      </select>
                  </td>

                </tr>
                </tbody>
            </table>

 
                <div class="row my-3">
                    <h3 class="col-12 text-center">(i) Marking of Answer Scripts </h3>

                    <div class="col-md-8 offset-md-2 mt-2">        
                         (a) 2.0-hour paper: RM 6.00 per scripts X <input type="number"  name="two_hour_script" required> Per Hour
                    </div>
                    <div class="col-md-8 offset-md-2 mt-2">        
                         (b) 2.5-hour paper: RM 7.00 per scripts X<input type="number"  name="two_and_half_hour_script" required> Per Hour
                    </div>
                    <div class="col-md-8 offset-md-2 mt-2">        
                         (c) 3.0-hour paper: RM 8.00 per scripts X  <input type="number"  name="three_hour_script" required> Per Hour
                    </div>

                </div>

                <div class="row my-3">
                    <h3 class="col-12 text-center">(ii) Setting Examination Question Papers </h3>

                    <div class="col-md-8 offset-md-2 mt-2">        
                        (a) 2.0-hour paper: RM 75.00 per Paper X <input type="number"  name="two_hour_paper" required> Per Hour
                    </div>
                    <div class="col-md-8 offset-md-2 mt-2">        
                        (b) 2.5-hour paper: RM 85.00 per Paper X<input type="number"  name="two_and_half_hour_paper" required> Per Hour
                    </div>
                    <div class="col-md-8 offset-md-2 mt-2">        
                         (c) 3.0-hour paper: RM 100.00 per Paper X  <input type="number"  name="three_hour_paper" required> Per Hour
                    </div>

                </div> 

                <div class="row">
                    <div class="col-md-6">
                        <label for="signature">Signature:</label>
                        <input type="text" class="form-control" id="signature" name="signature">
                    </div>
                    <div class="col-md-6">
                        <label for="signature_date">Date:</label>
                        <input type="date" class="form-control" id="signature_date" name="signature_date">
                    </div>
                </div>        

                <div style="background-color:rgb(5, 184, 238);color:rgb(0, 0, 0);padding-left: 10px">
                  <h2>PART-II</h2>
                </div>

                <div class="row my-3">
                    <div class="col-md-4">
                        Verified By</br>
                        <input type="text" id="signature" name="signature_hod_or_cordinator">
                        <p>Head of Department / Program Cordinator</p>
                    </div>
                    <div class="col-md-4">
                        Recommended / Not Recommended by</br>
                        <input type="text" id="signature" name="signature_dean_school">
                        <p>Dean of School</p>                      
                    </div>
                    <div class="col-md-4">
                        Varified by</br>
                        <input type="text" id="signature" name="signature_head_exam_unit">
                        <p>Head of Exam unit</p>                       
                    </div>
                </div>

                    <div class="text-block">
                        <p>1. Please attach Student Attendance Sheet with this claim; Claims must be verified and approved by the Head of Deportment. </p>
                        <p>2. All claims must be submitted to the respective Admit; Assistants/Officers in the School by end of the month.</p>
                        <p>3. School Admin Assistants/Officers would need to submit the claims to HR deportment before/on 5th of the following month to be able to process the claim in the some month. (e.g. Claims for the month of January must be submitted to HR department by Ch February in order to process the payment in February)</p>
                        <p>4- Claims submitted after 5th of the month will be processed in the following month.</p>
                    </div>
                  </div>

                <div style="display: flex; justify-content: center;; padding-bottom:10px;">

                <button type="button" class="" data-toggle="modal" data-target="#exampleModal">
                 Submit
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Are You sure to submit ?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit_form" class="btn btn-primary">YES</button>
                      </div>
                    </div>
                  </div>
                </div>
                    <a href="../index.php"><button type="button" class="button">Cancel</button></a>
                    <button type="button" class="button">Dashboard</button>
                </div>
        </form>     -->    

    </div>

    <?php include '../partials/js_files.php' ?>
    <script src="../assets/js/question_paper_form.js" type="text/javascript"></script>
</body>
</html> 