<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>end use page</title>
    <link rel = "stylesheet" href = "../public/css/style.css">
</head>
<body>
    <div class = "ty_user_text_wrap">
        <h1 class = "ty_user_text">
            ご利用ありがとうございました
        <span class = "ty_user_text-point">Thank you for using</span>
        </h1>
    </div>
    <form action = "end_use.php" method = "GET">
        <button type = "submit" name = "login" class = "to_login_page_button">ログイン画面へ</button>
    </form>
    <?php
    if(isset($_GET['login'])){
        header('location:../login/login_page.php');
        exit();
    }
    ?>
</body>
</html>