<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>add_menu page</title>
    <link rel = "stylesheet" href = '../public/css/style.css'>
</head>
<body>
    <form action  = "add_menu.php" method = "GET">
        <div class = "question_box">
            <p>Q2.追加してほしいメニューを選んでください<br>※一つのみ選んでください<br></p>
        </div>
        <br>
        <input type = "radio" name = "menu" value = "1">1カレー<br>
        <input type = "radio" name = "menu" value = "2">2メロンパン<br>
        <input type = "radio" name = "menu" value = "2">3うどん<br>
        <input type = "radio" name = "menu" value = "4">4パフェ<br>
        <br><br>
        <button type = "submit" name = "back">戻る</button>
        <input type = "submit" name = "button" value = "次へ">
    </form>
    <?php
    if(isset($_GET['menu'])){
        if($_GET['button'] == '次へ'){
            session_start();
            $_SESSION['menu'] = $_GET['menu'];

            header('location:impression_request.php');
            exit();
        }else{
            header('location:satisfaction.php');
            exit();
        }
    }
    if(isset($_GET['back'])){
        header('location:satisfaction.php');
        exit();
    }
    ?>
</body>
</html>