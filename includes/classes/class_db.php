<?php

  require_once("class_settings.php");
  
  class Database {
   
    var $host;
    var $username;
    var $password;
    var $database;
    var $key;
    var $data_array;        // data from the database
	
	function Database(){
	  $db_info = new Settings;
	  
	  $this->host = $db_info->host;
	  $this->username = $db_info->username;
	  $this->password = $db_info->password;
	  $this->database = $db_info->database;
	  $this->key = $db_info->key;
	}
	
	function connect(){
		mysqli_connect($this->host,$this->username,$this->password) or die( "Unable to connect to database");
    	mysql_select_db($this->database) or die( "Unable to select database");
	}
	
	function query($sql){
	  $result = mysql_query($sql);
	  
	  //check if the word select is in the sql string
	  $pos = stripos($sql, 'select');

	  //if a select statement then return array
	  if($pos !== false){
	  	while ($row = mysql_fetch_assoc($result)) {
      		$data_array[] = $row;
      	}
		
		if(isset($data_array)){ return $data_array; }
		
	  //if insert or update then return result
	  }else{
		return $result;
	  }

	}
	
	function disconnect(){
	  mysql_close();
	}
	
  }
  
?>