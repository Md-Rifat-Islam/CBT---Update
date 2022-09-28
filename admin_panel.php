<?php
include("connection.php");
error_reporting();

session_start();

//$pin = $row['PINCODE'];

//if(isset($_POST['_SESSIONsede']) && $_POST['session_code']==_SESSION["code"]){
// print_r($_SESSION);


if(isset($_SESSION["code"])){
		echo "Welcome Admin!";
}else{
    echo "Unautorized Login!";
    //header("Location: 404.html");
}

?>


<!DOCTYPE html>
<html>

<head>
  <title>Bell-212 CBT - Admin Panel</title>
  <link rel="stylesheet" type="text/css" href="semantic/semantic.min.css">
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  
  <script src="js/jquery/jquery-3.4.1.min.js"></script>
  <script src="semantic/semantic.min.js"></script>
  <script src="js/crypto/crypto-core.js"></script>
  <script src="js/crypto/sha256.js"></script>
  
  <!-- For showing alert 
  <script type="text/javascript" src="Jquery/Jquery3.js"></script>
  <script type="text/javascript" src="semantic-ui/semanticui.js"></script>
  <script type="text/javascript" src="Semantic-UI-Alert/Semantic-UI-Alert.js"></script>
  <link rel="stylesheet" type="text/css" href="semantic-ui/semanticui.css">
  <link rel="stylesheet" type="text/css" href="Semantic-UI-Alert/Semantic-UI-Alert.css"> -->

  <!-- STYLE RELATED CODE STARTS -->
  <style>
  * {
    font-family: "Open Sans Regular";
    font-size: 1.01em;
  }

  .ui .button {
    font-family: "Open Sans Regular";

    font-size: 1.01em;
  }
  .ui.red.vertical.stretched.menu .item:hover{
    background-color: #DB4437 !important;
    color: white !important;
  }

  a > div > p {
    color: black;
  }
  .ui.fluid.card:hover *{
    background-color: #DB4437;
    color: white !important;
  }

  /*body {
    background-color: white; /*Default bg, similar to the background's base color*/
    background-image: url("images/helicopter-background.png");

    background-position: right bottom; /*Positioning*/
    background-size: 100%;
    background-repeat: no-repeat; /*Prevent showing multiple background images*/
  }*/

</style>
<!-- STYLE RELATED CODE ENDS -->
</head>

<body>


  <div class="ui top red pointing menu">

    <div class="ui container" style="margin-top: 20px; padding-left: 70px;">
      <a href="admin_panel.php">
        <h2 class="ui header left aligned">
          <img src="images/bell-logo2.jpg">
          <div class="content">
            System Settings
            <div class="sub header">Bell-212 CBT Module</div>
          </div>
        </h2>
      </a>
      <!-- <p class="item" style="font-size: 1.20em;">Bell-212 Tutorial</p></p> -->

    </div>

    <div class="right menu" style="padding-right: 60px;">
      <div class="ui grid">
        <div class="row"></div>
        <div class="row">
          <div class="ui red button" id="adminlogout">
            Logout
          </div>
        </div>
        <div class="row"></div>
      </div>
    </div>
  </div>

  <div class="ui grid">
    <div class="stretched row" style="height: 80vh; padding-top: 3% ">
      <div class="one wide column"></div>
      <div class="five wide column">
        <div class="ui basic text segment">
        	
          <div class="ui red vertical stretched menu" style="cursor: pointer; width: 100%;">
            <a class="item" style="background: white;" id="questionBank">
              <p style="font-size: 110%;" ><strong>Question Bank</strong></p>
              <p style="text-align: justify;">Modify the list of questions, answers and related settings.</p>
            </a>
            <a class="item" id="btnPassword">
              <p style="font-size: 110%;"><strong>Change Password</strong></p>
              <p style="text-align: justify;">Change the pincode to improve security.</p>
            </a>
            <a class="item" id="btnSetting">
              <p style="font-size: 110%;"><strong>Quiz Settings</strong></p>
              <p style="text-align: justify;">Modify quiz related settings.</p>
            </a>
          </div>
        </div>

      </div>
      <!-- <div class="eleven wide column">
      <div class="ui grid">
      <div class="row" style=""></div>
      <div class="row">
      <div class="one wide column">
    </div>
    <div class="fourteen wide column">

    <img src="images/helicopter-background.png" />
  </div>


