<?php
session_start();
    include("DBConnect.php");

    $userData = DBConnect::getInstance()->doLogin($_POST['username'],$_POST['password']);
    if ($userData != null) {

        //set session
        $_SESSION['authorized'] = true;

        // reload the page
       $_SESSION['success'] = 'Login Successful';
       header('Location: /views/admin/index.php');
       exit;


	} else {
		header('Location: /index.php?msg=Sorry, wrong username or password');
       exit;
	$_SESSION['error'] = 'Sorry, wrong username or password';
	}

    // $data = DBConnect::getInstance()->getRepairCaseList();
    // $data2 = DBConnect::getInstance()->getRepairCaseListByStatus('Test');
    
    // $RepairCaseObj['status'] = 'aa';
    // $RepairCaseObj['customer_name'] = 'aa';
    // $data3 = DBConnect::getInstance()->addRepairCase($RepairCaseObj);
	// echo '<pre>';
	// print_r($data3);
    // echo '</pre>';
    //header('Location: /views/admin/index.php');
?>