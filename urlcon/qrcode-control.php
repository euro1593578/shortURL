<?php include "con_db.php";

$qr_input = mysqli_real_escape_string($conn, $_POST['qr_input']);
$last5_input_qr = substr($qr_input, -5);

    $sql = mysqli_query($conn, "SELECT * FROM url WHERE short_url = '{$last5_input_qr}'");

    if(mysqli_num_rows($sql) > 0){
        $sql2 = mysqli_query($conn, "SELECT common_url FROM url WHERE short_url = '{$last5_input_qr}'");
        $res = mysqli_fetch_assoc($sql2);
        echo $res['common_url'];
    }else{
        echo $qr_input;
    }
?>