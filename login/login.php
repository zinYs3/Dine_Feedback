<?php
include_once '../db.php';

session_start();


$input_id = 0;//社員IDを格納
$input_pass = '';//パスワードを格納
$id_pass_success = FALSE;//id,パスワードの合否判定フラグ

if(isset($_GET['id']) && $_GET['password']){
    $input_id = $_GET['id'];
    $input_pass = $_GET['password'];
}

try{
    //データベースに接続
    $dbh = DBUtil::Connect();

    //user_infoから社員IDとパスワードを持ってくる
    $sql = 'SELECT * FROM user_info WHERE id = :input_id AND password = :input_pass';

    //SQL文を実行する準備
    $stmt = $dbh->prepare($sql);

    //プレースホルダーに実際の値をバインド
    // ->bindValue(プレースホルダ名, バインドする値, データの型)
    $stmt->bindValue(':input_id', $input_id, PDO::PARAM_INT);
    $stmt->bindValue(':input_pass', $input_pass, PDO::PARAM_STR);

    //SQL文を実行
    $stmt->execute();

    //結果を1行読み出し
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    //データが存在すれば連想配列、存在しない場合はFALSE
    if($result === FALSE){
        $id_pass_success = FALSE;
    }else{
        $id_pass_success = TRUE;
        $_SESSION['id'] = $input_id;
        $_SESSION['password'] = $input_pass;        
    }

}catch(PDOException $e){
    echo('接続失敗:'. $e->getMessage(). '<br>');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>login page</title>
    <link rel = "stylesheet" href = "../public/css/style.css">
</head>
<body>
    <h2 class = "heading_login">社員食堂</h2>
    <form action = "login.php" method = "GET">
        <div class = "container1">
            <div class = "com_text">社員ID</div>
            <input type = "text" name =  "id" class = "input_button"><br>
        </div>
        <div class = "container2">
            <div class = "com_text">
                パスワード
            </div>
            <input type = "password" name = "password" class = "input_button">
            <br><br><br><br>
            <input type = "submit" value = "ログイン" class = "login_button">
            <br>
            <?php
            if($id_pass_success){
                //管理者の場合
                if($input_id == 30){
                    header('location:../master/master.php');
                    exit();
                }
                //一般ユーザの場合
                header('location:../feedback/satisfaction.php');
                exit();
            }else{
                echo("社員IDまたはパスワードを間違えています。");
            }
            ?>
        </div>
    </form>
</body>
</html>