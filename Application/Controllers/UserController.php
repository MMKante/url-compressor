<?php
	namespace Application\Controllers;

	use Application\Models\UserModel;

	class UserController extends \Library\Controller {
		public function index() {
			$this->httpResponse()->send('login', 'index.user', [
				'session' => $this->session()
			]);
		}
		public function login() {
			$userID = $this->manager()->get(UserModel::class)->login(
				$this->httpRequest()->post('username'),
				$this->httpRequest()->post('password')
			);

			if (is_int($userID)) {
				$this->session()->setAuthenticated(true);
				$this->session()->set('id', $userID);
			} else {
				$this->session()->setFlash('Username or password invalid!');
			}
			$this->httpResponse()->redirect('/');
		}
		public function logout() {
			$this->session()->setAuthenticated(false);
			$this->httpResponse()->redirect('/');
		}
		public function signup() {
			if ($this->httpRequest()->method() === 'POST') {
				if ($this->httpRequest()->post('password') !== $this->httpRequest()->post('password-conf')) {
					$this->session()->setFlash('Password and confirmation password are incorrect!');
					$this->httpResponse()->redirect('/signup');
				}
				$userID = $this->manager()->get(UserModel::class)->add(
					$this->httpRequest()->post('username'),
					$this->httpRequest()->post('password')
				);
				$this->session()->set('id', $userID);
				$this->session()->setAuthenticated(true);
				$this->httpResponse()->redirect('/');
			}
			$this->httpResponse()->send('login', 'signup.user', [
				'session' => $this->session()
			]);
		}
	}