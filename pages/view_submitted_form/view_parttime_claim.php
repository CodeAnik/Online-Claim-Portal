
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
    $part_time_data=$query_obj->get_parttime_claim_data_by_id($_GET['id']);

    $rows=$query_obj->get_parttime_all_data_by_id($part_time_data['id']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Part Time Teaching Claim Form | Nilai University</title>
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
        <img src="../../assets/images/PartTimeTeaching.png" alt="PartTimeTeaching" width="100%" height="175px">
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

 
        <div class="container card">

                <div class="row">
                
                    <div class="col-md-6">
                        <label for="name">Name:</label>
                        <span><?php echo $part_time_data['name']; ?></span>
                    </div>
                    <div class="col-md-6">
                        <label for="schoolof"> School Of:</label> 
                        <span><?php echo $part_time_data['school_of']; ?></span>
                    </div>
                    <div class="col-md-6">
                        <label for="month">Month:</label>
                        <span><?php echo $part_time_data['month_name']; ?></span>
                    </div>
                    <div class="col-md-6">
                        <label for="department"> Department:</label>
                       <span><?php echo $part_time_data['department']; ?></span>
                    </div>

                </div>

            <table class="table table-striped">

                <thead>
                    <tr class="row">
                        <th class="col-md-3">Date</th>
                        <th class="col-md-3">Subject</th>
                        <th class="col-md-3">Hours(Lecture & Tutorial)</th>
                    </tr>
                </thead>
                <tbody>
            	<?php
            		$tutorila_hour=0;
            		$lectur_hour=0;
            	foreach($rows as $row)
            	{
            	?>
                <tr class="row">
                  <td class="col-md-3"><?php echo $row['added_date']; ?></td>
             		<td class="col-md-3"><?php echo $row['subject']; ?></td>
             		<td class="col-md-3">
             			<?php 

             				if($row['lecture_type']==0)
             				{
             					//lecture
             					$lectur_hour+=$row['lectur_hour'];
             					echo $row['lectur_hour']." Lecture";
             				}
             				else
             				{
             					$tutorila_hour+=$row['lectur_hour'];
             					echo $row['lectur_hour']." tutorial";
             				}
             			?>
             			
             		</td>
                </tr>

            	<?php } ?>


                </tbody>
            </table>

                    <div style="font-size:15px">
                    <b>Rates of Payment</b>
                    <div class="col-md-6">
                        <p for="Lecture">Lecture  RM: <?php echo $part_time_data['lecture_per_hour'];?> (Per Hour) X <?php echo $lectur_hour; ?> Total Hours = <?php echo $part_time_data['lecture_per_hour']*$lectur_hour; ?>  </p>
                        
                    </div>
                    <div class="col-md-6">
                         <p for="Tutorial">Tutorial  RM: <?php echo $part_time_data['tutorial_per_hour'];?> (Per Hour) X <?php echo $tutorila_hour; ?> Total Hours = <?php echo $part_time_data['tutorial_per_hour']*$tutorila_hour; ?>  </p>

                    </div>

                    <div class="col-md-6">
                        <p>Traveling Reimbursement Days <?php echo $part_time_data['traveling_reimbursement_days']; ?> days X RM 35.00 =  <?php echo $part_time_data['traveling_reimbursement_days']*35.00; ?></p>
                        
                    </div>

                    <div>
                         
                        <h2>Date <?php  echo $part_time_data['added_date'];?></h2>
                    
                    </div>
 

                    <div style="background-color:rgb(5, 184, 238);color:rgb(0, 0, 0);padding-left: 10px">
                      <h2>PART-II</h2>
                    </div>

                    <div >
                      <div class="leftbox">
                         Head of Department  </br>
                       
                      <p>  <?php  echo $part_time_data['signature_hod'];?></p>
                      </div>
                      <div class="rightbox">
                         Dean of Department</br>
                        
                       <p>   <?php  echo $part_time_data['signature_dean'];?></p>
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
                    <a href="../../index.php"><button type="submit" class="button">Home</button></a>
 
                </div>
        </div>
    </div>

     <?php include '../../partials/js_files.php' ?>
    <script src="../../assets/js/part_time_teaching.js" type="text/javascript"></script>
</body>
</html> 