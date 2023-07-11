<?

if($db){

    $user="root";
    $password="";
    $database="";
    $host="localhost";


    $link = mysqli_connect($host, $user, $password, $database);

    if (!$link) {
        die('Connection error: (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
    }

    if (!mysqli_set_charset($link, "utf8")) {
        printf("Error loading character set utf8: %s\n", mysqli_error($link));
        exit();
    }

}


?>