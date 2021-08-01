<?php
    session_start();
    $page_title="Welcome to part time claim page";
    include_once '../../db/DB.php';
    include_once '../../db/Validate.php';
    include_once '../../db/Query.php';
    $conn=DB::getConnection();
    $validate=new Validate($conn);
    $errors = array();

    if(!isset($_SESSION['user_id']))
    {
        $_SESSION['error_message']="You Have to log In first";
        header("Location: ../../index.php");
    }
    $query_obj=new Query($conn);

    $table_data=$query_obj->get_question_data_by_id($_GET['id']);
    $rows=$query_obj->get_all_question_data($table_data['id']);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Claim For Marking of Answer Scripts & Questions Papers | Nilai University</title>
    <?php include '../../partials/css_files.php' ?>
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
        <img src="../../assets/images/QuestionPaper.png" alt="QuestionsMarking" width="100%" height="175px">
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

 
        <form method="POST" class="container card">

                <div class="row">
                
                    <div class="col-md-6">
                        <h3 for="name">Name: <?php echo $table_data['name']; ?> </h3>
                    </div>
                    <div class="col-md-6">
                        <h3 for="name">School: <?php echo $table_data['school']; ?> </h3>
                    </div>
                    <div class="col-md-6">
                        <h3 for="name">Emp No: <?php echo $table_data['emp_no']; ?> </h3>
                    </div>
                    <div class="col-md-6">
                        <h3 for="name">Department: <?php echo $table_data['department']; ?> </h3>
                    </div>
                    <div class="col-md-6">
                        <h3 for="name">Status : <?php echo $table_data['cur_status']; ?> </h3>
                    </div>                    
                    <div class="col-md-6">
                        <h3 for="name">Month: <?php echo $table_data['cur_month']; ?> </h3>
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
                <?php
                foreach($rows as $row)
                {
                ?>
                <tr class="">
                  <td ><?php echo $row['semester']; ?></td>
                  <td ><?php echo $row['subject']; ?></td>
                  <td ><?php echo $row['duration_of_question']; ?></td>
                  <td ><?php echo $row['ans_script_or_question_set_amount']; ?></td>
                  <td ><?php echo $row['ans_script_or_question_set_amount_type']==0?"Answer Script":"Question Set"; ?></td>

                </tr>

                <?php } ?>
                </tbody>
            </table>

 
                <div class="row my-3">
                    <h3 class="col-12 text-center">(i) Marking of Answer Scripts </h3>

                    <div class="col-md-8 offset-md-2 mt-2">        
                        <p> (a) 2.0-hour paper: RM 6.00 per scripts X <?php echo $table_data['two_hour_script']; ?> Per Hour   =   <?php echo $table_data['two_hour_script']*6.00; ?> </p>
                    </div>
                    <div class="col-md-8 offset-md-2 mt-2">        
                     
                         <p> (b) 2.5-hour paper: RM 7.00 per scripts X <?php echo $table_data['two_and_half_hour_script']; ?> Per Hour   =   <?php echo $table_data['two_and_half_hour_script']*7.00; ?> </p>
                    </div>
                    <div class="col-md-8 offset-md-2 mt-2">        
                         <p>  (c) 3.0-hour paper: RM 8.00 per scripts X <?php echo $table_data['three_hour_script']; ?> Per Hour   =   <?php echo $table_data['three_hour_script']*8.00; ?> </p>                         
                    </div>
                    <div class="col-md-8 offset-md-2 mt-2">        
                         <p>  <b> SUB TOTAL = </b><?php echo $table_data['two_hour_script']*6.00 + $table_data['two_and_half_hour_script']*7.00 + $table_data['three_hour_script']*8.00;?>                         
                    </div>
                </div>

                <div class="row my-3">
                    <h3 class="col-12 text-center">(ii) Setting Examination Question Papers </h3>

                    <div class="col-md-8 offset-md-2 mt-2">        
                         <p> (a) 2.0-hour paper: RM 75.00 per Paper X <?php echo $table_data['two_hour_paper']; ?> Per Hour   =   <?php echo $table_data['two_hour_paper']*75.00; ?> </p> 
                    </div>
                    <div class="col-md-8 offset-md-2 mt-2">        
 
                        <p> (b) 2.5-hour paper: RM 85.00 per Paper X <?php echo $table_data['two_and_half_hour_paper']; ?> Per Hour   =   <?php echo $table_data['two_and_half_hour_paper']*85.00; ?> </p> 
                    </div>
                    <div class="col-md-8 offset-md-2 mt-2">        
                        <p> (c) 3.0-hour paper: RM 100.00 per Paper X <?php echo $table_data['three_hour_paper']; ?> Per Hour   =   <?php echo $table_data['three_hour_paper']*100.00; ?> </p>                         
                    </div>
                    <div class="col-md-8 offset-md-2 mt-2">        
                         <p>  <b>SUB TOTAL = </b><?php echo $table_data['two_hour_paper']*75.00 + $table_data['two_and_half_hour_paper']*85.00 + $table_data['three_hour_paper']*100.00;?> </p>                         
                    </div>
                    <div class="col-md-8 offset-md-2 mt-2">        
                         <p>  <b>Grand TOTAL = </b> <?php echo $table_data['two_hour_script']*6.00 + $table_data['two_and_half_hour_script']*7.00 + $table_data['three_hour_script']*8.00 + $table_data['two_hour_paper']*75.00 + $table_data['two_and_half_hour_paper']*85.00 + $table_data['three_hour_paper']*100.00; ?> </p>                         
                    </div>
                </div> 

                <div class="row">
                    <div class="col-md-6">
                        <label for="signature">Signature:</label>
                        <p> <?php echo $table_data['signature']; ?></p>
                    </div>
                    <div class="col-md-6">
                        <label for="signature_date">Date:</label>
                        <p> <?php echo $table_data['cur_date']; ?></p>
                    </div>
                </div>        

                <div style="background-color:rgb(5, 184, 238);color:rgb(0, 0, 0);padding-left: 10px">
                  <h2>PART-II</h2>
                </div>

                <div class="row my-3">
                    <div class="col-md-4">
                        Verified By</br>
                        <p> <?php echo $table_data['signature_hod_or_cordinator']; ?></p>
                        <br>
                        <p>Head of Department / Program Cordinator</p>
                    </div>
                    <div class="col-md-4">
                        Recommended / Not Recommended by</br>
                       <p> <?php echo $table_data['signature_dean_of_school']; ?></p>
                        <p>Dean of School</p>                      
                    </div>
                    <div class="col-md-4">
                        Varified by</br>
                        <p> <?php echo $table_data['signature_head_of_exam_unit']; ?></p>
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
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                </div>
                    <a href="../../index.php"><button type="button" class="button">Cancel</button></a>
                     
                </div>
        </form>        

    </div>

    <?php include '../../partials/js_files.php' ?>
    <script src="../../assets/js/question_paper_form.js" type="text/javascript"></script>
</body>
</html> 