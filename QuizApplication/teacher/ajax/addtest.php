<?php 
    include('connection.php');
    session_start();
    if(isset($_POST['token']) && password_verify("test", $_POST['token']))
    {
    	$tname=test_input($_POST['tname']);
        $cid=test_input($_POST['cid']);

    	$check=$db->prepare('INSERT INTO test_details(tname,cid) VALUES (?,?)');
    	$data=array($tname,$cid);
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


?>