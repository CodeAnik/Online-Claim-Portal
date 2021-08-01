<?php

	session_start();
	$page_title="Welcome to DashBoard";
	include_once '../../db/DB.php';
	include_once '../../db/Query.php';
	$conn=DB::getConnection();

    if(!isset($_SESSION['user_id']))
    {
        $_SESSION['error_message']="You Have to log In first";
        header("Location: ../index.php");
    }
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		// echo $id;
	    $sql = "DELETE FROM `question_paper_form` WHERE id = ?";        
	    $q = $conn->prepare($sql);

	    $response = $q->execute(array($id));
	    $_SESSION['error_message']="Question paper data deleted Successfully";
    	header("Location: ../../index.php");		
	}
?>	