</div>
</div>



</div> -->
</div>
</div>


  <!-- Question Module Select Modal content -->
  
<div class="ui modal" id="quizpanel">
  <!-- <i class="close icon"></i> -->
  <div class="header" style="text-align: center;">
    Select Quiz Topic
  </div>  
  <div class="ui basic text segment" style="margin: 20px;">
    <div class="ui three column grid">
      <div class="column">
        <a class="ui fluid card" style="height: 150px;" href="questionBank.php?type=1">
          <div class="fluid content">
            <p class="header">Engine</p>
            <p>An engine or motor is a machine designed to convert one form of energy into mechanical energy.</p>
          </div>
        </a>
      </div>
      <div class="column">
        <a class="ui fluid card" style="height: 150px;" href="questionBank.php?type=2">
          <div class="fluid content">
            <p class="header">Airframe</p>
            <p>The mechanical structure of an aircraft is known as the airframe. Includes fuselage, undercarriage, empennage and wings.</p>
          </div>
        </a>
      </div>
      <div class="column">
        <a class="ui fluid card" style="height: 150px;" href="questionBank.php?type=3">
          <div class="fluid content">
            <p class="header">Electric Components</p>
            <p>The electrical systems, in most helicopters, reflect the increased use of sophisticated avionics and other electrical accessories.</p>
          </div>
        </a>
      </div>
      <div class="column">
        <a class="ui fluid card" style="height: 150px;" href="questionBank.php?type=4">
          <div class="fluid content">
            <p class="header">Instruments</p>
            <p>The first prototype Bell 212 had an instrument flight rules (IFR) instrument kit with a large fin on the roof to change the aircraft’s turning operation.</p>
          </div>
        </a>
      </div>
      <div class="column">
        <a class="ui fluid card" style="height: 150px;" href="questionBank.php?type=5">
          <div class="fluid content">
            <p class="header">Radio</p>
            <p>The instrument flight rules (IFR) avionics system includes twin allied signal KTR 908 720-channel, very-high-frequency transceivers etc.</p>
          </div>
        </a>
      </div>
      <div class="column">
        <a class="ui fluid card" style="height: 150px;" href="questionBank.php?type=6">
          <div class="fluid content">
            <p class="header">Armaments</p>
            <p>All the cannon and small arms collectively, with their equipments, belonging to a ship or a fortification.</p>
          </div>
        </a>
      </div>
    </div>

  </div>
  <!-- End of Contents -->
  
    <div class="actions">
    <div class="ui basic deny button">
      Close
    </div>
  </div>
</div>





<!-- Setting modal --> 

<div class="ui tiny modal" id="settingModal">
<!-- <i class="close icon"></i> -->

	<div class="header" style="text-align: center;">
	Set Number of Question in each Module
	</div>

	<div class="ui negative message" style="margin-bottom: -1%;  margin-right: 10%; margin-left: 10%;"  id="error_message_setting" >
		<i class="close icon" id="messageCloseSetting"></i>
		<div class="header">
			Cannot proceed change! 
		</div>
		<p>Select a module <br></p> 
		<p style="margin-top: -3%; margin-bottom: -2%;">Select number of questions</p>
	</div>

  
	<form class="ui form" method="POST">
	  <div class="ui basic text segment" style="margin-left: 10%;margin-right: 10%;">
		
		<div>
			<div class="required field ">
				<label>Question Module</label>
				<select class="ui dropdown" name="qmodule" id ="qmodule">
					<option value="0">- Select -</option>
					<option value="1">Engine</option>
					<option value="2">Airframe</option>
					<option value="3">Electic Components</option>
					<option value="4">Instruments</option>
					<option value="5">Radio</option>
					<option value="6">Armaments</option>
				</select>
			</div>
			
			<div class=" required field ">
				<label>Number of Questoins</label>
				<select class="ui dropdown" name="questionNo" id="questionNo">
					<option value="0">- Select -</option>
				</select>
			</div>

			<center>
				<button class="ui button green" style="padding: 12px;" type="submit" name="submit_setting"> Save Setting</button>
			</center>
			
		</div>
	  </div>
	</form>
  
	
	<div class="actions">
		<div class="ui basic deny button">Cancel</div>
	</div>
