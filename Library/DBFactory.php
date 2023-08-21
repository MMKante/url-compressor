<?php
	namespace Library;

	class DBFactory {
		public static function getPDOMariaDBConnection() : \PDO {
			$db = new \PDO('mysql:host=localhost;dbname=url_compressor;charset=utf8','root','');
			$db->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);

			return $db;
		}
	}