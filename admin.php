<?

error_reporting(0);


/* ==============================================================

Этот файл является частью программы "Landing Admin"
Лицензия: MIT
Разработчик: Сергей Чиж (https://sergeychizh.tech/)
Страница скачивания: https://sergeychizh.tech/landing-admin
Документация: https://sergeychizh.tech/landing-admin/docs

============================================================== */

	header('Content-Type: text/html; charset=utf-8');

	session_start();

	DEFINE('ROOT', realpath(dirname(__FILE__)));


	DEFINE('CURRENT_VERSION', 1.0);
	DEFINE('TEXT_VERSION', '1.0 beta');

	if(!file_exists(ROOT.'/config.php')){require_once(ROOT.'/install.php');exit;}

	require_once(ROOT.'/config.php');

	if($db){
		require_once(ROOT.'/dbconnect.php');
	}

	require_once(ROOT.'/functions.php');

	if($_GET['act']=="exit"){
		unset($_SESSION['login']);
		session_destroy();
		header("location: ".$adminAdres."/admin.php");
		exit;
	}

	if($_GET['act']=="restore"){
		require_once(ROOT.'/templates/restore.php');
		exit;
	}

    if($_SESSION['login'] != "yes"){

		require_once(ROOT.'/templates/login.php');

		exit();

    }else{

		require_once(ROOT.'/templates/header.php');

		require_once(ROOT.'/templates/admin.php');

		require_once(ROOT.'/templates/footer.php');


    }

	if($db){
		mysqli_close($link);
	}

?>