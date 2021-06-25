<?php
session_start();

$name2 = htmlspecialchars($_POST["name"], ENT_QUOTES);
$name = mb_convert_kana($name2,"sKV"); 
$comment2 = htmlspecialchars($_POST["comment"], ENT_QUOTES);
$comment = mb_convert_kana($comment2,"sKV"); 

$_SESSION["name"] = $name;
$_SESSION["mail"] = $mail = htmlspecialchars($_POST["mail"], ENT_QUOTES);
$_SESSION["subject"] = $subject = htmlspecialchars($_POST["subject"], ENT_QUOTES);
$_SESSION["comment"] = $comment;

if($name!=''&&$mail!==''&&$subject!==''&&$comment!==''){
    $text= "<p>お問い合わせ内容はこちらで宜しいでしょうか？<br>よろしければ「送信する」ボタンを押して下さい。</p>";
}else{
    $text="<p>下記の入力内容に不備があります。<br>内容をご確認の上、すべての項目をご記入ください。</p>";
}


?>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>お問い合わせフォーム</title>
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../css/style.min.css">
</head>
<body class="confirm_body">
    <div class="logo_2">
        <img src="../imgs/shunKUMA_logo.png" alt="logo">
    </div>
    <div><h1>俊熊-shunKUMA-</h1></div>

    <div class="confirm">
        <form action="confirm" method="post">
            <input type="hidden" name="name" value="<?php echo $name; ?>">
            <input type="hidden" name="mail" value="<?php echo $mail; ?>">
            <input type="hidden" name="subject" value="<?php echo $subject; ?>">
            <input type="hidden" name="comment" value="<?php echo $comment; ?>">
            <h1 class="contact-title">お問い合わせ 内容確認</h1>
            <?php echo $text?>
            <div>
                <div>
                    <label>お名前</label>
                    <p><?php echo $name; ?></p>
                    <?php if($name==''):?>
                    <p class="error">入力されていません</p>
                    <?php endif; ?>
                </div>
                
                <div>
                    <label>メールアドレス</label>
                    <p><?php echo $mail; ?></p>
                    <?php if($mail==''):?>
                    <p class="error">入力されていません</p>
                    <?php endif; ?>
                </div>
                
                <div>
                    <label>件名</label>
                    <p><?php echo $subject; ?></p>
                    <?php if($subject==''):?>
                    <p class="error">入力されていません</p>
                    <?php endif; ?>
                </div>
                <div>
                    <label>お問い合わせ内容</label>
                    <p><?php echo nl2br($comment); ?></p>
                    <?php if($comment==''):?>
                    <p class="error">入力されていません</p>
                    <?php endif; ?>
                </div>
            </div>
            <input type="button" value="内容を修正する" onclick="history.back(-1)">
            <?php if($name!=''&&$mail!==''&&$subject!==''&&$comment!==''): ?>
                <button type="submit" name="submit" onclick="action('/thanks/')"><a href="thanks">送信する</a></button>
            <?php endif;?>
        </form>
    </div>
</body>
</html>