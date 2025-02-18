<?php
include_once '../db.php';

session_start();

$input_id = $_SESSION['id'];
$input_pass = $_SESSION['password'];
$input_satisfaction = $_SESSION['satisfaction'];
$input_menu = $_SESSION['menu'];
$input_message = $_SESSION['message'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>confirm and send page</title>
    <link rel = "stylesheet" href = '../public/css/style.css'>
</head>
<body>
    <div class = "question_box">
        <p>Q1.満足度を教えてください<br>※一つのみ選んでください<br></p>
    </div>
    あなたの解答:
    <?php
        echo($input_satisfaction);
    ?>
    <div class = "question_box">
        <p>Q2.追加してほしいメニューを選んでください<br>※一つのみ選んでください<br></p>
    </div>
    あなたの解答:
    <?php
        echo($input_menu);
    ?>
    <div class = "question_box">
        <p>Q3.感想や要望があればお書きください(２００文字以内)<br></p>
    </div>
    あなたの解答：
    <?php
        echo($input_message);
    ?>
    <br>
    <form action  = "confirm_send.php" method = "GET">
        <br><br>
        <button type = "submit" name = "back">戻る</button>
        <button type = "submit" name = "add">送信</button>
    </form>
    <?php
    if(isset($_GET['add'])){
        try{
            //データベースに接続
            $dbh = DBUtil::Connect();
        
            $sql = 'UPDATE user_info SET satisfaction = :input_satisfaction, message = :input_message, menu = :input_menu WHERE id = :input_id AND password = :input_pass';
        
            //SQL文を実行する準備
            $stmt = $dbh->prepare($sql);
        
            //プレースホルダーに実際の値をバインド
            // ->bindValue(プレースホルダ名, バインドする値, データの型)
            $stmt->bindValue(':input_satisfaction', $input_satisfaction, PDO::PARAM_INT);
            $stmt->bindValue(':input_menu', $input_menu, PDO::PARAM_INT);
            $stmt->bindValue(':input_message', $input_message, PDO::PARAM_STR);
            $stmt->bindValue(':input_id', $input_id, PDO::PARAM_INT);
            $stmt->bindValue(':input_pass', $input_pass, PDO::PARAM_STR);
        
            //SQL文を実行
            $stmt->execute();

            header('location:end_use.php');
            exit();
        
        }catch(PDOException $e){
            echo('接続失敗:'. $e->getMessage(). '<br>');
            exit();
        }
    }
    if(isset($_GET['back'])){
        header('location:impression_request.php');
        exit();
    }
    ?>
</body>
</html>