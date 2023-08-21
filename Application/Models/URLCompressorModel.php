<?php
	namespace Application\Models;

	class URLCompressorModel extends \Library\Model {
		public function compress(string $url) : string {
			return hash('crc32', $url, false);
		}
		public function list() {
			$user = $_SESSION['id'];
			return $this->dao()->query("SELECT * FROM tblurl WHERE id_user=$user")->fetchAll(\PDO::FETCH_CLASS, '\Application\Entities\URL');
		}
		public function add(string $url) : string {
			$compressed_url = $this->compress($url);

			$query = $this->dao()->prepare('INSERT INTO tblurl (url, compressed_url, id_user) VALUES (:url, :compressed_url, :user)');
			$query->bindValue(':url', $url, \PDO::PARAM_STR);
			$query->bindValue(':compressed_url', $compressed_url, \PDO::PARAM_STR);
			$query->bindValue(':user', $_SESSION['id'], \PDO::PARAM_STR);
			$query->execute();

			return $compressed_url;
		}
		public function getByCode(string $compressed_url) {
			$query = $this->dao()->prepare('SELECT * FROM tblurl WHERE compressed_url=:compressed_url');
			$query->bindValue(':compressed_url', $compressed_url, \PDO::PARAM_STR);
			$query->execute();
			return $query->fetchObject('\Application\Entities\URL');
		}
		public function delete(int $id) {
			$query = $this->dao()->prepare('DELETE FROM tblurl WHERE id=:id');
			$query->bindValue(':id', $id, \PDO::PARAM_STR);
			$query->execute();
		}
	}