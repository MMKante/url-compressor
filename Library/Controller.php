<?php
	namespace Library;

	abstract class Controller {
		private Route $route;
		private HTTPRequest $request;
		private HTTPResponse $response;
		private Session $session;
		private ModelManager $manager;

		public function __construct(
			Route $route,
			HTTPRequest $request,
			HTTPResponse $response,
			Session $session
		) {
			$this->manager = new ModelManager();
			$this->route = $route;
			$this->request = $request;
			$this->response = $response;
			$this->session = $session;
		}
		public function httpRequest() : HTTPRequest {
			return $this->request;
		}
		public function httpResponse() : HTTPResponse {
			return $this->response;
		}
		public function session() : Session {
			return $this->session;
		}
		public function route() : Route {
			return $this->route;
		}
		public function manager() : ModelManager {
			return $this->manager;
		}
		public function execute() {
			$action = $this->route()->action();
			$this->$action();
		}
	}