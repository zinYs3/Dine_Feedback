<?php
include_once '../db.php';

session_start();


$new_id = 0;//新規社員IDを格納
$new_pass = '';//新規パスワードを格納
$error_message = ''; // エラーメッセージを格納

if(isset($_GET['id']) && isset($_GET['password'])){
    $new_id = $_GET['id'];
    $new_pass = $_GET['password'];
}

try{
    //データベースに接続
    $dbh = DBUtil::Connect();

    if ($new_id != 0 && $new_pass != '') {
        // 既存のIDをチェック
        $check_sql = 'SELECT COUNT(*) FROM user_info WHERE id = :new_id';
        $check_stmt = $dbh->prepare($check_sql);
        $check_stmt->bindValue(':new_id', $new_id, PDO::PARAM_INT);
        $check_stmt->execute();
        $count = $check_stmt->fetchColumn();

        if ($count == 0) {
            // user_infoに社員IDとパスワードを追加
            $sql = 'INSERT INTO user_info (id, password) VALUES (:new_id, :new_pass)';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':new_id', $new_id, PDO::PARAM_INT);
            $stmt->bindValue(':new_pass', $new_pass, PDO::PARAM_STR);
            $stmt->execute();
        } else {
            $error_message = 'このIDは既に登録されています。';
        }
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
    <title>add_user page</title>
    <link rel = "stylesheet" href = "../public/css/style.css">
</head>
<body>
    <div class = "master_title"><p>新規ユーザー登録画面へようこそ</p></div>
    <div class = "to_master_text">
        <p>ここではユーザーを新たにデータベースへ追加できます</p>
    </div>
    <form action = "add_user.php" method = "GET">
    <button type = "submit" name = "back">戻る</button>
    <br><br><br>
    新規社員ID<br>
    <input type = "text" name = "id"><br><br>
    パスワード（任意16文字以内）<br>
    <input type = "text" name = "password"><br><br>
    <input type = "submit" value = "登録"> 
    </form>
    <?php if ($error_message): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error_message); ?></p>
    <?php endif; ?>
</body>
</html>

<?php
if(isset($_GET['back'])){
    header('location:master.php');
    exit();
}else if(isset($_GET['add_user'])){
    header('location:add_user.php');
    exit();
}
?>
