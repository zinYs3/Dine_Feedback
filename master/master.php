<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>master page</title>
    <link rel = "stylesheet" href = "../public/css/style.css">
</head>
<body>
    <div class = "master_title"><p>管理者画面へようこそ</p></div>
    <div class = "to_master_text">
        <p>ここではユーザーを新たにデータベースへ追加したり、ユーザーの情報を見ることができます</p>
    </div>
    <form action = "master.php" method = "GET">
    <button type = "submit" name = "back">戻る</button>
    <button type = "submit" name = "add_user">ユーザーを新規登録</button>
    <button type = "submit" name = "look_data">データ一覧</button>
    </form>
</body>
</html>


<?php

if(isset($_GET['back'])){
    header('location:../login/login_page.php');
    exit();
}else if(isset($_GET['add_user'])){
    header('location:add_user.php');
    exit();
}else if(isset($_GET['look_data'])){
    header('location:look_data.php');
    exit();
}
?>