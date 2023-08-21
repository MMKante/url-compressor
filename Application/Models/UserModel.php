<?php
	namespace Application\Models;

	class UserModel extends \Library\Model {
		public function login(string $username, string $password) : ?int {
			$query = $this->dao()->prepare('SELECT id FROM tbluser WHERE username=:username AND password=:password');
			$query->bindValue(':username', $username, \PDO::PARAM_STR);
			$query->bindValue(':password', hash('sha512', $password), \PDO::PARAM_STR);
			$query->execute();
			$result = $query->fetch();
			return (!empty($result)) ? $result['id'] : null;
		}
		public function add(string $username, string $password) : int {
			$query = $this->dao()->prepare('INSERT INTO tbluser (username, password) VALUES (:username, :password)');
			$query->bindValue(':username', $username, \PDO::PARAM_STR);
			$query->bindValue(':password', hash('sha512', $password), \PDO::PARAM_STR);
			$query->execute();
			return $this->dao()->lastInsertId();
		}
	}