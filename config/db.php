<?php

	class Database{
        
		private static $instance=NULL;
		private function __construct(){}
		private function __clone(){}
		
		public static function connect(){
			if (!isset(self::$instance)) {
				$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
				self::$instance= new PDO('mysql:host=localhost;dbname=libreria','root','',$pdo_options);
			}
			return self::$instance;
		}
	}
?>