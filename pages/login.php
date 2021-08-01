<?php
    session_start();
    $page_title="Welcome to Login page";
    include_once '../db/DB.php';
    include_once '../db/Validate.php';
    $conn=DB::getConnection();
    $validate=new Validate($conn);
    $errors=array();

    if(isset($_POST['login_user']))
    {
           // print_r($_POST);
            $email=$_POST['email'];
            $pass=$_POST['password'];
            $errors=$validate->varify_login_data($email,$pass);

            if(empty($errors))
            {
                $stmt = $conn->prepare("SELECT id FROM users where email='$email' and pass='$pass'");
                $stmt->execute();
                $results = $stmt->fetch(PDO::FETCH_ASSOC);
                //print_r($results);
                $_SESSION['user_id'] = $results['id'];
                $_SESSION['success_message']="You are successfully logged in";
                header("Location: ../index.php");
            }
    }

?>

<!DOCTYPE html>
<html>
<head>
  <title>Online Claim Portal |log in </title>
  <?php include '../partials/css_files.php' ?>
  <link rel="stylesheet" href="../assets/sign_up_and_login.css" crossorigin="anonymous">
</head>
<body>
      <div class="container">
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
      </div>     
  <div class="header">
  	<h2>Login</h2>
  </div>
  <form method="post" action="">
  	 
  	<div class="input-group">
  		<label>Email</label>
  		<input type="email" name="email" required>
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password" minlength="5">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="sign_up.php">Sign up</a>
  	</p>
      <p>
        Goto Homepage <a href="../index.php">HomePage</a>
      </p>
  </form>
</body>
</html>