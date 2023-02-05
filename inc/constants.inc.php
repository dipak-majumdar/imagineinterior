<?php 
	
	if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
		$url = "https://";
	}else{
		$url = "http://";   
		// Append the host(domain name, ip) to the URL.       
	}  

	// Append the requested resource location to the URL   
	// $url.= $_SERVER['REQUEST_URI'];    
 
	// echo $url;  


	//company
	define('SITE_NAME', 		'imagine Interior');							//company short name
	// define('COMPANY_H', 		"Website ".HOME);								//company home
	// define('COMPANY_A', 		"Admin ".HOME);									//admin home
	// define('BLOG_ADMIN', 		"Blog Admin");									//admin home
    
    //website related
	define('URL', 				$url.$_SERVER['HTTP_HOST'].'/imagine-interior/');				
	define('URL_LOCAL', 		"http://localhost/imagine-interior/");
	// define('PAGE',				$_SERVER['PHP_SELF']);
	// define('ADM_PATH',  		URL.'admin/');		
	// define('LOCALPATH',  		'marketing/leelija/');
	
	define('SITE_EMAIL', 		"imagineinterior@gmail.com");	//
	
	define('CURRENCY',			'$');
	define('START_YEAR',		'2022');
	define('END_YEAR',  		date('Y') + 2); 
	define('HOME',				'Home');
	
	// define('SITE_BILLING_EMAIL', "invoice@imagineinterior.com");	//
	// define('SITE_BILLING_NAME',  "Imagine Interior");
		
	
	define("ABSPATH",			$_SERVER['DOCUMENT_ROOT'].'/imagine-interior/');		//location of the logo
	
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
	define('NRSPAN',  			"<span class='blackLarge'>");					//normal span
	define('ERSPAN',  			"<span class='orangeLetter'>");					//error span start
	define('SUSPAN',  			"<span class='greenLetter'>");					//success span start
	define('ENDSPAN', 			"</span>");										//end of span
	define('ER', 				'Error: ');
	define('SU', 				'Success !!! ');
	
?>