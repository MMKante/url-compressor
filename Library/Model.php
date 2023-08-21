<?php
	namespace Library;

	abstract class Model {
		private \PDO $dao;
		private ModelManager $manager;

		public function __construct(ModelManager $manager) {
			$this->dao = DBFactory::getPDOMariaDBConnection();
			$this->manager = $manager;
		}
		public function manager() : ModelManager{
			return $this->manager;
		}
		public function dao() : \PDO {
			return $this->dao;
		}
	}