<?php
session_start();
$name = $_SESSION["name"];
$mail = $_SESSION["mail"];
$subject = $_SESSION["subject"];
$comment = $_SESSION["comment"];


mb_language("ja");
mb_internal_encoding("utf-8");

$contents = "お問い合わせ有難うございました(自動受付メール)";

$body = $name."様\n\n以下の内容でお問い合わせを受付しました。\n1日以内を目処にお問い合わせ頂いた内容に対してご連絡いたしますので、\n今しばらくお待ちください。\n\n--------------------------------\nお名前：".$name."\nメールアドレス：".$mail."\n件名：".$subject."\n問い合わせ内容：".$comment."\n--------------------------------\n\n俊熊-shunKUMA-";

$from="俊熊-shunKUMA-(kumachan4874@gmail.com)";
$fromEmail= "kumachan4874@gmail.com";
$fromName = "俊熊-shunKUMA-";

$header ='';
$header .= "Content-Type: text/plain \r\n";
$header .= "Return-Path: " .$fromEmail."\r\n";
$header .= "From: " .$fromName." \r\n";
$header .= "Sender: " .$from." \r\n";
$header .= "Reply-To: ".$fromEmail."\r\n";
$header .= "Organization: ".$fromName."\r\n";
$header .= "X-Sender: ".$fromEmail."\r\n";
$header .= "X-Priority: 3 \r\n";
//"From:".$fromEmail."\r\nReturn-Path: ".$fromEmail."\r\n";


$success = mb_send_mail($mail,$contents,$body,$header,"-f".$mail);


$contents２ = $name."さんからお問い合わせがありました";

$body2 = "以下の内容のお問い合わせを受信しました。\n\n--------------------------------\nお名前：".$name."\nメールアドレス：".$mail."\n件名：".$subject."\n問い合わせ内容：".$comment."\n--------------------------------\n\n";


$header2 = '';
$header2 .= "Content-Type: text/plain\r\n";
$header2 .= "Return-Path: ".$mail."\r\n";
$header2 .= "From: ".$name."\r\n";
$header2 .= "Sender: ".$name."\r\n";
$header2 .= "Reply-To: ".$mail."\r\n";
$header2 .= "Organization: ".$name."\r\n";
$header2 .= "X-Sender: ".$mail."\r\n";
$header2 .= "X-Priority: 3 \r\n";
// "From:".$mail."\r\nReturn-Path: ".$mail."\r\n";
$success2 = mb_send_mail($fromEmail,$contents2,$body2,$header2,"-f".$fromEmail);


if($success && $success2){
    $text = "<p>送信が完了しました。<br>入力いただいたメールアドレスに自動受付メールをお送りしております。<br>回答まで今しばらくお待ちください。</p>";
}else{
    $text = "<p>送信が失敗しました。<br>お手数ですが時間をおいて再度フォームを送信していただくか、直接ご連絡ください。<br>".$fromEmail."</p>";
}
session_destroy();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.min.css">
    <title>送信結果</title>
</head>
<body class="thanks">
    
    <div class="logo_2">
        <img src="../imgs/shunKUMA_logo.png" alt="logo">
    </div>

    <h1>送信結果</h1>
        <p>
        <?php echo $text?>
        </p>
        <a href="https://portfolio.kumachan4874.com/">
            <button type="button">ホームに戻る</button>
        </a>
</body>
</html>