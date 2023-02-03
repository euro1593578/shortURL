<?php
    include "con_db.php";
    $common_url = mysqli_real_escape_string($conn, $_POST['common_url']);
    if(!empty($common_url) && filter_var($common_url, FILTER_VALIDATE_URL)){
        $ran_url = substr(md5(microtime()), rand(0, 26), 5);
        $sql = mysqli_query($conn, "SELECT * FROM url WHERE common_url = '{$common_url}'");
        if(mysqli_num_rows($sql) > 0){
            $re = mysqli_fetch_assoc($sql);
            echo $re['short_url'];
        }else{
            $sql2 = mysqli_query($conn, "INSERT INTO url (common_url, short_url, clicked_short_url) 
                                         VALUES ('{$common_url}', '{$ran_url}', '0')");
            if($sql2){
                $sql3 = mysqli_query($conn, "SELECT short_url FROM url WHERE short_url = '{$ran_url}'");
                if(mysqli_num_rows($sql3) > 0){
                    $short_url = mysqli_fetch_assoc($sql3);
                    echo $short_url['short_url'];
                }
            }
        }
    }else{
        echo "$common_url - This is not a valid URL!";
    }
?>