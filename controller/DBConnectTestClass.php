<?php
use PHPUnit\Framework\TestCase;
class DBConnectTest extends TestCase
{
    public function testDoLogin()
    {
		$userData = DBConnect::getInstance()->doLogin('admin','admin');
        $this->assertEmpty($userData);
		$userData = DBConnect::getInstance()->doLogin('admin','1234');
        $this->assertNotEmpty($userData);
		
    }
	public function testAddRepairCase()
    {
		$data = array();
		$data['status'] = 'Request';
		$data['customer_name'] = 'Saran Boon';
		$data['contact_person'] = 'Chanchai';
		$data['phone_number'] = '0842250123';
		$data['bad_condition'] = 'screen broken';
		$data['model'] = 'iPhone Xs max';
		$data['IMEI'] = '8025625152025423';
		$data['phone_password'] = '324075';
		$data['description'] = '';
		
		$result = DBConnect::getInstance()->addRepairCase($data);
        $this->assertTrue($result);
    }
	
	public function testGetRepairCaseList()
    {		
		$RepairCaseList = DBConnect::getInstance()->getRepairCaseList();		
		$this->assertNotEmpty($RepairCaseList);
    }
	
	public function testGetRepairCaseListByStatus()
    {
		$data = array();
		$data['status'] = 'Request';
		$data['customer_name'] = 'Saran Boon';
		$data['contact_person'] = 'Chanchai';
		$data['phone_number'] = '0842250123';
		$data['bad_condition'] = 'screen broken';
		$data['model'] = 'iPhone Xs max';
		$data['IMEI'] = '8025625152025423';
		$data['phone_password'] = '324075';
		$data['description'] = '';
		$result = DBConnect::getInstance()->addRepairCase($data);
		
		$data = array();
		$data['status'] = 'Waiting for customer';
		$data['customer_name'] = 'Saran Boon';
		$data['contact_person'] = 'Chanchai';
		$data['phone_number'] = '0842250123';
		$data['bad_condition'] = 'screen broken';
		$data['model'] = 'iPhone Xs max';
		$data['IMEI'] = '8025625152025423';
		$data['phone_password'] = '324075';
		$data['description'] = '';
		$result = DBConnect::getInstance()->addRepairCase($data);
		
		$data = array();
		$data['status'] = 'Waiting for repair';
		$data['customer_name'] = 'Saran Boon';
		$data['contact_person'] = 'Chanchai';
		$data['phone_number'] = '0842250123';
		$data['bad_condition'] = 'screen broken';
		$data['model'] = 'iPhone Xs max';
		$data['IMEI'] = '8025625152025423';
		$data['phone_password'] = '324075';
		$data['description'] = '';
		$result = DBConnect::getInstance()->addRepairCase($data);
		$RepairCaseList = DBConnect::getInstance()->getRepairCaseListByStatus('Request');
        $this->assertCount(1,$RepairCaseList);
		$RepairCaseList = DBConnect::getInstance()->getRepairCaseListByStatus('Waiting for customer');
        $this->assertCount(1,$RepairCaseList);
		$RepairCaseList = DBConnect::getInstance()->getRepairCaseListByStatus('Waiting for repair');
        $this->assertCount(1,$RepairCaseList);
    }
	public function testGetRepairCaseById()
    {		
		$RepairCaseList = DBConnect::getInstance()->getRepairCaseList();		
		$this->assertNotEmpty($RepairCaseList);
    }
	
	public function testAddQuotation()
    {
		$data = array();
		$data['quotation_number'] = '0001';
		$data['total_price'] = '1500.00';		
		$result = DBConnect::getInstance()->addQuotation($data);
        $this->assertTrue($result);
    }
	public function testEditQuotation()
    {
		$data = array();
		$data['quotation_number'] = '0001';
		$data['total_price'] = '1200.00';		
		$result = DBConnect::getInstance()->editQuotation($data);
        $this->assertTrue($result);
    }
	public function testAddQuotationLineItem()
    {
		$data = array();
		$data['quotation_id'] = '50';
		$data['sparepart'] = 'Screen';	
		$data['price'] = '1200.00';	
		$result = DBConnect::getInstance()->addQuotationLineItem($data);
        $this->assertTrue($result);
    }
	
	
}
?>