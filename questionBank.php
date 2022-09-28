<?php  include('server.php'); ?>
<!DOCTYPE html>
<html>

<head>
  <title>Bell-212 CBT System</title>
  <link rel="stylesheet" type="text/css" href="semantic/datatables/dataTables.semanticui.min.css">
  <link rel="stylesheet" type="text/css" href="semantic/semantic.min.css">
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <script src="js/jquery/jquery-3.3.1.js"></script>
  <script src="js/datatables/jquery.dataTables.min.js"></script>
  <script src="js/datatables/dataTables.semanticui.min.js"></script>
  <script src="semantic/semantic.min.js"></script>

  <style>
  * {
    font-family: "Open Sans Regular";
    font-size: 1.01em;
  }

  .ui .button {
    font-family: "Open Sans Regular";

    font-size: 1.01em;
  }
  
  body {
    overflow: auto;
  }
  </style>
</head>
<body>

<div class="ui top red pointing menu">

    <div class="ui container" style="margin-top: 20px; padding-left: 70px;">
      <a href="admin_panel.php">
        <h2 class="ui header left aligned">
          <img src="images/bell-logo2.jpg">
          <div class="content">
            Question Bank
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
          <div class="ui green button" id="adminlogout">
            Admin Home
          </div>
        </div>
        <div class="row"></div>
      </div>
    </div>
  </div>

<?php if (isset($_SESSION['message'])): ?>
	<div class="msg" style="padding-left:2%">
		<div class='ui success message transition'>
			<i class='close icon'></i>
				<div class='header'>
				<?php
					echo $_SESSION['message'];
					header("Refresh: 0");
					sleep(2); 					
					unset($_SESSION['message']);
				?>
			</div>
		</div>
	</div>
<?php endif ?>


<div class="ui tiny modal" id="failedModal">
<!-- <i class="close icon"></i> -->
	<i class="close icon" id="failMessageClose"></i>
  	<div class="ui negative message" style="margin: 1%" >
  		<div class="header">
   			Failed! 
  		</div>
  		<p >All fields are required!</p>
  	</div>
</div>


<div class="ui tiny modal" id="updateFailedModal">
<!-- <i class="close icon"></i> -->
	<i class="close icon" id="updatefailMessageClose"></i>
  	<div class="ui negative message" style="margin: 1%" >
  		<div class="header">
   			Failed! 
  		</div>
  		<p >All fields are required!</p>
  	</div>
</div>


<div class="ui tiny modal" id="successModal">
<!-- <i class="close icon"></i> -->
	<i class="close icon" id="SuccessMessageClose"></i>
  	<div class="ui positive message" style="margin: 1%" >
  		<div class="header">
   			Success! 
  		</div>
  		<p >Question successfully added in the question bank!</p>
  	</div>
</div>

<div class="ui tiny modal" id="deleteSuccessModal">
<!-- <i class="close icon"></i> -->
	<i class="close icon" id="deleteSuccessMessageClose"></i>
  	<div class="ui positive message" style="margin: 1%" >
  		<div class="header">
   			Success! 
  		</div>
  		<p >Question deleted Succesfully!</p>
  	</div>
</div>



<?php if (isset($_SESSION['message1'])): ?>
<?php
    if ($_SESSION['message1'] =="fail") {
    	echo "<script> $('#failedModal').modal('show'); </script>";
    }
    elseif ($_SESSION['message1'] =="updateFail") {
    	echo "<script> $('#updateFailedModal').modal('show'); </script>";
    }
	elseif ($_SESSION['message1'] =="success") {
		echo "<script> $('#successModal').modal('show'); </script>";
		header("Refresh: 3");
	}
?>


<?php endif ?>
  
	<button class="ui button green" id="addQuestionButton"
			style="margin-top: 10px;margin-bottom: 10px;padding: 15px; margin-left:15%" >
			<i class="add icon"></i>Add Question
			
	</button>

  <!-- <div class="ui segment"> -->
