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
    $RepairCase_Save_Action = new RepairCase_Save_Action();
    $RepairCase_Save_Action->procress($_POST);
    // $RepairCase_Save_Action->procress($_GET);
    
    class RepairCase_Save_Action
    {
        public function procress($data){
            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';  
            var_dump($data['id']);
            var_dump($data['status']);
            include("DBConnect.php");
            if(isset($data['id'])){
                var_dump('Go Edit '); 
                
               DBConnect::getInstance()->editRepairCase($data);
            }else{
                $data['status'] = "Request";
                DBConnect::getInstance()->addRepairCase($data);
            }
           header('Location: /views/admin/index.php');
        }
    }
?>
