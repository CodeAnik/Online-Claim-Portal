<?php
    session_start();
    $page_title="Welcome to part time claim page";
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
 
        $errors=$validate->validate_parttime_teaching_data($_POST);
        if(empty($errors))
        {
            try
            {
                $name=$_POST['name'];
                $school_of=$_POST['schoolof'];
                $month=$_POST['month'];
                $dept=$_POST['department'];
                $lecture_rate=$_POST['lecture_rate'];
                $tutorial_rate=$_POST['tutorial_rate'];
                $traveling_days=$_POST['traveling_days'];
                $signature_hod=$_POST['signature_hod'];
                $signature_dean=$_POST['signature_dean'];
                $cur_date=$_POST['cur_date'];
                $uploaded_by=$_SESSION['user_id'];

                $sql = "INSERT INTO part_time_teaching (name, school_of, month_name , department , lecture_per_hour, tutorial_per_hour,traveling_reimbursement_days,signature_hod,signature_dean,  added_date , added_by ) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
                $stmt= $conn->prepare($sql);
                $stmt->execute([$name, $school_of, $month ,$dept,$lecture_rate,$tutorial_rate,$traveling_days,$signature_hod,$signature_dean,$cur_date, $uploaded_by ]);
                $last_id = $conn->lastInsertId();

                $number=$_POST['total_object'];

                for($i=0;$i<$number;++$i)
                {
                    $my_date="my_date-".$i;
                    $subject="subject-".$i;
                    $hours="hours-".$i;
                    $lecture_type="lecture_type-".$i;
                    $varified_by="varified_by-".$i;
                    $sql = "INSERT INTO part_time_teaching_data (added_date, subject,   lectur_hour , lecture_type, varified_by_hod , part_time_teaching_tbl_id ) VALUES (?,?,?,?,?,?)";
                    $stmt= $conn->prepare($sql);
                    $stmt->execute([$_POST[$my_date],$_POST[$subject],$_POST[$hours],$_POST[$lecture_type],$_POST[$varified_by],$last_id]); // here
                }
                $_SESSION['success_message']="part time teaching data inserted successfully";
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
    <title>Part Time Teaching Claim Form | Nilai University</title>
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
    right: 0px;
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
        <img src="../assets/images/PartTimeTeaching.png" alt="PartTimeTeaching" width="100%" height="175px">
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
        <button style="color:#fff;" href="#" id="filldetails" onclick="addFields()">Add Rows</button>

        <div id="main_table"/>
<!--         <form method="POST" class="container card">

                <div class="row">
                
                    <div class="col-md-6">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name">
                    </div>
                    <div class="col-md-6">
                        <label for="schoolof"> School Of:</label>
                        <input type="text" id="schoolof" name="schoolof">
                    </div>
                    <div class="col-md-6">
                        <label for="month">Month:</label>
                        <input type="text" id="month" name="month">
                    </div>
                    <div class="col-md-6">
                        <label for="department"> Department:</label>
                        <input type="text" id="department" name="department">
                    </div>

                </div>

            <table class="table table-striped">

                <thead>
                    <tr class="row">
                        <th class="col-md-3">Date</th>
                        <th class="col-md-3">Subject</th>
                        <th class="col-md-3">Hours(Lecture & Tutorial)</th>
                        <th class="col-md-3">Varified By HOD</th>
                    </tr>
                </thead>
                <tbody>
                <tr class="row">
                  <td class="col-md-3"><input type="date" name="my_date-'+(i)+'"class="form-control" required></td>
                  <td class="col-md-3"><input type="email" name="subject-'+(i)+'"class="form-control" required></td>
                  <td class="col-md-3"><input type="email" name="hours-'+(i)+'"class="form-control" required></td>
                  <td class="col-md-3"><input type="email" name="varified_by-'+(i)+'"class="form-control" required></td>
                </tr>
                </tbody>
            </table>

                    <div style="font-size:15px">
                    <b>Rates of Payment</b>
                    <div class="col-md-6">
                        <label for="Lecture">Lecture  RM: (Per Hour) </label>
                        <input style="width: 16%;font-size:22px;" type="text" id="pricerate" name="pricerate">
                    </div>
                    <div class="col-md-6">
                       <label for="Lecture">Tutorial  RM: (Per Hour) </label>
                       <input style="width:16%;font-size:22px;" type="text" id="pricerate" name="pricerate">

                    </div>

                    <div class="col-md-6">
                        <label>Traveling Reimbursement Days</label>
                        <input style="width:16%" type="text" id="traveling" name="traveling">
                    </div>

                    <div>
                        <label for="signature">Signature</label>
                        <input type="text" id="signature" name="signature">
                        <label for="date"> Date</label>
                        <input type="text" id="date" name="date">
                    
                    </div>
 

                    <div style="background-color:rgb(5, 184, 238);color:rgb(0, 0, 0);padding-left: 10px">
                      <h2>PART-II</h2>
                    </div>

                    <div >
                      <div class="leftbox">
                        Recommended / Not Recommended </br>
                      <input type="text" id="signature" name="signature">
                      <p>Head of Department</p>
                      </div>
                      <div class="rightbox">
                        Appreved / Not Approved</br>
                        <input type="text" id="signature" name="signature">
                        <p>Dean of School</p>
                      </div>
                    </div><br></br></br><br></br></br><br></br></br>

                    <div class="text-block">
                        <p>1. Please attach Student Attendance Sheet with this claim; Claims must be verified and approved by the Head of Deportment. </p>
                        <p>2. All claims must be submitted to the respective Admit; Assistants/Officers in the School by end of the month.</p>
                        <p>3. School Admin Assistants/Officers would need to submit the claims to HR deportment before/on 5th of the following month to be able to process the claim in the some month. (e.g. Claims for the month of January must be submitted to HR department by Ch February in order to process the payment in February)</p>
                        <p>4- Claims submitted after 5th of the month will be processed in the following month.</p>
                    </div>
                  </div>

                <div style="display: flex; justify-content: center;; padding-bottom:10px;">
                    <button type="submit" class="button">Submit</button>
                    <button type="button" class="button">Cancel</button>
                    <button type="button" class="button">Dashboard</button>
                </div>
        </form> -->
    </div>

     <?php include '../partials/js_files.php' ?>
    <script src="../assets/js/part_time_teaching.js" type="text/javascript"></script>
</body>
</html> 