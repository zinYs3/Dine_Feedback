<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>impression_request page</title>
    <link rel = "stylesheet" href = '../public/css/style.css'>
</head>
<body>
    <form action  = "impression_request.php" method = "GET">
        <div class = "question_box">
            <p>Q3.感想や要望があればお書きください(２００文字以内)<br></p>
        </div>
        <br>
        <textarea name = "message" cols = "40" rows = "5"></textarea><br><br>
        <br><br>
        <button type = "submit" name = "back">戻る</button>
        <input type = "submit" name = "button" value = "次へ">
    </form>
    <?php
    if(isset($_GET['message'])){
        if($_GET['button'] == '次へ'){
            session_start();
            $_SESSION['message'] = $_GET['message'];

            header('location:confirm_send.php');
            exit();
        }else{
            header('location:add_menu.php');
            exit();
        }
    }
    if(isset($_GET['back'])){
        header('location:add_menu.php');
        exit();
    }
    ?>
</body>
</html>