<div class="ui grid">
    <div class="stretched row" style="height: 100vh; padding-left: 15%; padding-right: 15%;">
      <div class="column">
        <table id="example" class="ui celled table" style="width:100%">
        <thead>
            <tr>
                <th style="width:70%">Question Title</th>
                <th style="text-align:center">Edit</th>
                <th style="text-align:center">Delete</th>
            </tr>
        </thead>
        <tbody>
		<?php

			while ($row = mysqli_fetch_array($questions)) {
				
				$desc = str_replace('"', "''",$row['DESCRIPTION']);
				$desc = str_replace("'", "&#39;",$desc);
				
				$opA = str_replace('"', "''",$row['OPT_A']);
				$opA = str_replace("'", "&#39;",$opA);
				
				$opB = str_replace('"', "''",$row['OPT_B']);
				$opB = str_replace("'", "&#39;",$opB);
				
				$opC = str_replace('"', "''",$row['OPT_C']);
				$opC = str_replace("'", "&#39;",$opC);
				
				$opD = str_replace('"', "''",$row['OPT_D']);
				$opD = str_replace("'", "&#39;",$opD);
				
				$ans = $row['CORRECT_ANS'];
			
				echo "
				<tr>
					<td>".$row['DESCRIPTION']."</td>
					
					<td style='text-align:center'>
						<button class='mini ui button blue'
							onclick = 'showUpdateModal(\"".$row['ID']."\",\"$desc\",\"$opA\",\"$opB\",\"$opC\",\"$opD\",\"".$row['TRADE_ID']."\",\"$ans\");'
							type='edit' 
							name='edit'>Edit
						</button>
					</td>
							
					<td style='text-align:center'>
						<button class='mini ui button red'
							onclick = 'deleteData(".$row['ID'].")'
							type='delete' 
							name='delete'>
							Delete
						</button>
						
					</td>
				</tr>";
			}
		?>
        </tbody>
    </table>

      <!-- </div> -->
      </div>
</div>
</div>



<div class="ui modal" id="addQuestion">
<!-- <i class="close icon"></i> -->

  <div class="header" style="text-align: center;">
    Add Quiz Question
  </div>
<form class="ui form" method="POST">
  <div class="ui basic text segment" style="margin: 20px;">
	
	<div class="required field" style="margin-top: -2%">
		<label>Paste Question</label>
		<textarea rows="2" class="form-control" id="ques" name="ques" ></textarea>
	</div>

	
	<div class="ui two column grid">
		<div class=" required field column">
			<label>Option 1</label>
			<div class="ui input focus" style="">
				<input type="text" id="op1" name="op1" 
						style="" class="form-control" placeholder="Paste Option 1">
			</div>
		</div>
	  
		<div class=" required field column">
			<label>Option 2</label>
			<div class="ui input focus" style="">
				<input type="text" id="op2" name="op2" 
						style="" class="form-control" placeholder="Paste Option 2">
			</div>
		</div>
	  
		<div class=" required field column" style="margin-top: -2%">
			<label>Option 3</label>
			<div class="ui input focus" style="">
				<input type="text" id="op3" name="op3" 
						style="" class="form-control" placeholder="Paste Option 3">
			</div>
		</div>
	  
		<div class="required field column" style="margin-top: -2%">
			<label>Option 4</label>
			<div class="ui input focus" style="">
				<input type="text" id="op4" name="op4" 
						style="" class="form-control" placeholder="Paste Option 4">
			</div>
		</div>
		
		<div class="required field eight wide">
			<label>Correct Answer</label>
			<select class="ui dropdown" name="ans">
				<option value="1">One</option>
				<option value="2">Two</option>
				<option value="3">Three</option>
				<option value="4">Four</option>
			</select>
		</div>
		
		<div class="required field eight wide">
			<label>Question Module</label>
			<select class="ui dropdown" name="type">
				<option value="1">Engine</option>
				<option value="2">Airframe</option>
				<option value="3">Electic Components</option>
				<option value="4">Instruments</option>
				<option value="5">Radio</option>
				<option value="6">Armaments</option>
			</select>
		</div>
		
	</div>
	<center>
		<button class="ui button red" 
				style="margin-top: 2%;padding: 15px; margin-bottom: -2%; " 
				type="submit" 
				name="submit">
				<i class="add icon"></i>Create Question
				
		</button>
	</center>
	
  </div>
</form>
  
	
	<div class="actions">
		<div class="ui basic deny button">Cancel</div>
	</div>
</div>

<!-- EDIT QUESTION MODAL -->
<div class="ui modal" id="editQuestion">

  <div class="header" style="text-align: center;">
    Edit Quiz Question
  </div>