</div>




<!-- PASSWORD UI modal --> 

<div class="ui tiny modal" id="successModal">
<!-- <i class="close icon"></i> -->
	<i class="close icon" id="SuccessMessageClose"></i>
  	<div class="ui positive message" style="margin: 1%" >
  		<div class="header">
   			Success! 
  		</div>
  		<p >You have successfully changed your password!</p>
  	</div>
</div>


<div class="ui tiny modal" id="failedModal">
<!-- <i class="close icon"></i> -->
	<i class="close icon" id="failMessageClose"></i>
  	<div class="ui negative message" style="margin: 1%" >
  		<div class="header">
   			Failed! 
  		</div>
  		<p >Changing password is not possible right this moment!</p>
  	</div>
</div>

<div class="ui tiny modal" id="successModal_seting">
<!-- <i class="close icon"></i> -->
	<i class="close icon"></i>
  	<div class="ui positive message" style="margin: 1%" >
  		<div class="header">
   			Success! 
  		</div>
  		<p >You have successfully changed quiz settings!</p>
  	</div>
</div>


<div class="ui tiny modal" id="failedModal_seting">
<!-- <i class="close icon"></i> -->
	<i class="close icon"></i>
  	<div class="ui negative message" style="margin: 1%" >
  		<div class="header">
   			Failed! 
  		</div>
  		<p >Changing quiz settings is not possible right this moment!</p>
  	</div>
</div>

<div class="ui tiny modal" id="passwordModal">
<!-- <i class="close icon"></i> -->

  	<div class="header" style="text-align: center;">
    	Change Password
  	</div>

  	<div class="ui negative message" style="margin-bottom: -1%; margin-right: 5%; margin-left: 5%;"  id="error_message" >
  		<i class="close icon" id="messageClose"></i>
  		<div class="header">
   			Cannot proceed change! 
  		</div>
  		<p id="wrongPass">You have enter wrong password!</p>
  		<p id="emptyField">All fields are required!</p>
  		<p id="passNotMatched">Re-entered password does not match!</p>
  	</div>

  	<form class="ui form" method="POST">
  		<div class="ui basic text segment" style="margin-left: 10%;margin-right: 10%;">
  			<div class=" required field">
				<label>Old Password</label>
				<div class="ui input focus" style="">
					<input type="password" id="odlPass" name="odlPass" style="" class="form-control">
				</div>
			</div>
			<div class=" required field">
				<label>New Password</label>
				<div class="ui input focus" style="">
					<input type="password" id="newPass" name="newPass" style="" class="form-control">
				</div>
			</div>
			<div class=" required field">
				<label>Re-enter Password</label>
				<div class="ui input focus" style="">
					<input type="password" id="rePass" name="rePass" style="" class="form-control">
				</div>
			</div>
			<center>
				<!--div class="ui positive button left floated"  type="submit" name="submit">Save</div-->
				<button class="ui button green" style="padding: 12px;" type="submit" name="submit"> Save Password </button>
			</center>
			
  		</div>


	</form>
	
	<div class="actions">
		<div class="ui basic deny button">Cancel</div>
	</div>

</div>



