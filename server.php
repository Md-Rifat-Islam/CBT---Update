<?php

	$db = mysqli_connect("localhost", "root", "mysql", "cbt-db");
	if(isset($_GET['type']))
	{
		$trade_id = $_GET['type'];
		$questions = mysqli_query($db, "SELECT * FROM QUESTION_BANK WHERE TRADE_ID=".$trade_id." AND HIDDEN = 0");
		$question_count = mysqli_num_rows($questions);
	}
 
	if(isset($_POST['submit'])) ///CREATE QUESTION
	{
		$ques = $_POST['ques'];
		$op1 = $_POST['op1'];
		$op2 = $_POST['op2'];
		$op3 = $_POST['op3'];
		$op4 = $_POST['op4'];
		$ans = $_POST['ans'];
		$tradeid = $_POST['type'];
		 
		if($ques!="" && $op1!="" && $op2!="" && $op3!="" && $op4!="" && $ans!="" && $tradeid!="")
		{
			$query = "INSERT INTO QUESTION_BANK (TRADE_ID,DESCRIPTION,OPT_A,OPT_B,OPT_C,OPT_D,CORRECT_ANS,HIDDEN)
			VALUES ('$tradeid','$ques','$op1','$op2','$op3','$op4','$ans','0')";
			$data = mysqli_query($db, $query);
			
			if($data)
			{
				$_SESSION['message1'] = "success"; 
			}
		}
		else
		{	
			$_SESSION['message1'] = "fail"; 
		}
	}

	if(isset($_POST['update']))
	{
		$question_id = $_POST['id'];
		$ques = $_POST['desc'];
		$op1 = $_POST['opA'];
		$op2 = $_POST['opB'];
		$op3 = $_POST['opC'];
		$op4 = $_POST['opD'];
		$ans = $_POST['correct'];
		$tradeid = $_POST['trade'];
		 
		if($ques!="" && $op1!="" && $op2!="" && $op3!="" && $op4!="" && $ans!="" && $tradeid!="")
		{
			$query = "UPDATE QUESTION_BANK SET TRADE_ID='$tradeid',DESCRIPTION='$ques',OPT_A='$op1',OPT_B='$op2',OPT_C='$op3',OPT_D='$op4',CORRECT_ANS='$ans',HIDDEN='0' where ID='$question_id'";
			$data = mysqli_query($db, $query);
			
			if($data)
			{
				//$_SESSION['message'] = "Data updated successfully."; 
				$_SESSION['message1'] = "success"; 
			}
		}
		else
		{
			//$_SESSION['message'] = "All fields are required.";
			$_SESSION['message1'] = "updateFail"; 
		}
		
	}
	
	if(isset($_GET['delete']))
	{
		$question_id = $_GET['delete'];
		$query = "DELETE FROM QUESTION_BANK WHERE ID = '$question_id'";
		$data = mysqli_query($db, $query);
		if($data)
		{
			$_SESSION['message'] = "Data Deleted Successfully."; 
			//header("location:javascript://history.go(-1)");
			header('refresh:0; url='. $_SERVER["HTTP_REFERER"] );
			exit;
		}
	}

?>