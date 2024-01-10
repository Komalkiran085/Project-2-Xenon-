<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<link rel="stylesheet" type="text/css" href="css/addque.css">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Antonio:wght@200&display=swap" rel="stylesheet">	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<div class="col-sm-12 page">
		<div class="col-sm-2 index">
			<div class="dashboard">Dashboard<hr></div>
			<div class="teacher">Teacher</div>
			<div class="menu-bar">
				<ul>
					<li><a href="addstudent.php"><i class="fa fa-user-circle" aria-hidden="true"></i></a>Student</li>
					<li><a href="addtest.php"><i class="fa fa-university" aria-hidden="true"></i></a>Test</li>
					<li><a href="addque.php"><i class="fa fa-desktop" aria-hidden="true"></i></a>Add_Question</li>
					<li><a href="showresult.php"><i class="fa fa-desktop" aria-hidden="true"></i></a>Result</li>
					<li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a>LOGOUT</li>
				</ul>
			</div>
		</div>
		<div class="col-sm-8 background">
			<h1>Hello!! <?php echo $_SESSION['email'];?></h1>
			<div class="col-sm-12">
				<div class="col-sm-4"></div>
				<div class="form">
			<form>
				<div class="contain">
							<div class="user_fields">
								<label for="test">Test name:</label>
								<input type="tname" name="tname" id="tname" class="form-control" placeholder="Enter your test">
								<div class="testlist" id="testlist" style="width:100%;float:left;color:black;"></div>
							</div>
							<div class="user_fields">
								<label for="que_id">Question Number:</label>
								<input type="number" name="que_id" id="que_id" value="">
							</div>
							<div class="user_fields">
								<label for="que">Question:</label>
								<input type="text" name="que" id="que" class="form-control" placeholder="Enter your question">
							</div>
							<div class="user_fields">
								<label for="op1">Option 1:</label>
								<input type="text" name="op1" id="op1" class="form-control" placeholder="Enter your 1st option">
							</div>
							<div class="user_fields">
								<label for="op2">Option 2:</label>
								<input type="text" name="op2" id="op2" class="form-control" placeholder="Enter your 2nd option">
							</div>
							<div class="user_fields">
								<label for="op3">Option 3:</label>
								<input type="text" name="op3" id="op3" class="form-control" placeholder="Enter your 3rd option">
							</div>
							<div class="user_fields">
								<label for="op4">Option 4:</label>
								<input type="text" name="op4" id="op4" class="form-control" placeholder="Enter your 4th option">
							</div>
							<div class="user_fields">
								<label for="ans">Answer:</label>
								<input type="number" name="ans" id="ans" value="">
							</div>
							<div class="col-sm-12">
								<div class="col-sm-3"></div>
							<div class="col-sm-6 submit_btn">
								<button type="submit" name="submit" id="submit" onclick="addque();">Submit</button>
							</div>
							<div class="col-sm-3"></div>
						</div>
				    </div>
				    <div>
				    	<div class="teacherlist" id="teacherlist"></div>
				    </div>
			</form>				
			</div>
				<div class="col-sm-4"></div>
			</div>
		</div>
		<div class="col-sm-2 background">
			<button type="submit" class="profile_btn">My Profile<a href="#"><i class="fa fa-chevron-down" aria-hidden="true"></i></a></button>
		</div>
	<script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
	<script type="text/javascript">

		gettest();

		function gettest()
		{
			var token='<?php echo password_hash("gettest", PASSWORD_DEFAULT);?>';
			
				$.ajax(
				{
					type:'POST',
					url:"ajax/gettest.php",
					data:{token:token},
					success:function(data)
					{
						$('#testlist').html(data);
					}
				});
			
		}


		// function addque()
		// {
		// 	var que_id=document.getElementById('que_id').value;	
		// 	var que=document.getElementById('que').value;
		// 	var op1=document.getElementById('op1').value;
		// 	var op2=document.getElementById('op2').value;
		// 	var op3=document.getElementById('op3').value;
		// 	var op4=document.getElementById('op4').value;
		// 	var ans=document.getElementById('ans').value;
		// 	var tuid=document.getElementById('test').value;
		// 	var token='<?php echo password_hash("addque", PASSWORD_DEFAULT);?>';
		// 	if(que!="" && op1!="" && op2!="" && op3!="" && op4!="" && ans!="" && tuid!="")
		// 	{
		// 		$.ajax(
		// 		{
		// 			type:'POST',
		// 			url:"ajax/addque.php",
		// 			data:{que:que,op1:op1,op2:op2,op3:op3,op4:op4,ans:ans,tuid:tuid,token:token},
		// 			success:function(data)
		// 			{
		// 				// alert(data);
		// 				if(data == 0)
		// 				{
		// 					alert("Question added successfully");
		// 				}
		// 			}
		// 		});
		// 	}

		// 	else
		// 	{
		// 		alert("Please fill all details");
		// 	}
		// }


		function addque()
		{
			var que_id=document.getElementById('que_id').value;	
			var que=document.getElementById('que').value;
			var op1=document.getElementById('op1').value;
			var op2=document.getElementById('op2').value;
			var op3=document.getElementById('op3').value;
			var op4=document.getElementById('op4').value;
			var ans=document.getElementById('ans').value;
			var tuid=document.getElementById('test').value;
			var token='<?php echo password_hash("addque", PASSWORD_DEFAULT);?>';
			if(que!="" && op1!="" && op2!="" && op3!="" && op4!="" && ans!="" && tuid!="")
			{
				$.ajax(
				{
					type:'POST',
					url:"ajax/addque.php",
					data:{que:que,op1:op1,op2:op2,op3:op3,op4:op4,ans:ans,tuid:tuid,token:token},
					success:function(data)
					{
						// alert(data);
						if(data == 0)
						{
							alert("Question added successfully");
						}
					}
				});
			}

			else
			{
				alert("Please fill all details");
			}
		}

    </script>
<script type="text/javascript">
    $('form').submit(function(e) {
    e.preventDefault();
});</script>

</body>
</html>