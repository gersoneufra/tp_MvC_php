<?php
	// Define path constants
	// echo $_SERVER['SCRIPT_NAME'];
	// echo "</br>";
	// 	echo $_SERVER['SCRIPT_FILENAME'];
  define("DS", DIRECTORY_SEPARATOR);

  define("ROOT", substr(getcwd(), 0, -6));
  define("APP_PATH", ROOT . 'app' . DS);
  
  define("BASE_PATH", ROOT . "base" . DS);
  
  define("PUBLIC_PATH", ROOT . "public" . DS);
  define("CONFIG_PATH", APP_PATH . "config" . DS);

  define("CONTROLLER_PATH", APP_PATH . "controllers" . DS);
  define("MODEL_PATH", APP_PATH . "models" . DS);
  define("VIEW_PATH", APP_PATH . "views" . DS);
  
  define("HELPER_PATH", APP_PATH . "helpers" . DS);
  
	require(BASE_PATH . 'router.php');
	require(BASE_PATH . 'request.php');
	require(BASE_PATH . 'dispatch.php');
	require(BASE_PATH . 'base_controller.php');
	require(BASE_PATH . 'base_model.php');

	foreach (glob(MODEL_PATH . '*.php') as $path) {
		require_once $path;
	}

	$dispatch = new Dispatch();
	$dispatch->run();