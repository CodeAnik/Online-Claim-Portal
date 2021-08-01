<?php
    session_start();
    $page_title="Welcome to expense Claim Form";
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
        $errors=$validate->validate_expense_claim_data($_POST);

        if(empty($errors))
        {
            try
            {
                $name=$_POST['name'];
                $staff_no=$_POST['staff_no'];
                $department= $_POST['department'];
                $month=$_POST['month'];

                $first_500=$_POST['first_500'];
                $there_after=$_POST['there_after'];
                $staff_signature=$_POST['staff_signature'];
                $signature=$_POST['signature'];
                $uploaded_by=$_SESSION['user_id'];

                $sql = "INSERT INTO expense_claim (name , staff_no , depatment , month , first_500 , thereafter, staff_signature , signature  , uploaded_by ) VALUES (?,?,?,?,?,?,?,?,?)";

                $stmt= $conn->prepare($sql);
                $stmt->execute([$name,$staff_no , $department , $month , $first_500 , $there_after, $staff_signature, $signature , $uploaded_by]);
                $last_id = $conn->lastInsertId();

                $number=$_POST['total_object'];

                for($i=0;$i<$number;++$i)
                {
                    $my_date="my_date-".$i;
                    $description="description-".$i;
                    $remarks="remarks-".$i;
                    $amount_1="amount_1-".$i;
                    $amount_2="amount_2-".$i;
                    $sql = "INSERT INTO expense_claim_form_data_a (cur_date , description , remarks , amount_1 , amount_2 , expense_claim_id ) VALUES (?,?,?,?,?,?)";
                    $stmt= $conn->prepare($sql);
                    $stmt->execute([$_POST[$my_date], $_POST[$description], $_POST[$remarks], $_POST[$amount_1], $_POST[$amount_2], $last_id ]); 
                }


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

                    $sql = "INSERT INTO expense_claim_form_data_b ( destination_and_purpose_trip , no_of_km , parj_and_toll , account_rm , misc_rm , b_fast , lunch , dinner , amount_rm_1 , amount_rm_2 , explain_claim_id ) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
                    $stmt= $conn->prepare($sql);
                    $stmt->execute([$_POST[$destination_and_purpose] , $_POST[$no_of_km] ,$_POST[$parj_and_toll] ,$_POST[$account_rm] ,$_POST[$misc_rm] ,$_POST[$b_fast] ,$_POST[$lunch] ,$_POST[ $dinner] ,$_POST[$amount_rm_1] ,$_POST[$amount_rm_2]  , $last_id ]); 
                }

                $_SESSION['success_message']="expense claim form data inserted successfully";
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
    <title>Expense Claim Form | Nilai University</title>
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
        <img src="../assets/images/Expense.png" alt="QuestionsMarking" width="100%" height="175px">
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
                        <label for="staff_no">Staff No:</label>
                        <input type="text" class="form-control" id="staff_no" name="staff_no">
                    </div>
                    <div class="col-md-6">
                        <label for="department"> Department:</label>
                        <input type="text" class="form-control" id="department" name="department">
                    </div>                 
                    <div class="col-md-6">
                        <label for="month"> Month</label>
                        <input type="text" class="form-control" id="month" name="month">
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
                <tr class="">
                  <td ><input type="date" name="my_date"class="form-control" required></td>
                  <td ><input type="text" name="description"class="form-control" required></td>
                  <td ><input type="text" name="remarks"class="form-control" required></td>
                  <td> <input type="number" name="amount_1"class="form-control" required></td>
                  <td> <input type="number" name="amount_2"class="form-control" required></td>
 
                </tr>
                </tbody>
            </table>

            <table class="table table-striped">
                <h3 class="text-center mt-2">Part:B Claims For Mikeage/Outstation Travel</h3>
                <thead>
                    <tr class="">
                        <th rowspan="2" >Date</th>
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
                <tr class="">
                    <td ><input class="b_input" type="date" name="my_date" required></td>
                    <td ><input class="b_input" type="text" name="destination_and_purpose" required></td>
                    <td ><input class="b_input" type="text" name="no_of_km" required></td>
                    <td ><input class="b_input" type="text" name="parj_and_toll" required></td>
                    <td ><input class="b_input" type="text" name="account_rm" required></td>
                    <td ><input class="b_input" type="text" name="misc_rm" required></td>
                    <td ><input class="b_input" type="text" name="b_fast" required></td>
                    <td ><input class="b_input" type="text" name="lunch" required></td>
                    <td ><input class="b_input" type="text" name="dinner" required></td>
                    <td ><input class="b_input" type="text" name="amount_rm_1" required></td>
                    <td ><input class="b_input" type="text" name="amount_rm_2" required></td>

 
                </tr>
                </tbody>
            </table>


 
                <div class="row">
                
                    <div class="col-md-6">
                        First 500km =
                        <input type="text"  id="first_500" name="first_500">
                        X RM 0.60
                    </div>
                    <div class="col-md-6">
                        Thereafter =
                        <input type="text"  id="there_after" name="there_after">
                        X RM 0.50
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
                        <input type="text" class="form-control" id="staff_signature" name="staff_signature">
                    </td>
                    <td>                      
                        <label for="name">Signature:</label>
                        <input type="text" class="form-control" id="signature" name="signature"></td>
                    <td> Checked by:</td>
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
        </form>    -->     

    </div>

    <?php include '../partials/js_files.php' ?>
    <script src="../assets/js/explain_claim.js" type="text/javascript"></script>
</body>
</html> 