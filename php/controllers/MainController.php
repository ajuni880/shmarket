<?php

	require_once "UserController.class.php";
	require_once "CategoryController.class.php";
	require_once "AnnounceController.class.php";


	function is_session_started(){
		if ( php_sapi_name() !== 'cli' ) {
			if ( version_compare(phpversion(), '5.4.0', '>=') ) {
				return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
			} else {
				return session_id() === '' ? FALSE : TRUE;
			}
		}
		return false;
	}

	if (is_session_started() === false ) session_start();

	$response = array();
	if ( isset($_REQUEST['controllerType']) ){
		$action = (int) $_REQUEST['controllerType'];

		switch ($action){

			case 0:
				$userController = new UserController($_REQUEST['action'], $_REQUEST['data'] );
				$response = $userController->doAction();
				break;

			case 1:
					$announceController = new AnnounceController($_REQUEST['action'], $_REQUEST['data'] );
					$response = $announceController->doAction();
					break;

			case 2:
					$categoryController = new CategoryController($_REQUEST['action'], $_REQUEST['data'] );
					$response = $categoryController->doAction();
					break;

			default:
				$errors = array();
				$response[0]=false;
				$errors[]="Sorry, there has been an error. Try later";
				$response[]=$errors;
				error_log("MainControllerClass: action not correct, value: ".$_REQUEST['controllerType']);
				break;
		}

	} else {

		$errors = array();
		$response[0]=false;
		$errors[]="Sorry, there has been an error. Try later";
		error_log("MainControllerClass: action does not exist");
		$response[]=$errors;

	}

	    // (gettype($response));
	echo json_encode($response);
	// var_dump(json_last_error());
	// $error = json_last_error();

?>
