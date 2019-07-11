<?php

class DBConnect
{
  private $con;
  public static function getInstance()
  {
    static $db = null;
    if ( $db == null )
      $db = new DBConnect();
    return $db;
  }
  private function __construct()
  {
	
	require_once('config.php');	
	$this->con = mysqli_connect($dbconfig['db_server'],$dbconfig['db_username'],$dbconfig['db_password'],$dbconfig['db_name']);
	$this->con->select_db($dbconfig['db_name']);
	
	mysqli_set_charset($this->con,"utf8");
		if ($this->con->connect_errno) {
			printf("Connect failed: %s\n", $this->con->connect_error);
			exit();
		}
		// Check connection
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

	}
	public function query($queryStr){	
		if (!$this->con->query($queryStr)) {
			printf("Errormessage: %s\n", $this->con->error);
		}
		// return mysqli_fetch_all($result,MYSQLI_ASSOC);
	}
	public function doLogin($username,$password){	
		$queryStr ="select * from user where username='".$username."' and password='".md5($password)."'";
		$result = mysqli_query($this->con,$queryStr);
	return mysqli_fetch_all($result,MYSQLI_ASSOC);
}
  public function addRepairCase($data){	
		$sql = $this->getInsertQuery('repaircase',$data);
		// var_dump($sql);
		$this->query($sql);
}	
  public function getRepairCaseList(){	
	$queryStr ="select * from repaircase";
	
  	$result = mysqli_query($this->con,$queryStr);
	return mysqli_fetch_all($result,MYSQLI_ASSOC);
}
public function getRepairCaseListByStatus($status){	
	$queryStr ="select * from repaircase where status='".$status."'";
  	$result = mysqli_query($this->con,$queryStr);
	return mysqli_fetch_all($result,MYSQLI_ASSOC);
}
public function getRepairCaseById($id){	
	$queryStr ="select * from repaircase where id='".$id."'";
  	$result = mysqli_query($this->con,$queryStr);
	return mysqli_fetch_all($result,MYSQLI_ASSOC)[0];
}
 public function editRepairCase($data){
	 $id=$data['id'];
	 unset($data['id']);
	$sql = $this->getUpdateQuery('repaircase',$data,' where id = '.$id);
	$this->query($sql);
 }
 public function deleteRepairCase($id){
   $sql = 'Delete from repaircase where id = '.$id;
   $this->query($sql);
}
 public function getInsertQuery($table,$data){
	$queryStr = sprintf("INSERT INTO %s (%s) VALUES('%s')",$table,implode(",",array_keys($data)),implode("','",$data));
	return $queryStr;
  }
 public function getUpdateQuery($table,$data,$where){
   $update = [];
   foreach ($data as $key => $value) {
   $update[] = $key." = '".$value."' ";
   }
   $queryStr = sprintf("UPDATE %s SET %s %s", $table,implode(", ",$update),$where);
	return $queryStr;
 }
 public function getLastQuotationId(){	
	$queryStr ="select id from quotation order by id DESC limit 1";
  	$result = mysqli_query($this->con,$queryStr);
	return mysqli_fetch_all($result,MYSQLI_ASSOC)[0]['id'];
}
 public function addQuotation($data){	
	$sql = $this->getInsertQuery('quotation',$data);
	//var_dump($sql);exit;
	$this->query($sql);
}	

public function editQuotation($data){
	$id=$data['id'];
	unset($data['id']);
   $sql = $this->getUpdateQuery('quotation',$data,' where id = '.$id);
   $this->query($sql);
}

public function addQuotationLineItem($data){	
	$sql = $this->getInsertQuery('quotation_lineitem',$data);
	
	$this->query($sql);
}
public function deleteQuotationLineItemByQuotationId($QuotationId){
	$sql = 'Delete from quotation_lineitem where quotation_id = '.$QuotationId;
	$this->query($sql);
 }
 public function getQuotationLineItemListByQuotationId($QuotationId){	
	$queryStr ="select * from quotation_lineitem where quotation_id =".$QuotationId;
	
  	$result = mysqli_query($this->con,$queryStr);
	return mysqli_fetch_all($result,MYSQLI_ASSOC);
}
public function addRepairCaseHistory($data){	
	$sql = $this->getInsertQuery('repaircase_history',$data);
	
	$this->query($sql);
}
public function getHistoryListByKeyword($keyword){	
	$queryStr ="select * from repaircase_history 
	where repaircase_id IN (Select id from repaircase where phone_number = '".$keyword."' or IMEI = '".$keyword."' order by create_datetime DESC ) order by change_datetime ASC";
	//var_dump($queryStr);exit;
  	$result = mysqli_query($this->con,$queryStr);
	return mysqli_fetch_all($result,MYSQLI_ASSOC);
}
public function addReview($data){	
	$sql = $this->getInsertQuery('review',$data);
	
	$this->query($sql);
}
}
