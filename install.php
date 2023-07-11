<?

/* ==============================================================

Этот файл является частью программы "Landing Admin"
Лицензия: MIT
Разработчик: Сергей Чиж (https://sergeychizh.tech/)
Страница скачивания: https://sergeychizh.tech/landing-admin
Документация: https://sergeychizh.tech/landing-admin/docs

============================================================== */

	$httpi = 'http' . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 's' : '') . '://';
	$url = $httpi . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];

		$urlo = explode('/', $url);

			$urlr = array();

		for($n=0;$n<(count($urlo)-1);$n++){

			$urlr[] = $urlo[$n];

		}

	$url = implode('/', $urlr) . '/install.php';

	$adminAdres = implode('/', $urlr);

	DEFINE('URL', $url);

	DEFINE('ROOT', realpath(dirname(__FILE__)));


			$err=array();

    if(!empty($_POST['adminemail'])){


		  if(empty($_POST['adminemail'])){
		  	$err[] = "Введите E-mail администратора";
		  }

		  if(!filter_var($_POST['adminemail'], FILTER_VALIDATE_EMAIL)){
		   	 $err[] = "E-mail введен некорректно";
		  }

		  if(!empty($_POST['password'])){

			  if($_POST['password'] != $_POST['password2']){
			  	$err[] = "Пароли не совпадают";
			  }

		  }


		    if($_POST['checkbox']!==1){

                $err[] = "Вы не приняли условий лицензионного соглашения";

            }

		  if(count($err)==0){

			  	$sfile = "<?\n";
			  	$sfile .= "\$adminAdres=\"".$adminAdres."\";\n";

				  	if(!empty($_POST['password']) && $_POST['password'] == $_POST['password2']){
				  	$sfile .= "\$adminPassword=\"".md5($_POST['password'])."\";\n";
					}else{
				  	$sfile .= "\$adminPassword=\"".$adminPassword."\";\n";
					}

				$sfile .= "\$adminEmail=\"".$_POST['adminemail']."\";\n";
                $sfile .= "\$db = false;\n";
				$sfile .= "?>";

			    	$fp = fopen(ROOT.'/config.php', "w+");
			        fputs($fp, $sfile);
			        fclose($fp);

				unlink(ROOT.'/install.php');

				header('location: '.$adminadres.'/admin.php');

			exit;
		  }

    }

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Установка | Fresh Admin</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?print $adminAdres;?>/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?print $adminAdres;?>/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?print $adminAdres;?>/assets/libs/css/style.css">
    <link rel="stylesheet" href="<?print $adminAdres;?>/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	<style>body{font-family: 'Roboto', sans-serif;}</style>
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>
<!-- ============================================================== -->
<!-- install form  -->
<!-- ============================================================== -->
<body>
    <!-- ============================================================== -->
    <!-- install form  -->
    <!-- ============================================================== -->
    <form action="<?=URL?>" method="post" class="splash-container">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-1">Установка Landing Admin</h3>
                <p>Пожалуйста, введите информацию для начала установки</p>
            </div>
            <div class="card-body">
<?
	if(count($err)>0){
?>

   <div id="result">
       <div class="alert alert-danger" role="alert">
       Ошибка!<br>
       <?

       print implode("<br>", $err);

       ?><br>
       </div>
   </div>

<?
	}

?>

                <div class="form-group">
                    <input class="form-control form-control-lg" type="email" name="adminemail" required="" placeholder="E-mail администратора" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" name="password" id="pass1" type="password" required="" placeholder="Пароль администратора">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" name="password2" id="pass2" type="password" required="" placeholder="Повторите пароль">
                </div>
                <div class="form-group">
                <iframe style="width: 100%; height: 350px; border: 0px;" src="license.txt"></iframe><br>

                <input type="checkbox" name="license" value="1"> - Я прочитал(а) и соглашаюсь с условиями лицензионного соглашения
                </div>                
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Продолжить</button>
                </div>
            </div>
            <div class="card-footer bg-white">
                <a href="https://sergeychizh.tech/landing-admin/docs" class="text-secondary">Документация</a> | <a href="https://sergeychizh.tech/#contact" class="text-secondary">Поддержка</a>
            </div>
        </div>
    </form>
</body>


</html>