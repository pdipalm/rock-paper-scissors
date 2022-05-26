<?php
	$DB_USERNAME = "dpete31207";
	$DB_DATABASE = "webgroup3_default";
	$dbpwdpath = $_SERVER['CONTEXT_DOCUMENT_ROOT'] . "/../db.txt";
	$db = false;
	
	if(file_exists($dbpwdpath)){
		$DBPWD = trim(file_get_contents($dbpwdpath));
		$db = new mysqli("127.0.0.1", $DB_USERNAME, $DBPWD, $DB_DATABASE);
		if($db->connect_errno){
			echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
		}
		
		unset($DBPWD);
	}else{
		trigger_error("Users db.txt file missing, unable to use DB, error=".$db->error, E_USER_ERROR);
	}
	
	function redirect($to){
		header('location: ' . $to, true, 302);
		exit(1);
	}
	
	function outputDBError($db){
		echo "<pre>";
		if($db->error){
			try{
				throw new Exception("MySQL error $db error", $db->errno);
			}catch(Exception $e){
				printf("Error No: %d<br>%s<br>", $e->getCode(), $e->getMessage());
				echo nl2br($e->getTraceAsString());
			}
		}else{
			throw new Exception("Unknown DB issue");
		}
	}
?>