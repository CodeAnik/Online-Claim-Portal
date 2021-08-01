<?php
    session_start();
    $page_title="Welcome to overtime teaching page";
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
    	$errors=$validate->validate_overtime_teaching_data($_POST);
    	if(empty($errors))
    	{

    		try
    		{
    			$name=$_POST['name'];
    			$facultyof=$_POST['facultyof'];
    			$emp_no=$_POST['emp_no'];
    			$dept=$_POST['department'];
    			$position=$_POST['position'];

    			$semester= $_POST['semester'];
    			$total_contact=$_POST['total_contact'];
    			$total_excess_252=$_POST['total_excess_252'];
    			$diploma_lecture_rate=$_POST['diploma_lecture_rate'];

    			$diploma_tutorial_rate=$_POST['diploma_tutorial_rate'];
    			$degree_lecture_rate=$_POST['degree_lecture_rate'];
    			$degree_tutorial_rate=$_POST['degree_tutorial_rate'];
    			$signature_hod=$_POST['signature_hod']; 
    			$signature_dean=$_POST['signature_dean'];
    			$signature_deputy_vc=$_POST['signature_deputy_vc'];
                $uploaded_by=$_SESSION['user_id'];

                $sql = "INSERT INTO overtime_teaching (name, faculty_of, emp_no , dept_name , position , semester , total_contact , total_excess_252 , diploma_lecture_rate ,  diploma_tutorial_rate , degree_lecture_rate, degree_tutorial_rate ,  signature_hod , signature_dean , signature_deputy_vc , added_by) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $stmt= $conn->prepare($sql);
                $stmt->execute([$name,$facultyof, $emp_no,$dept,$position,$semester,$total_contact,$total_excess_252,$diploma_lecture_rate,$diploma_tutorial_rate,$degree_lecture_rate,$degree_tutorial_rate,$signature_hod,$signature_dean,$signature_deputy_vc,$uploaded_by]);
                $last_id = $conn->lastInsertId();

                $number=$_POST['total_object'];

                for($x=0;$x<$number;++$x)
                {
                	$my_date="my_date-".$x;
                    $day="day-".$x;
                    $subject="subject-".$x;
                    $subject_code="subject_code-".$x;
                    $no_of_std="no_of_std-".$x;
                    $level="level-".$x;
                    $lecture="lecture-".$x;
                    $tutorial="tutorial-".$x;
                    $sql = "INSERT INTO overtime_teaching_data ( added_date, cur_day ,   subject , sub_code , no_of_std , deg_diploma_level, lecture , tutorial , overtime_teaching_tbl_id ) VALUES (?,?,?,?,?,?,?,?,?)";
                    $stmt= $conn->prepare($sql);
                    $stmt->execute([$_POST[$my_date],$_POST[$day],$_POST[$subject],$_POST[$subject_code],$_POST[$no_of_std],$_POST[$level],$_POST[$lecture],$_POST[$tutorial],$last_id]); 
                }
                $_SESSION['success_message']="over time teaching data inserted successfully";
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
    <title>Overtime Claim Form | Nilai University</title>
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
 
                                /* input form style End here*/
/*---------------------------------------------------------------------------------*/

</style>
</head>
<body>  
    <div class="">
        <img src="../assets/images/Overtime.png" alt="OvertimeClaimForm" width="100%" height="175px">

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
        <input class="" type="number" id="member" name="member" value="">How May row You Want?<br />
        <button style="color:#fff;" href="#" id="filldetails" onclick="add_rows()">Add Rows</button>

        <div id="main_table"/>
<!--         <form method="POST" class="container card">

                <div class="row">
                
                    <div class="col-md-6">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="col-md-6">
                        <label for="facultyof"> Faculty Of:</label>
                        <input type="text" class="form-control" id="facultyof" name="facultyof">
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
                        <label for="position"> Position:</label>
                        <input type="text" class="form-control" id="position" name="position">
                    </div>                    
                    <div class="col-md-6">
                        <label for="semester"> Semester</label>
                        <input type="text" class="form-control" id="semester" name="semester">
                    </div>
                </div>
	              <div class="mt-4 row" style="text-align: justify;-moz-text-align-last:justify ;text-align-last:justify;border:1px solid black; height: 100px;">
                    <div class="col-md-6">
                        <label for="position"> Total Contact Per Semester = </label>
                        <input type="text" class="form-control" id="total_contact" name="total_contact">
                    </div>                    
                    <div class="col-md-6">
                    	<div my="2">
                        <label for="semester"> Total Excess of 252 hours =</label>
                        <input type="text" class="form-control" id="total_excess_252" name="total_excess_252">
                    	</div>
                    </div>
	              </div><br>
            <table class="table table-striped">

                <thead>
                    <tr class="">
                        <th rowspan="2"  >Date</th>
                        <th rowspan="2" >Day</th>
                        <th rowspan="2" >Subject</th>
                        <th rowspan="2" >Sub Code</th>
                        <th rowspan="2">No of Std</th>
                        <th rowspan="2" >Level (Diploma/Degree)</th>
                        <th colspan="2" >Hour</th>
                    </tr>
                    <tr>
                        <th>Lecture</th>
                        <th>tutorial</th>
                    </tr>
                </thead>
                <tbody>
                <tr class="">
                  <td ><input type="date" name="my_date"class="form-control" required></td>
                  <td ><input type="text" name="day"class="form-control" required></td>
                  <td ><input type="text" name="subject"class="form-control" required></td>
                  <td ><input type="text" name="subject_code"class="form-control" required></td>
                  <td ><input type="text" name="no_of_std"class="form-control" required></td>
                  <td ><input type="text" name="level"class="form-control" required></td>
                  <td ><input type="number" name="lecture"class="form-control" required></td>
                  <td ><input type="number" name="tutorial"class="form-control" required></td>
                </tr>
                </tbody>
            </table>

 
 				<div class="row my-3">
 					<h3 class="col-12 text-center">(i) Diploma Program: </h3>

 					<div class="col-md-6">
 						Lecture RM <input type="number"  name="diploma_lecture_rate" required> Per Hour
 					</div>
 					<div class="col-6">
 						Tutorial RM <input type="number" name="diploma_tutorial_rate" required> Per Hour
 					</div>
 				</div>

 				<div class="row my-3">
 					<h3 class="col-12 text-center">(ii) Degree Program: </h3>

 					<div class="col-md-6">
 						Lecture RM <input type="number"  name="degree_lecture_rate" required> Per Hour
 					</div>
 					<div class="col-6">
 						Tutorial RM <input type="number" name="degree_tutorial_rate" required> Per Hour
 					</div>
 				</div> 				

                <div style="background-color:rgb(5, 184, 238);color:rgb(0, 0, 0);padding-left: 10px">
                  <h2>PART-II</h2>
                </div>

                <div class="row my-3">
                	<div class="col-md-4">
                		Verified By</br>
                        <input type="text" id="signature" name="signature_hod">
                        <p>Head of Department</p>
                	</div>
                	<div class="col-md-4">
                       	Recommended by</br>
                        <input type="text" id="signature" name="signature_dean">
                        <p>Dean of Faculty</p>                		
                	</div>
                	<div class="col-md-4">
                        Approved by</br>
                        <input type="text" id="signature" name="signature_deputy_vc">
                        <p>Deputy Vice Chancellor</p>                		
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
        </form> -->


    </div>

    <?php include '../partials/js_files.php' ?>
    <script src="../assets/js/overtime_teaching.js" type="text/javascript"></script>

</body>
</html> 