<?php
if(isset($_POST['submit_setting']))
{
	$module = $_POST['qmodule'];
	$quesNo = $_POST['questionNo'];
	
	if($module== 0 || $quesNo== 0)
	{
		echo "<script> 
			$('#error_message_setting').show();
			$('#settingModal').modal('show');
		</script>
		";
	}
	else{
		$db = mysqli_connect("localhost", "root", "mysql", "cbt-db");
		$query = "UPDATE TRADES SET QUESTION_COUNT='$quesNo' where ID='$module'";
		$data = mysqli_query($db, $query);
		if($data){
			echo "<script> $('#successModal_seting').modal('show'); </script>";
		}
		else{
			echo "<script> $('#failedModal_seting').modal('show'); </script>";
		}
	}
}

?>


<?php
 
if(isset($_POST['submit']))
{
  echo "A submit request has been made via the POST";

	$odlPass = $_POST['odlPass'];
	$newPass = $_POST['newPass'];
	$rePass = $_POST['rePass'];

	if($newPass== "" || $rePass=="" || $odlPass=="")
	{
		echo "<script> 
			$('#error_message').show();
			$('#emptyField').show();
			$('#passNotMatched').hide();
			$('#wrongPass').hide();
			$('#passwordModal').modal('show');
		</script>
		";
	}

	$hashText = hash("sha256", $odlPass);
	$newHashText = hash("sha256", $newPass);

	$db = mysqli_connect("localhost", "root", "mysql", "cbt-db");
	$pincode = mysqli_query($db, "SELECT * FROM CREDENTIAL");
	$row = mysqli_fetch_array($pincode);
	$pin = $row['PINCODE'];

	if ($hashText != $pin) {
		echo "<script> 
			$('#error_message').show();
			$('#emptyField').hide();
			$('#passNotMatched').hide();
			$('#wrongPass').show();
			$('#passwordModal').modal('show');
		</script>
		";
	}
	elseif ($newPass != $rePass) {
		echo "<script> 
			$('#error_message').show();
			$('#emptyField').hide();
			$('#passNotMatched').show();
			$('#wrongPass').hide();
			$('#passwordModal').modal('show');
		</script>
		";
	}
	else{

		$query = "UPDATE CREDENTIAL SET PINCODE='$newHashText' where PINCODE='$hashText'";
		$data = mysqli_query($db, $query);
		if($data){
			echo "<script> $('#successModal').modal('show'); </script>";
		}
		else{
			echo "<script> $('#failedModal').modal('show'); </script>";
		}
		
	}
	
}
?>

<script>

$("#adminlogout").click(function(){
    $('#adminlogout').addClass('loading');
  	var finish = $.post("controller/session_destroy.php", {}, function(data){
      window.location.href = "index.html";
    });
  });
  
  $('#questionBank').click(function(){
  	$('#quizpanel').modal('show');
});

  $('#btnSetting').click(function(){
  	$("#error_message_setting").hide();
  	$('#settingModal').modal('show');
});

  $('#btnPassword').click(function(){
  	$('#passwordModal').modal('show');
  	$("#error_message").hide();
});

 $('#messageClose').on('click', function() {
    $(this).closest('.message').transition('fade');
  });

  $('#messageCloseSetting').on('click', function() {
    $(this).closest('.message').transition('fade');
  });

  $('#SuccessMessageClose').on('click', function() {
    $('#successModal').modal('hide');
  });

  $('#failMessageClose').on('click', function() {
    $('#failedModal').modal('hide');
  });


$("#qmodule").change(function(){
        var moduleId = $(this).val();
 
        $.ajax({
            url: 'settings.php',
            type: 'post',
            data: {module:moduleId},
            dataType: 'json',
            success:function(response){
                var len = response;

                $("#questionNo").empty();
                $("#questionNo").append("<option value='0'>- Select -</option>");
                for(var i = 1; i<=len; i++){
                    $("#questionNo").append("<option value='"+i+"'>"+i+"</option>");

                }
            }
        });
    });

</script>

</body>

</html>
