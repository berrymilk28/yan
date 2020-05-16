<!DOCTYPE html>
<html lang = "ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log管理</title>
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
    <header>
        <div class ="header-logo">
            <img src="../logo/3_White_logo_on_color1_233x69.png" alt="样">
        </div>
        <span class="fa fa-bars menu-icon"></span>
        <div class = "header-list">
            <ul>
            <a href="../main/top.php"><li>トップページ</li></a>
             <li>ログ追加</li>
             <li>感想返信</li>
            <li>お問い合わせ</li>
            </ul>
              <div class="header-right">
                 <a class="login" href="#">管理者ログイン</a>
              </div>
        </div>
        <div class="clear"></div>
    </header>


    <div class = "main">
      <div class="thanks-message">感想を送っていただきありがとうございます！</div>
        <div class="display-contact">

          <div class="form-title">入力内容</div>

          <div class="form-item">■ 送信者名</div>
            <?php
          echo $_POST['name'];
          ?>
          <div class="form-item"><br>■ 内容</div>
            <?php
          echo $_POST['body'];
          ?>
        </div>
        <a href="../main/top.php"><div class ="top-back">
            トップページへ戻る
        </div></a>
        <a href="#"><div class ="reply-back">
            感想への過去の返信を見る
        </div></a>

        <?php
            define('message', './message.txt');
            date_default_timezone_set('Asia/Tokyo');

            if($file_handle = fopen('message', "a")){

                $now_date = date("Y-m-d H:i");
                $clean['name'] = htmlspecialchars( $_POST['name'], ENT_QUOTES);
                $clean['name'] = preg_replace( '/\\r\\n|\\n|\\r/', '', $clean['name']);
                $clean['body'] = htmlspecialchars( $_POST['body'], ENT_QUOTES);
                $clean['body'] = preg_replace( '/\\r\\n|\\n|\\r/', '<br>', $clean['body']);
                $data = "'".$clean['name']."','".$clean['body']."','".$now_date."'\n";
                
                fwrite($file_handle, $data);

                fclose($file_handle);
            }
        ?>

    </div>



    <div class = "footer">
        <div class ="footer-logo">
            <img src="../logo/5_White_logo_on_black_233x69.png" alt="样">
        </div>
        <div class ="footer-list">
            <ul>
                <li>組織概要</li>
                <li>感想箱</li>
                <li>お問い合わせ</li>
            </ul>
        </div>

    </div>
    <div class="clear"></div>
    
</body>
</html>