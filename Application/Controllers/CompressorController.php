<?php
	namespace Application\Controllers;

	use Application\Models\URLCompressorModel;

	class CompressorController extends \Library\Controller {
		public function index() {
			$this->httpResponse()->send('layout', 'index.url', [
				'urls' => $this->manager()->get(URLCompressorModel::class)->list()
			]);
		}
		public function add() {
			if ($this->httpRequest()->method() === 'GET') {
				$this->httpResponse()->send('layout', 'add.url');
			} else if ($this->httpRequest()->method() === 'POST') {
				$compressedURL = $this->manager()->get(URLCompressorModel::class)->add(
					$this->httpRequest()->post('data')
				);

				$this->httpResponse()->send('layout', 'add.url', [
					'result' => $compressedURL
				]);
			}

		}
		public function delete() {
			$this->manager()->get(URLCompressorModel::class)->delete(
				$this->httpRequest()->get('id')
			);
			$this->httpResponse()->redirect('/');
		}
		public function redirect() {
			echo $this->httpRequest()->get('compressed_url');
			$this->httpResponse()->redirect(
				$this->manager()->get(URLCompressorModel::class)->getByCode(
					$this->httpRequest()->get('compressed_url')
				)->url()
			);
		}
	}