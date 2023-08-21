<?php
	namespace Library;

	class HTTPResponse {
		private Page $page;

		public function __construct() {
			$this->page = new Page();
		}
		public function page() : Page {
			return $this->page;
		}
		public function addHeader($header) : void {
			header($header);
		}
		public function redirect(string $location) : void {
			header('Location: '.$location);
		}
		public function redirect404() : void {
			$this->addHeader('HTTP/1.0 404 Not Found');
			$this->send('error', 'error404');
		}
		public function send(string $template, string $view, array $data = []) : void {
			$this->page->setTemplate($template);
			$this->page->setView($view);
			$this->page->setData($data);
			$content = $this->page->getGeneratedPage();
			exit($content);
		}
		public function setPage(Page $page) : void {
			$page = $page;
		}
	}