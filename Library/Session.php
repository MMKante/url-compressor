<?php

	namespace Library;

	session_start();

	class Session {
		private bool $authenticated;

		public function __construct() {
			if (!isset($_SESSION['authenticated'])) {
				$_SESSION['authenticated'] = false;
			}
			$this->authenticated = $_SESSION['authenticated'];
		}
		public function isAuthenticated() : bool {
			return $this->authenticated;
		}
		public function setAuthenticated(bool $authenticated) : void {
			$this->authenticated = $authenticated;
			$this->set('authenticated', $authenticated);
		}
		public function get(string $key) {
			return isset($_SESSION[$key]) ? $_SESSION[$key] : null ;
		}
		public function set(string $key, $value) : void {
			$_SESSION[$key] = $value;
		}
		public function setFlash(string $message) : void {
			$_SESSION['flash'] = $message;
		}
		public function getFlash() : string {
			$flash = $_SESSION['flash'];
			unset($_SESSION['flash']);
			return $flash;
		}
		public function hasFlash() : bool {
			return isset($_SESSION['flash']);
		}
	}