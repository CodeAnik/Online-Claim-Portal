<?php
	session_start();
	$page_title="Welcome to Sign Up page";
    include_once '../db/DB.php';
    include_once '../db/Validate.php';

    $conn=DB::getConnection();
    $validate=new Validate($conn);
    $errors = array();
    if(isset($_POST['reg_user']))
    {
        $username=$_POST['username'];
        $email=$_POST['email'];
        $user_type=$_POST['user_type'];
        $pass1=$_POST['password_1'];
        $pass2=$_POST['password_2'];
        $errors=$validate->verify_signup_data($username,$email,$user_type,$pass1,$pass2);
        //print_r($errors);

        if(empty($errors))
        {
            
            try
            {
                $sql = "INSERT INTO users (username, email, user_type,active_status,pass) VALUES (?,?,?,?,?)";
                $stmt= $conn->prepare($sql);
                $stmt->execute([$username, $email, $user_type,$user_type==1?0:1,$pass1]);
                header("Location: ../index.php");
                $_SESSION['user_id'] = $results['id'];
                $_SESSION['success_message']="You are successfully signed up";
            }
            catch(PDOException $e)
            {
                echo "Sql pdo query error";
            }
        }
    }
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include '../partials/css_files.php' ?>
    <title>Online Claim Form Website | Sign Up Here</title>
    
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
    <h2>Register</h2>
    </div>

    <form method="post" action="">

        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" required >
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">User Type</label>
            <select name="user_type" class="form-control" required >
            <option value="1">Admin</option>
            <option value="2">Normal User</option>
            <option value="3">Teacher</option>
            </select>
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password_1" required>
        </div>
        <div class="input-group">
            <label>Confirm password</label>
            <input type="password" name="password_2" required>
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="reg_user">Register</button>
        </div>
        <p>
            Already a member? <a href="login.php">Log In</a>
        </p>
        <p>
            Goto Homepage <a href="../index.php">HomePage</a>
        </p>
    </form>
    
    <?php include '../partials/js_files.php' ?>
</body>
</html>
