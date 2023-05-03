<?php
    session_start();
    if (!empty($_GET['nickname'])){
        $nickname = $_GET['nickname'];
        echo $nickname;
        } 
        else {echo "no nickname was entered";}
    if (!empty($_GET['avatar'])){
            $userAvatar = $_GET['avatar'];
            } 
            else {echo "no avatar was selected";}

    $userScore = 0;
    $cookievalue = [$nickname,$userScore,$userAvatar];
    setcookie("currentUser", '5', time() + (86400*5), "/"); // 86400 = 1 day
    


?>