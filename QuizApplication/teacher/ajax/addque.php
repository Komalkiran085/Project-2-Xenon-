<!-- <?php 
    include('connection.php');
    session_start();
    if(isset($_POST['token']) && password_verify("addque", $_POST['token']))
    {
        $que=test_input($_POST['que']);  
        $op1=test_input($_POST['op1']);
        $op2=test_input($_POST['op2']);
        $op3=test_input($_POST['op3']);
        $op4=test_input($_POST['op4']);
        $ans=test_input($_POST['ans']);
        $tuid=test_input($_POST['tuid']);

    	$check=$db->prepare('INSERT INTO add_que(que,op1,op2,op3,op4,ans,tuid) VALUES (?,?,?,?,?,?,?)');
    	$data=array($que,$op1,$op2,$op3,$op4,$ans,$tuid);
    	$execute = $check->execute($data);
    	if($execute)
    	{
    		echo 0;
    	}

    	else
    	{
    		echo 2;
    	}

    }

    function test_input($data) {
    	$data = trim($data);
    	$data = stripslashes($data);
    	$data = htmlspecialchars($data);
    	return $data;
    }


?> -->

<?php 
    include('connection.php');
    session_start();
    if(isset($_POST['token']) && password_verify("addque", $_POST['token']))
    {
        $tuid=test_input($_POST['tuid']);
        $que_id=test_input($_POST['que_id']);  
        $que=test_input($_POST['que']);
        $ans=test_input($_POST['ans']);
        $choice = array();
        $choice[1] = test_input($_POST['op1']);
        $choice[2] = test_input($_POST['op2']);
        $choice[3] = test_input($_POST['op3']);
        $choice[4] = test_input($_POST['op4']);

        $query="INSERT INTO ques (";
        $query.= "que_id, que)";
        $query.="VALUES (";
        $query.="'{$que_id}','{$que}'";
        $query.=")";

        $result = mysqli_query($connection,$query);
        if($result){
            foreach($choice as $option => $value){
                if($value != ""){
                    if($correct_choice == $option){
                        $ans = 1;
                    }else{
                        $ans = 0;
                    }
                }
            }
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }