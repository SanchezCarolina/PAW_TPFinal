<?php

	class Database{
        
		private static $instance=NULL;
		private function __construct(){}
		private function __clone(){}
		
		public static function connect(){
			if (!isset(self::$instance)) {
				$opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
				self::$instance= new PDO('mysql:host=localhost;dbname=libreria','root','',$opciones);
			}
			return self::$instance;
		}
	}
?>