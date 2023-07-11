<?

/* ==============================================================

Этот файл является частью программы "Landing Admin"
Лицензия: MIT
Разработчик: Сергей Чиж (https://sergeychizh.tech/)
Страница скачивания: https://sergeychizh.tech/landing-admin
Документация: https://sergeychizh.tech/landing-admin/docs

============================================================== */

	$showDataFiles = array();

	function showDataFiles ($directory)
	{
	    global $showDataFiles;

		$dir = opendir($directory);

		while(($file = readdir($dir)))
		{
			if ( is_file ($directory."/".$file))
			{

				$showDataFiles[] = $directory."/".$file;

			}
			else if ( is_dir ($directory."/".$file) && ($file != ".") && ($file != ".."))
			{

				showDataFiles ($directory."/".$file);

			}

		}

	closedir ($dir);

	}

	function sluggify($url)
	{
	    # Prep string with some basic normalization
	    $url = strtolower($url);
	    $url = strip_tags($url);
	    $url = stripslashes($url);
	    $url = html_entity_decode($url);

	    # Remove quotes (can't, etc.)
	    $url = str_replace('\'', '', $url);

	    # Replace non-alpha numeric with hyphens
	    $match = '/[^a-z0-9]+/';
	    $replace = '-';
	    $url = preg_replace($match, $replace, $url);

	    $url = trim($url, '-');

	    return $url;
	}

	function translit($string) {
	    $converter = array(
	        'а' => 'a',   'б' => 'b',   'в' => 'v',
	        'г' => 'g',   'д' => 'd',   'е' => 'e',
	        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
	        'и' => 'i',   'й' => 'y',   'к' => 'k',
	        'л' => 'l',   'м' => 'm',   'н' => 'n',
	        'о' => 'o',   'п' => 'p',   'р' => 'r',
	        'с' => 's',   'т' => 't',   'у' => 'u',
	        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
	        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
	        'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
	        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

	        'А' => 'A',   'Б' => 'B',   'В' => 'V',
	        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
	        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
	        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
	        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
	        'О' => 'O',   'П' => 'P',   'Р' => 'R',
	        'С' => 'S',   'Т' => 'T',   'У' => 'U',
	        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
	        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
	        'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
	        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
	    );
	    return strtr($string, $converter);
	}

	  function editorSelectFiles ($directory)
	  {
	  	  global $editorfile;

	  $dir = opendir($directory);
	  while(($file = readdir($dir)))
	  {
		    if ( is_file ($directory."/".$file))
		    {

	        	if(getExtension($file)=="htm" || getExtension($file)=="html"){

                   print "<option value='".base64_encode($directory."/".$file)."'";
                         if($editorfile==base64_encode($directory."/".$file)){print " selected";}
                   print">".$directory."/".$file."</option>";

	        	}

		    }
		    else if ( is_dir ($directory."/".$file) &&
		             ($file != ".") && ($file != ".."))
		    {
		      	editorSelectFiles ($directory."/".$file);
		    }
	  }
	  closedir ($dir);
	  }

	function getExtension($filename) {
	  return preg_replace('/^.*\.(.*)$/U', '$1', $filename);
	}

?>