<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
	define('TIME', 			 date("Y-m-d H:i:s"));
	
	function is_localhost() {
		// set the array for testing the local environment
		$whitelist = array( '127.0.0.1', '::1' );
		
		// check if the server is in the array
		if ( in_array( $_SERVER['REMOTE_ADDR'], $whitelist ) ) {
			
			// this is a local environment
			return true;
		}
	}

	if (is_localhost())
		define('LOCAL_DIR',			'imagineinterior/');
	else
		define('LOCAL_DIR',			'');

	//URLS Details 
	$protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';



	//company
	define('SITE_NAME', 		'imagine Interior');							//company short name
	// define('COMPANY_H', 		"Website ".HOME);								//company home
    
    //website related
	define('URL', 				$protocol.$_SERVER['HTTP_HOST'].'/'.LOCAL_DIR);				
	define('ADM_URL',  			URL.'admin/');		
	define('PAGE',				$_SERVER['PHP_SELF']);
	
	define('SITE_EMAIL', 		"imagineinterior@gmail.com");	//
	
	define('START_YEAR',		'2022');
	define('END_YEAR',  		date('Y') + 2); 
	
	
	define("ABSPATH",			$_SERVER['DOCUMENT_ROOT'].'/'.LOCAL_DIR);		//location of the logo
	define("ADMPATH",			ABSPATH . 'admin/');							//location of the logo

	define("IMGPATH",			ABSPATH.'images/');									//location of the logo
	define("IMGURL",			URL.'images/');		//location of the logo

	const ACCEPTEXTENSION		= array(".png", ".jpg", ".jpeg", ".gif");
	
	//define company logo
	define("LOGO_PATH",			URL.'images/logo/imagine Interior-logo-2.png');		//location of the logo
	// define("LOGO_WIDTH",		'300');									//width of the logo
	// define("LOGO_HEIGHT",		'50');								//height of the logo 
	// define("LOGO_ALT",			'LeeLija');							//alternate text for the logo
	
	//define company logo
	define("LOGO_ADMIN_PATH",	'images/admin/icon/admin-logo.png');			//location of the logo
	define("LOGO_ADMIN_WIDTH",	'200');											//width of the logo
	define("LOGO_ADMIN_HEIGHT",	'55');											//height of the logo 
	
	define("FAVICON_PATH",		'../images/logo/favicon.png');			//location of the logo
	define("APPL_FAV_PATH",		'../images/logo/apple-touch-icon.png');			//location of the logo


	
	//session constant
	define('ADM_SESS',   		"continuecontent_SESSION_2016ADM_SESS"); 		//admin session var	
	define('USR_SESS',   		"USERcontinuecontent_ecom_SESS2016"); 			//user session var	
	define('STAFF_SESS',   		"SESS_continuecontentMar2016");					//user session var
	
	
	//display style constant
	define('ER', 				'Error: ');
	define('SU', 				'Success !!! ');
	
?>