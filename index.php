<?

error_reporting(0);


/* ==============================================================

Этот файл является частью программы "Landing Admin"
Лицензия: MIT
Разработчик: Сергей Чиж (https://sergeychizh.tech/)
Страница скачивания: https://sergeychizh.tech/landing-admin
Документация: https://sergeychizh.tech/landing-admin/docs

============================================================== */

	session_start();

	DEFINE('ROOT', realpath(dirname(__FILE__)));

	if(!file_exists(ROOT.'/config.php')){require_once(ROOT.'/install.php');exit;}

	require_once(ROOT.'/config.php');


	header("Location: ".$adminAdres."/admin.php");

?>