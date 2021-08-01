<?php
	session_start();
	$page_title="Welcome to DashBoard";
	include_once '../db/DB.php';
	$conn=DB::getConnection();

    if(!isset($_SESSION['user_id']))
    {
        $_SESSION['error_message']="You Have to log In first";
        header("Location: ../index.php");
    }


    if( isset($_SESSION['user_id']) ){

        $records = $conn->prepare('SELECT id,username,email,user_type FROM users WHERE id = :id');
        $records->bindParam(':id', $_SESSION['user_id']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $user = NULL;

        if( count($results) > 0){
            $user = $results;
        }

    }

    if($user['user_type']==2)
    {
    	include './student_dashboard.php';
    }
    else
    {
        include './admin_teacher_dashboard.php';
    }
?>