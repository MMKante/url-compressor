<?php
	require __DIR__ . '/../Library/Autoloader.php';

	\Library\Autoloader::register();

	$app = new \Library\Application();
	$app->run();