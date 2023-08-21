<?php
	namespace Library;

	abstract class Entity implements \ArrayAccess {
		use Hydratable;

		public function __construct(array $data = []) {
			$this->hydrate($data);
		}
		public function offsetGet($var) : bool {
			if (isset($this->$var) && is_callable([$this, $var])) {
				return $this->$var();
			}
		}
		public function offsetSet($var, $value) : void {
			$method = 'set'.ucfirst($var);
			if (isset($this->$var) && is_callable([$this, $method])) {
				$this->$method($value);
			}
		}
		public function offsetExists($var) : bool {
			return isset($this->$var) && is_callable([$this, $var]);
		}
		public function offsetUnset($var) : void {
			throw new \Exception('Impossible de supprimer une quelconque valeur');
		}
	}