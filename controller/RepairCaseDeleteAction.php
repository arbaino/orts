<?php
   
    // $RepairCaseObj['status'] = 'Request';
    // $RepairCaseObj['customer_name'] = 'Teerapun';
    // $RepairCaseObj['contact_person'] = 'Teerapun';
    // $RepairCaseObj['phone_number'] = 'Teerapun';
    // $RepairCaseObj['condition'] = 'Teerapun';
    // $RepairCaseObj['model'] = 'Teerapun';
    // $RepairCaseObj['IMEI'] = 'Teerapun';
    // $RepairCaseObj['description'] = 'Teerapun';
    // $repaircaseData = DBConnect::getInstance()->addRepairCase($RepairCaseObj);
	//  echo '<pre>';
	//  print_r($_POST);
    //  echo '</pre>';
    // exit;
    $RepairCase_Delete_Action = new RepairCase_Delete_Action();
    $RepairCase_Delete_Action->procress($_GET);
    
    class RepairCase_Delete_Action
    {
        public function procress($data){
            echo '<pre>';
            print_r($data);
            echo '</pre>';  
            include("DBConnect.php");
            var_dump('Go delete'); 
            DBConnect::getInstance()->deleteRepairCase($data['id']);
            header('Location: /views/admin/index.php');
        }
    }
?>
