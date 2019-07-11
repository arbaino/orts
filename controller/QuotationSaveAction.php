<?php
          
        
       
    $Quatation_Save_Action = new Quatation_Save_Action();
    $Quatation_Save_Action->procress($_POST);
    
    class Quatation_Save_Action
    {
        public function procress($data){
            echo '<pre>';
            print_r($data);
            echo '</pre>';  
        
            include("DBConnect.php");
            if(isset($data['id'])){
                $lineItem = $data['lineItem'];
                $totalPrice = 0;
                foreach($lineItem['price'] as $item){
                    if($item != ''){
                        $totalPrice += (int)$item;
                    }
                    
                }
                unset($data['lineItem']);
                $data['quotation_number'] = '';
                $data['total_price'] = $totalPrice;
                DBConnect::getInstance()->editQuotation($data);
                DBConnect::getInstance()->deleteQuotationLineItemByQuotationId($data['id']);
                
                $quoationId = $data['id'];
                var_dump($quoationId);
                if($lineItem['sparepart'][0] != '' && $lineItem['price'][0] != ''){
                    $data = array();
                    $data['quotation_id'] = $quoationId;
                    $data['sparepart'] = $lineItem['sparepart'][0];
                    $data['price'] = $lineItem['price'][0];
                    DBConnect::getInstance()->addQuotationLineItem($data);
                }
                if($lineItem['sparepart'][1] != '' && $lineItem['price'][1] != ''){
                    $data = array();
                    $data['quotation_id'] = $quoationId;
                    $data['sparepart'] = $lineItem['sparepart'][1];
                    $data['price'] = $lineItem['price'][1];
                    DBConnect::getInstance()->addQuotationLineItem($data);
                }
                if($lineItem['sparepart'][2] != '' && $lineItem['price'][2] != ''){
                    $data = array();
                    $data['quotation_id'] = $quoationId;
                    $data['sparepart'] = $lineItem['sparepart'][2];
                    $data['price'] = $lineItem['price'][2];
                    DBConnect::getInstance()->addQuotationLineItem($data);
                }
                if($lineItem['sparepart'][3] != '' && $lineItem['price'][3] != ''){
                    $data = array();
                    $data['quotation_id'] = $quoationId;
                    $data['sparepart'] = $lineItem['sparepart'][3];
                    $data['price'] = $lineItem['price'][3];
                    DBConnect::getInstance()->addQuotationLineItem($data);
                }
                if($lineItem['sparepart'][4] != '' && $lineItem['price'][4] != ''){
                    $data = array();
                    $data['quotation_id'] = $quoationId;
                    $data['sparepart'] = $lineItem['sparepart'][4];
                    $data['price'] = $lineItem['price'][4];
                    DBConnect::getInstance()->addQuotationLineItem($data);
                }

            }else{
                $lineItem = $data['lineItem'];
                $repairCaseId = $data['repaircase_id'];
                $totalPrice = 0;
                
                foreach($lineItem['price'] as $item){
                    if($item != ''){
                        $totalPrice += (int)$item;
                    }
                    
                }

                unset($data['lineItem']);
                unset($data['repaircase_id']);
                
                $data['quotation_number'] = '';
                $data['total_price'] = $totalPrice;
                

                DBConnect::getInstance()->addQuotation($data);
                $quoationId = DBConnect::getInstance()->getLastQuotationId();
                var_dump($quoationId);
                if($lineItem['sparepart'][0] != '' && $lineItem['price'][0] != ''){
                    $data = array();
                    $data['quotation_id'] = $quoationId;
                    $data['sparepart'] = $lineItem['sparepart'][0];
                    $data['price'] = $lineItem['price'][0];
                    DBConnect::getInstance()->addQuotationLineItem($data);
                }
                if($lineItem['sparepart'][1] != '' && $lineItem['price'][1] != ''){
                    $data = array();
                    $data['quotation_id'] = $quoationId;
                    $data['sparepart'] = $lineItem['sparepart'][1];
                    $data['price'] = $lineItem['price'][1];
                    DBConnect::getInstance()->addQuotationLineItem($data);
                }
                if($lineItem['sparepart'][2] != '' && $lineItem['price'][2] != ''){
                    $data = array();
                    $data['quotation_id'] = $quoationId;
                    $data['sparepart'] = $lineItem['sparepart'][2];
                    $data['price'] = $lineItem['price'][2];
                    DBConnect::getInstance()->addQuotationLineItem($data);
                }
                if($lineItem['sparepart'][3] != '' && $lineItem['price'][3] != ''){
                    $data = array();
                    $data['quotation_id'] = $quoationId;
                    $data['sparepart'] = $lineItem['sparepart'][3];
                    $data['price'] = $lineItem['price'][3];
                    DBConnect::getInstance()->addQuotationLineItem($data);
                }
                if($lineItem['sparepart'][4] != '' && $lineItem['price'][4] != ''){
                    $data = array();
                    $data['quotation_id'] = $quoationId;
                    $data['sparepart'] = $lineItem['sparepart'][4];
                    $data['price'] = $lineItem['price'][4];
                    DBConnect::getInstance()->addQuotationLineItem($data);
                }
                $data = array();
                
                $data['id']= $repairCaseId;
                $data['quotation_id'] = $quoationId;
                DBConnect::getInstance()->editRepairCase($data);
                
            }
            header('Location: /views/admin/index.php');
        }
    }
?>