<form class="ui form" method="POST">
  <div class="ui basic text segment" style="margin: 20px;">
  
	<input type="hidden" id="update-hidden-id" name="id" value="">
	
	<div class="required field">
		<label>Paste Question</label>
		<textarea rows="2" class="form-control" id="desc" name="desc" value=""></textarea>
	</div>

	
	<div class="ui two column grid">
		<div class=" required field column">
			<label>Option 1</label>
			<div class="ui input focus" style="">
				<input type="text" id="opA" name="opA" value=""
						style="" class="form-control" placeholder="Paste Option 1">
			</div>
		</div>
	  
		<div class=" required field column">
			<label>Option 2</label>
			<div class="ui input focus" style="">
				<input type="text" id="opB" name="opB" value=""
						style="" class="form-control" placeholder="Paste Option 2">
			</div>
		</div>
	  
		<div class=" required field column">
			<label>Option 3</label>
			<div class="ui input focus" style="">
				<input type="text" id="opC" name="opC" value=""
						style="" class="form-control" placeholder="Paste Option 3">
			</div>
		</div>
	  
		<div class="required field column">
			<label>Option 4</label>
			<div class="ui input focus" style="">
				<input type="text" id="opD" name="opD" value=""
						style="" class="form-control" placeholder="Paste Option 4">
			</div>
		</div>
		
		<div class="required field eight wide">
			<label>Correct Answer</label>
			<select class="ui dropdown" name="correct" id="correct" value="">
				<option value="1">One</option>
				<option value="2">Two</option>
				<option value="3">Three</option>
				<option value="4">Four</option>
			</select>
		</div>
		
		<div class="required field eight wide">
			<label>Question Module</label>
			<select class="ui dropdown" name="trade" id="trade">
				<option value="1">Engine</option>
				<option value="2">Airframe</option>
				<option value="3">Electic Components</option>
				<option value="4">Instruments</option>
				<option value="5">Radio</option>
				<option value="6">Armaments</option>
			</select>
		</div>
		
	</div>
	<center>
		<button class="ui button green" 
				style="margin-top: 25px;padding: 15px;" 
				type="submit" 
				name="update">
				<i class="edit icon"></i>Update Question
				
		</button>
	</center>
	
  </div>
</form>
  
	<div class="actions">
		<div class="ui basic deny button">Cancel</div>
	</div>
</div>

<div class="ui small modal" id="confirmDelete">
	<div class="header">Delete Record</div>
	  <div class="content">
		<input type="hidden" id="delete-hidden-id" name="delete-id" value="">
		<p>Are you sure you want to delete this item?</p>
	  </div>
	  <div class="actions">
		<div class="ui green cancel button">
			<i class="remove icon"></i>Cancel
		</div>
		<button class="ui red ok button" onclick="confirm()">
			<i class="checkmark icon"></i> Delete
			
		</button>
	  </div>
</div>

<script>

//show the data table
$(document).ready(function() {
    $('#example').DataTable();
} );
//add question modal
$('#addQuestionButton').click(function(){
  $('#addQuestion').modal({closable: false}).modal('show');
});

// alert close icon
$('.message .close')
  .on('click', function() {
    $(this)
      .closest('.message')
      .transition('fade')
    ;
  })
;

function showUpdateModal(id,desc,a,b,c,d,trade,ans)
{
	$('#update-hidden-id').val(id);
	$("#editQuestion #desc").val(desc);
	$("#editQuestion #opA").val(escapeHtml(a));
	$("#editQuestion #opB").val(escapeHtml(b));
	$("#editQuestion #opC").val(escapeHtml(c));
	$("#editQuestion #opD").val(escapeHtml(d));
	$("#editQuestion #correct").val(ans);
	$("#editQuestion #trade").val(trade);
	$('#editQuestion').modal('show');
}

function escapeHtml(text) {
  return text
      .replace("&#39;", "\'");
}

function deleteData(id)
{
	$('#delete-hidden-id').val(id);
	$('#confirmDelete').modal('show');
}

function confirm()
{
	var id = $('#delete-hidden-id').val();
	location.href = "http://localhost/cbt/server.php?delete=" + id;
}

  $('#SuccessMessageClose').on('click', function() {
    $('#successModal').modal('hide');
  });

  $('#failMessageClose').on('click', function() {
    $('#failedModal').modal('hide');
    $('#addQuestion').modal('show');
  });


  $("#adminlogout").click(function(){
    $('#adminlogout').addClass('loading');
      window.location.href = "admin_panel.php";
  });


</script>
</body>
</html>
