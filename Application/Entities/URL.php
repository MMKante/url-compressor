<?php
	namespace Application\Entities;

	class URL extends \Library\Entity {
		private int $id;
		private string $url;
		private string $compressed_url;
		private int $id_user;

		public function id() : int {
			return $this->id;
		}
		public function url() : string {
			return $this->url;
		}
		public function compressed_url() : string {
			return $_SERVER['HTTP_HOST'] . '/r/' . $this->compressed_url;
		}
		public function id_user() : int {
			return $this->id_user;
		}
		public function setId(int $id) : void {
			$this->id = $id;
		}
		public function setUrl(string $url) : void {
			$this->url = $url;
		}
		public function setCompressed_url(string $compressed_url) : void {
			$this->compressed_url = $compressed_url;
		}
		public function setIduser(int $id_user) : void {
			$this->id_user = $id_user;
		}

	}