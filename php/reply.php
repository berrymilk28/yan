<!DOCTYPE html>
<html lang = "ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log管理</title>
    <link rel="stylesheet" href="./reply_stylesheet.css">
    <link rel="stylesheet" href="./reply_responsive.css">
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

      <h1>頂いた感想とその返信</h1>

      <?php
        define('message', './message.txt');
        $message_array = array();

        if($file_handle = fopen('message', "r")) {

            while($data = fgets($file_handle)) {
                $split_data = preg_split( '/\'/', $data);
                $message = array(
                    'name' => $split_data[1],
                    'message' => $split_data[3],
                    'post_date' => $split_data[5]
                );
                array_unshift($message_array, $message);
            }
            fclose( $file_handle);
        }		
        ?>

        <?php foreach( $message_array as $value ): ?>
            <div class="message_contents">
                <div class="message_content">
                    <h2><?php echo $value['name']; ?></h2>
                    <time><?php echo date('Y年m月d日 H:i', strtotime($value['post_date'])); ?></time>
                    <p><?php echo $value['message']; ?></p>
                </div>



            </div>
        <?php endforeach; ?>


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