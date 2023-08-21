<?php
	namespace Library;

	class Route {
		private string $uri;
		private string $module;
		private string $action;
		private string $method;
		private array $varsName = [];

		public function __construct(string $uri, string $module, string $action, string $method, array $varsName = []) {
			$this->uri = $uri;
			$this->module = $module;
			$this->action = $action;
			$this->method = $method;
			$this->varsName = $varsName;
		}

		public function uri() : string {
			return $this->uri;
		}

		public function module() : string {
			return $this->module;
		}

		public function action() : string {
			return $this->action;
		}

		public function method() : string {
			return $this->method;
		}
		public function varsName() : array {
			return $this->varsName;
		}
	}