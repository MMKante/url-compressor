<?php
	namespace Library;

	class Application {
		private HTTPRequest $request;
		private HTTPResponse $response;
		private Session $session;

		public function __construct() {
			$this->request = new HTTPRequest();
			$this->response = new HTTPResponse();
			$this->session = new Session();
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
		public function run() : void {
			if ($this->session()->isAuthenticated() || $this->httpRequest()->uri() === '/signup' || $this->httpRequest()->uri() === '/login' || preg_match('`^/r/([A-Za-z0-9]+)$`', $this->httpRequest()->uri())) {
				$router = new Router(__DIR__ . '/../Application/Config/routes.xml');

				$route = $router->matchRoute(
					$this->httpRequest()->uri(),
					$this->httpRequest()->method()
				);

				if ($route === null) {
					$this->httpResponse()->redirect404();
				} else {

					$controller = $this->getController($route);
				}
			} else {
				$controller = new \Application\Controllers\UserController(
					new Route('', 'User', 'index', 'GET'),
					$this->httpRequest(),
					$this->httpResponse(),
					$this->session()
				);
			}
			$controller->execute();
		}
		public function getController(Route $route) : ?Controller {
			$controllerPath = __DIR__ . '/../Application/Controllers/'.$route->module().'Controller.php';
			if (!file_exists($controllerPath)) {
				return null;
			}
			
			$controller = '\\Application\\Controllers\\'.$route->module().'Controller';

			return new $controller(
				$route,
				$this->httpRequest(),
				$this->httpResponse(),
				$this->session()
			);
		}
	}