
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Welcome to Online User Dashboard | Nilai University</title>
    <style>
    *{
        margin: 0;
        padding: 0;
        font-family: sans-serif;
    }
    .bodybg{
        width: 100%;
        height: 100vh;
        background-color: #fcfcfc;
        background-size: cover;
        background-position: center;
        position: relative;
        overflow: hidden;
    }
    .navbar{
        width: 85%;
        height: 15%;
        margin: auto;
        display: flex;
        align-items:center;
        justify-content:flex-end;
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

    /*---------------------Page Body Style Section Here---------------------------- */
      * {
          box-sizing: border-box;
        }

    .row {  
          display: -ms-flexbox; /* IE10 */
          display: flex;
          -ms-flex-wrap: wrap; /* IE10 */
          flex-wrap: wrap;
          height: 90%;
          padding: 10px;
          box-shadow: darkgray;
        }
        
        /* Create two unequal columns that sits next to each other */
        /* Sidebar/left column */
        .side {
          -ms-flex: 30%; /* IE10 */
          flex: 30%;
          background-color: #f5f5f5;
          background-size: 100%;
          padding: 20px;
        }
        
        /* Main column */
        .main {   
          -ms-flex: 70%; /* IE10 */
          flex: 70%;
          background-color: rgb(236, 230, 230);
          padding: 20px;
        }
 

    	.btn {
	      border: none;
	      color:transparent;
	      padding: 8px 16px;
	      text-align: center;
	      text-decoration: none;
	      display: inline-block;
	      font-size: 22px;
	      margin: 4px 2px;
	      transition-duration: 0.4s;
	      cursor: pointer;
	    }
	    .btn1 {
	      background-color:transparent; 
	      color: black;
	      border: 1px solid rgb(0, 0, 0);
	    }

	    .btn1:hover {
	      background-color: rgb(187, 0, 72);
	      color: white;
	    }
        
        /* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 700px) {
          .row {   
            flex-direction: column;
          }
        }
  </style>
</head>
<body>
 
    <div class="bodybg">
      <div class="navbar">
         <a href="../index.php"> <button type="button" class="button">Home</button></a>
<!--           <button type="button" class="button">Dashboard</button>
          <button type="button" class="button">Profile</button>
          <button type="button" class="button">Logout</button> -->
      </div>

    <div class="row">
      <div class="side">
        <h2 style="background-color:rgb(87, 205, 221); padding: 15px;"><b>Profile Dashboard</b></h2><br>
        <p>Name: <?php echo $user['username']; ?></p><br>
        <p>Email: <?php echo $user['email']; ?> </p><br>
        <p>User Category:<small> Normal User </small></p><br><br>
        <!-- <button type="button" class="button">Update Password</button> -->
      </div>
      <div class="main">
        <h2 style="background-color:rgb(87, 205, 221); padding: 15px;"><b>Dashboard</b></h2><br>
        <h3>Your Submitted Forms</h3><br>

        <div class="row">
        	<div class="col-md-6">
					  <a href="student/student_parttime_claime.php"><btn class="btn btn1">Part-Time Teaching Claims</btn></a>
 
        	</div>
        	<div class="col-md-6">
         
					  <a href="student/student_overtime_claim.php"><btn class="btn btn1">Over-Time Teaching Claims</btn></a>
 
        	</div>
        	<div class="col-md-6">
         
					  <a href="student/student_expense_claim.php"><btn class="btn btn1">Expense claim Forms</btn></a>
 
        	</div>
        	<div class="col-md-6">
         
					  <a href="student/student_quetionpaper_claim.php"><btn class="btn btn1">Question Paper Claim Form</btn></a>
 
        	</div>        	        	
        </div>
      </div>
    </div>
</body>
</html>