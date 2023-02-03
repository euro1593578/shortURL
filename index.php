<?php
    include 'urlcon/con_db.php';
    $new_url = "";
    if(isset($_GET)){
        foreach($_GET as $key=>$val){
          $u = mysqli_real_escape_string($conn, $key);
          $new_url = str_replace('/', '', $u);
        }
    echo $new_url;
    $sql = mysqli_query($conn , "SELECT common_url FROM url WHERE short_url = '$new_url'");
    if(mysqli_num_rows($sql)>0){
        $sql2 = mysqli_query($conn, "UPDATE url SET clicked_short_url = clicked_short_url + 1 WHERE short_url = '$new_url'");
        if($sql2){
            $common_url = mysqli_fetch_assoc($sql);
            header("Location:".$common_url['common_url']);
          }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Shorten</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <div class="input_url" >
        <div>
            <form action="#" autocomplete="off">
            <label for="">Common URL :</label>
            <input type="text" spellcheck="false" name="common_url" placeholder="Place the URL" required>
            <button>Submit</button>
            </form>
        </div>
    </div>

    <div class="show" style="display: none;">
            This is your Short URL:
            <input type="text" value="">
            <button>Clicked</button>
    </div>

    <table class="table" align="center">
        <thead>
            <td>Short URL</td>
            <td>Common URL</td>
            <td>Clicked</td>
        </thead>
        <tbody>
            <?php $data = "SELECT * FROM url";
                    $query_data = mysqli_query($conn, $data);
            while($row = mysqli_fetch_assoc($query_data)){
            ?>
            
            <tr>
                <td><a href="<?php echo $row['short_url'] ?>" target="_blank">
                  <?php
                      echo "localhost/test/".$row['short_url'];
                  ?>
                  </a></td>
                <td><?php if(strlen($row['common_url']) > 50){
                      echo substr($row['common_url'], 0, 50) . '...';
                    }else{
                      echo $row['common_url'];
                    }
                ?></td>
                <td><?= $row['clicked_short_url']?></td>
            </tr>
            <?php }?>
        </tbody>
    </table>


    <div class="qr_code">
         <form action="#" autocomplete="off">
            <input type="text" name="qr_input" autocomplete="off">
            <button type="submit">Gen a QRcode</button>
        </form>
    </div>
    
    <div class="qr_show" style="display:none;"></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script src="script.js"></script>
</body>
</html>