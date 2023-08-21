<?php
	namespace Library;

	class ModelManager {
		public function get(string $model) : Model {
			$modelPath = __DIR__ .'/../'. $model . '.php';

			if (!file_exists($modelPath)) {
				throw new \Exception("Model : $model doesn\'t exist!");
			}

			return new $model($this);
		}
	}