<?php

	/*
		This is an example class script proceeding secured API
		To use this class you should keep same as query string and function name
		Ex: If the query string value rquest=delete_user Access modifiers doesn't matter but function should be
		     function delete_user(){
				 You code goes here
			 }
		Class will execute the function dynamically;

		usage :

		    $object->response(output_data, status_code);
			$object->_request	- to get santinized input

			output_data : JSON (I am using)
			status_code : Send status message for headers

		Add This extension for localhost checking :
			Chrome Extension : Advanced REST client Application
			URL : https://chrome.google.com/webstore/detail/hgmloofddffdnphfgcellkdfbfbjeloo

		I used the below table for demo purpose.

		CREATE TABLE IF NOT EXISTS `users` (
		  `user_id` int(11) NOT NULL AUTO_INCREMENT,
		  `user_fullname` varchar(25) NOT NULL,
		  `user_email` varchar(50) NOT NULL,
		  `user_password` varchar(50) NOT NULL,
		  `user_status` tinyint(1) NOT NULL DEFAULT '0',
		  PRIMARY KEY (`user_id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
 	*/

	require_once("Rest.inc.php");

	class API extends REST {

		public $data = "";

		const DB_SERVER = "localhost";
		const DB_USER = "root";
		const DB_PASSWORD = "1234";
		const DB = "project_db";

		private $db = NULL;

					public function __construct(){
						parent::__construct();				// Init parent contructor
						$this->dbConnect();					// Initiate Database connection
					}

					private function dbConnect(){
						$this->db = mysqli_connect(self::DB_SERVER,self::DB_USER,self::DB_PASSWORD);
						if($this->db){
							 mysqli_select_db($this->db,self::DB);
						}
					}

					public function processApi(){
						   $func = strtolower(trim(str_replace("/","",$_REQUEST['rquest'])));
						if((int)method_exists($this,$func) > 0)
							 $this->$func();
						else
							 $this->response('Error',404);				// If the method not exist with in this class, response would be "Page not found".
					}

				  private function test(){

						if($this->get_request_method() != "GET"){
							 $this->response('',406);
						}

							// If success everythig is good send header as "OK" and return list of users in JSON format
						  $result = array('data from API');
							$this->response($this->json($result), 200);

						  $this->response('',204);	// If no records "No Content" status
					}

					private function create(){
								if($this->get_request_method() != "POST"){
					                $error = array('status' => "Failed", "msg" => "Invalid Method");
									        $this->response($this->json($error),406);
								}

								// $custID = $this->_request['customerID'];
								$custFirstname = $this->_request['customerFirstname'];
								$custLastname = $this->_request['customerLastname'];
								$custAdd1 = $this->_request['customerAdd1'];
								$custAddr2 = $this->_request['customerAddr2'];
								$custCity = $this->_request['customerCity'];
								$custState = $this->_request['customerState'];
								$custPostcode = $this->_request['customerPostcode'];
								$custCountry = $this->_request['customerCountry'];
								$custUsername = $this->_request['customerUsername'];
								$custPassword = $this->_request['customerPassword'];
								$custEmail = $this->_request['customerEmail'];
								$custTel = $this->_request['customerTel'];

								$encryptPassword = md5($custPassword);

								$SQL = "INSERT INTO customer(CustomerFirstname,
																						 CustomerLastname,
																						 CustomerAddr1,
																						 CustomerAddr2,
																						 City,
																						 State,
																						 Postcode,
																						 Country,
																						 Username,
																						 Password,
																						 Email,
																						 CustomerTel,
																						 PrivilegeID)
											 VALUES ('$custFirstname',
												 			 '$custLastname',
															 '$custAdd1',
															 '$custAddr2',
															 '$custCity',
															 '$custState',
															 '$custPostcode',
															 '$custCountry',
															 '$custUsername',
															 '$encryptPassword',
															 '$custEmail',
															 '$custTel',
															 '1'
														  )";
								if(mysqli_query($this->db,$SQL)){
									   $result = array('status' => "Success", "msg" => "Register Successfully");
								}else{
									   $result = array('status' => "Failed", "msg" => "Register Fail" );
								}

							 	$this->response($this->json($result), 200);

							 	$this->response('',204);	// If no records "No Content" status
					}

					private function delete(){
						if($this->get_request_method() != "GET"){
											 $error = array('status' => "Failed", "msg" => "Invalid Method");
											 $this->response($this->json($error),406);
						 }
						 $customerID = $this->_request['CustID'];

						 $SQL = "DELETE FROM customer WHERE CustomerID = '$customerID'";
						 if(mysqli_query($this->db,$SQL)){
									$result = array('status' => "Success", "msg" => "Delete Successfully");
						 }else{
									$result = array('status' => "Failed", "msg" => "Delete Fail" );
						 }

						 $this->response($this->json($result), 200);

						 $this->response('',204);	// If no records "No Content" status
					}

					private function read(){
						if($this->get_request_method() != "GET"){
							$this->response('',406);
						}

						//echo 'read';

						$sql = mysqli_query($this->db,"SELECT * FROM customer");
						//if(mysqli_num_rows($this->db,$sql) > 0){
							$result = array();
							while($rlt = mysqli_fetch_array($sql,MYSQLI_ASSOC)){
								$result[] = $rlt;
							}
							// If success everythig is good send header as "OK" and return list of users in JSON format
							$this->response($this->json($result), 200);
						//}
						$this->response('',204);	// If no records "No Content" status
					}

					private function json($data){
						if(is_array($data)){
							return json_encode($data);
						}
					}
	 }

	// Initiiate Library

	$api = new API;
	$api->processApi();
?>
