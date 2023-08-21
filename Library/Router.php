<?php
	namespace Library;

	class Router {
	private $routes = [];

	public function __construct(string $xmlFilePath) {
		$this->loadRoutesFromXML($xmlFilePath);
	}

	private function loadRoutesFromXML($xmlFilePath) {
		if (!file_exists($xmlFilePath)) {
			throw new Exception('XML file not found: ' . $xmlFilePath);
		}
		
		$xml = simplexml_load_file($xmlFilePath);

		foreach ($xml->route as $routeNode) {
			$url = $routeNode['url'];
			$module = $routeNode['module'];
			$action = $routeNode['action'];
			$method = $routeNode['method'];
			if (!empty($routeNode['vars'])) {
				$varsName = explode(',', $routeNode['vars']);
			} else {
				$varsName = [];
			}

			$this->routes[] = new Route($url, $module, $action, $method, $varsName);
		}
	}
	public function matchRoute($uri, $method) : ?Route {
		foreach ($this->routes as $route) {
			if (preg_match('`^'.$route->uri().'$`', $uri, $matches) && $route->method() === $method) {
				array_shift($matches);

				if (count($matches) > 0) {
					$varsName = $route->varsName();
					foreach ($varsName as $key => $varName) {
						$_GET[$varName] = $matches[$key];
					}
				}

				return $route;
			}
		}


		return null;
	}
}