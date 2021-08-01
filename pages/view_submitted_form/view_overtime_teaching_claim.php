


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

    $table_data=$query_obj->get_overtime_data_by_id($_GET['id']);
    $rows=$query_obj->get_all_overtime_data($table_data['id']);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Overtime Claim Form | Nilai University</title>
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
 
                                /* input form style End here*/
/*---------------------------------------------------------------------------------*/

</style>
</head>
<body>  
    <div class="">
        <img src="../../assets/images/Overtime.png" alt="OvertimeClaimForm" width="100%" height="175px">

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
 

        
          <div  class="container card">

                <div class="row">
                
                    <div class="col-md-6">
                        <h3>Name: <?php echo $table_data['name']; ?></h3>
                        
                    </div>
                    <div class="col-md-6">
                        <h3>Faculty of : <?php echo $table_data['faculty_of']; ?></h3>
                    </div>
                    <div class="col-md-6">
                          <h3>Emp No : <?php echo $table_data['emp_no']; ?></h3>
                    </div>
                    <div class="col-md-6">
                        <h3>Dept Name : <?php echo $table_data['dept_name']; ?></h3>
                    </div>
                    <div class="col-md-6">
                        <h3>Position : <?php echo $table_data['position']; ?></h3>
                    </div>                    
                    <div class="col-md-6">
                        <h3>semester : <?php echo $table_data['semester']; ?></h3>
                    </div>
                </div>
                <div class="mt-4 row" style="text-align: justify;-moz-text-align-last:justify ;text-align-last:justify;border:1px solid black; height: 100px;">
                    <div class="col-md-6">
                        <h4> Total Contact Per Semester =   <?php echo $table_data['total_contact']; ?> </h4>
                   
                    </div>                    
                    <div class="col-md-6">
                      <div my="2">
                        <h4> Total Excess of 252 hours =  <?php echo $table_data['total_excess_252']; ?></h4>
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

                <?php 
                  $lecture_hour=0;
                  $tutorial_hour=0;
                  foreach($rows as $row)
                  {
                ?>

                <tr class="">
                  <td ><?php echo $row['added_date']; ?></td>
                  <td ><?php echo $row['cur_day']; ?></td>
                  <td ><?php echo $row['subject']; ?></td>
                  <td ><?php echo $row['sub_code']; ?></td>
                  <td ><?php echo $row['no_of_std']; ?></td>
                  <td ><?php echo $row['deg_diploma_level']; ?></td>
                  <td ><?php echo $row['lecture'];  $lecture_hour+=$row['lecture']; ?></td>
                  <td ><?php echo $row['tutorial']; $tutorial_hour+=$row['tutorial']; ?></td>
                </tr>

                <?php }  ?>
                </tbody>
            </table>

 
        <div class="row my-3">
          <h3 class="col-12 text-center">(i) Diploma Program: </h3>

          <div class="col-md-6">
            <p>Lecture RM  <?php echo $table_data['diploma_lecture_rate']; ?>  Per Hour X <?php echo $lecture_hour; ?> = <?php echo $lecture_hour*$table_data['diploma_lecture_rate']; ?> RM</p>
          </div>
          <div class="col-6">
            <p>Tutorial RM  <?php echo $table_data['diploma_tutorial_rate']; ?>  Per Hour X <?php echo $tutorial_hour; ?> = <?php echo $tutorial_hour*$table_data['diploma_tutorial_rate']; ?> RM</p>
          </div>
        </div>

        <div class="row my-3">
          <h3 class="col-12 text-center">(ii) Degree Program: </h3>

          <div class="col-md-6">
            <p>Lecture RM  <?php echo $table_data['degree_lecture_rate']; ?>  Per Hour X <?php echo $lecture_hour; ?> = <?php echo $lecture_hour*$table_data['degree_lecture_rate']; ?> RM</p>
          </div>
          <div class="col-6">
            <p>Tutorial RM  <?php echo $table_data['degree_tutorial_rate']; ?>  Per Hour X <?php echo $tutorial_hour; ?> = <?php echo $tutorial_hour*$table_data['degree_tutorial_rate']; ?> RM</p>
          </div>

        </div>        

                <div style="background-color:rgb(5, 184, 238);color:rgb(0, 0, 0);padding-left: 10px">
                  <h2>PART-II</h2>
                </div>

                <div class="row my-3">
                  <div class="col-md-4">
                    Verified By HOD</br>
                         
                      <p><?php echo $table_data['signature_hod']; ?></p>
                  </div>
                  <div class="col-md-4">
                        Recommended by Dean </br>
                       
                        <p><?php echo $table_data['signature_dean']; ?></p>             
                  </div>
                  <div class="col-md-4">
                        Approved by Deputy VC</br>
                        <p><?php echo $table_data['signature_deputy_vc']; ?></p>                 
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

 
                    <a href="../../index.php"><button type="button" class="button">Home</button></a>
                    
                </div>
        </div> 


    </div>

    <?php include '../../partials/js_files.php' ?>
    <script src="../../assets/js/overtime_teaching.js" type="text/javascript"></script>

</body>
</html> 