<?php
	namespace Library;

	class Page {
		protected string $view = '';
		protected string $template = '';
		protected array $data = [];

		public function __construct() {
			
		}
		public function view() : string {
			return $this->view;
		}
		public function template() : string {
			return $this->template;
		}
		public function data() : array {
			return $this->data;
		}
		public function setView(string $view) {
			$this->view = __DIR__ . "/../Application/Views/$view.php";
		}
		public function setTemplate(string $template) {
			$this->template = __DIR__ . "/../Application/Views/Templates/$template.php";
		}
		public function setData(array $data) {
			$this->data = $data;
		}
		public function getGeneratedPage() : string {
			extract($this->data);

			ob_start();
			require __DIR__ . '/../Application/Views/Templates/header.php';
			$header = ob_get_clean();

			ob_start();
			require ($this->view());
			$content = ob_get_clean();

			ob_start();
			require ($this->template());
			return ob_get_clean();
		}
	}