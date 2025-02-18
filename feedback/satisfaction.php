<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>satisfaction page</title>
    <link rel = "stylesheet" href = '../public/css/style.css'>
</head>
<body>
    <form action  = "satisfaction.php" method = "GET">
        <div class = "question_box">
            <p>Q1.満足度を教えてください<br>※一つのみ選んでください<br></p>
        </div>
        <br>
        <input type = "radio" name = "satisfaction" value = "1">1満足<br>
        <input type = "radio" name = "satisfaction" value = "2">2まあまあ<br>
        <input type = "radio" name = "satisfaction" value = "2">3あまり満足していない<br>
        <input type = "radio" name = "satisfaction" value = "4">4不満<br>
        <br><br>
        <button type = "submit" name = "back">戻る</button>
        <input type = "submit" name = "button" value = "次へ">
    </form>
    <?php
    if(isset($_GET['satisfaction'])){
        if($_GET['button'] == '次へ'){
            session_start();
            $_SESSION['satisfaction'] = $_GET['satisfaction'];

            header('location:add_menu.php');
            exit();
        }else{
            header('location:login/login_page.php');
            exit();
        }
    }
    if(isset($_GET['back'])){
        header('location:login/login_page.php');
        exit();
    }
    ?>
</body>
</html>