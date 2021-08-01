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

    $table_data=$query_obj->get_expense_claim_data_by_id($_GET['id']);
    $rows_a=$query_obj->get_all_expense_claim_data_tableA($table_data['id']);
    $rows_b=$query_obj->get_all_expense_claim_data_tableB($table_data['id']);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Expense Claim Form | Nilai University</title>
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


.b_input
{
    display: inline-block;
    width: 70px !important;

}                                /* input form style End here*/
/*---------------------------------------------------------------------------------*/
</style>
</head>
<body>  
    <div class="">
        <img src="../../assets/images/Expense.png" alt="QuestionsMarking" width="100%" height="175px">
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
                       <h3> Name: <?php echo $table_data['name']; ?> </h3>
                    </div>
                    <div class="col-md-6">
                        <h3> Staff No: <?php echo $table_data['staff_no']; ?> </h3>
                    </div>
                    <div class="col-md-6">
                         
                        <h3>  Department: <?php echo $table_data['depatment']; ?> </h3>
                    </div>                 
                    <div class="col-md-6">
                    	<h3>  Month: <?php echo $table_data['month']; ?> </h3>
                    </div>
                </div>

            <table class="table table-striped">
                <h3 class="text-center mt-2">Part:A General Claim</h3>
                <thead>
                    <tr class="">
                        <th rowspan="2" >Date</th>
                        <th rowspan="2">Description</th>
                        <th rowspan="2" >Remarks</th>
                        <th class="text-center" colspan="2" >Amount RM</th>
                    </tr>
 
                </thead>
                <tbody>
            	<?php 

            		foreach($rows_a as $row)
            		{
            	?>
                <tr class="">
                  <td > <?php echo $row['cur_date']; ?></td>
                  <td > <?php echo $row['description']; ?></td>
                  <td > <?php echo $row['remarks']; ?></td>
                  <td > <?php echo $row['amount_1']; ?></td>
                  <td > <?php echo $row['amount_2']; ?></td>
                </tr>

                <?php } ?>
                </tbody>
            </table>

            <table class="table table-striped">
                <h3 class="text-center mt-2">Part:B Claims For Mikeage/Outstation Travel</h3>
                <thead>
                    <tr class="">
                        <th rowspan="2">Destination and purpose trip</th>
                        <th rowspan="2" >No of KM</th>
                        <th rowspan="2" >Parj's& Toll RM</th>
                        <th rowspan="2" >Account RM</th>
                        <th rowspan="2" >Misc RM</th>
                        <th class="text-center" colspan="3" >Allowance (RM)</th>
                        <th class="text-center" colspan="2" >Amount (RM)</th>
                    </tr>
                    <tr>
                        <th>B Fast</th>
                        <th>Lunch</th>
                        <th>Dinner</th>
                    </tr>
 
                </thead>
                <tbody>
                	<?php foreach($rows_b as $row)
                		{
                	 ?>
                		
                <tr class="">
                    <td > <?php echo  $row['destination_and_purpose_trip']; ?></td>
                    <td > <?php echo  $row['no_of_km']; ?></td>
                    <td > <?php echo  $row['parj_and_toll']; ?></td>
                    <td > <?php echo  $row['account_rm']; ?></td>
                    <td > <?php echo  $row['misc_rm']; ?></td>
                    <td > <?php echo  $row['b_fast']; ?></td>
                    <td > <?php echo  $row['lunch']; ?></td>
                    <td > <?php echo  $row['dinner']; ?></td>
                    <td > <?php echo  $row['amount_rm_1']; ?></td>
                    <td > <?php echo  $row['amount_rm_2']; ?></td>
                </tr>
                	<?php }?>
                </tbody>
            </table>


 
                <div class="row">
                
                    <div class="col-md-6">
                        First 500km 
                       <?php  echo $table_data['first_500'];?>
                        X RM 0.60 = <?php  echo $table_data['first_500']*0.60;?>
                    </div>
                    <div class="col-md-6">
                        Thereafter 
                       	<?php  echo $table_data['thereafter'];?>                       X RM 0.50 = <?php  echo $table_data['thereafter']*0.50;?>
                    </div>
 
                </div>
                <table class="table table-striped mt-4">
                  <tbody>
                    <tr>
                      <td> <h2> Staff Declaration:</h2>
                        I declare that all the expenses were necessarily incurred on behalf of the company and are in compliance ith all appicable policies and guidlines.</td>
                      <td> <h2>Manager/Head of Department Declaration:</h2>
                        I have reviewed the details of the above expense claim and I am satisfied that these expenses were properly incurred on behalf of the company and are in compliance with all applicable policies and guidelines.</td>
                      <td class="">For Finance only:</td>
                    </tr>
                    <tr>
                    <td>                       
                       <label for="name">Staff Signature:</label>
                       <p><?php echo $table_data['staff_signature']; ?></p>
                    
                    </td>
                    <td>                      
                        <label for="name">Signature:</label>
                        <p><?php echo $table_data['signature']; ?></p>

                    </td>
                     </tr>
                  </tbody>
                </table>                

                    <div class="text-block">
                        <p>1. All claims (with the exception of Note 3) to be submitted to Finance department on & calendar month basis Cut off date for submission 1st by the 7th of following month.</p>
                        <p>2. Claims must be supported with relevant documentations, failing which the management may reject the claims. For example Travelling claims should be supported by travel request form, toll, parking receipts, etc (where applicable) Original receipts, where applicable, must be attached</p>
                        <p>3. For medical and dental claims, please fill in a separate form and submit to Human Resources Department separately.</p>
                    </div>
                  </div>

                <div style="display: flex; justify-content: center;; padding-bottom:10px;">

     
                    <a href="../../index.php"><button type="button" class="button">Home</button></a>
                </div>
        </div>         

    </div>

    <?php include '../../partials/js_files.php' ?>
    <script src="../../assets/js/explain_claim.js" type="text/javascript"></script>
</body>
</html> 