<?php
	namespace Library;
	
	class Autoloader {
		public static function register() {
			spl_autoload_register([self::class, 'autoload']);
		}
		public static function autoload($class) {
			$baseDir = '../';
			
			$classFile = $baseDir . str_replace('\\', '/', $class) . '.php';
			
			if (file_exists($classFile)) {
				require $classFile;
			}
		}
	}