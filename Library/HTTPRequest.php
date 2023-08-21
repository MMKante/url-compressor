<?php
	namespace Library;

	class HTTPRequest {
		public function get($key) : ?string {
			return isset($_GET[$key])? $_GET[$key] : NULL;
		}
		public function post($key) : ?string {
			return isset($_POST[$key])? $_POST[$key] : NULL;
		}
		public function method() : string {
			return $_SERVER['REQUEST_METHOD'];
		}
		public function uri() : string {
			return $_SERVER['REQUEST_URI'];
		}
	}