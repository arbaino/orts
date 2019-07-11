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
    //  echo '</pre>';RepairCaseStatusChangeAction
    // exit;
    $RepairCase_StatusChange_Action = new RepairCase_StatusChange_Action();
    $RepairCase_StatusChange_Action->procress($_GET);
    // $RepairCase_Save_Action->procress($_GET);
    
    class RepairCase_StatusChange_Action
    {
        public function procress($data){
            include("DBConnect.php");
            
            $RepairCase = DBConnect::getInstance()->getRepairCaseById($data['id']);
            $history = array();
            $history['repaircase_id'] = $data['id'];
            $history['status_from'] = $RepairCase['status'];
            $history['status_to'] = $data['status'];
            DBConnect::getInstance()->editRepairCase($data);
            $RepairCase = DBConnect::getInstance()->addRepairCaseHistory($history);
            
            header('Location: /views/admin/index.php');
        }
    }
?>
