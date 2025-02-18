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
        <p>ここではユーザーの情報を確認できます</p>
    </div>
    <form action = "look_data.php" method = "GET">
    <button type = "submit" name = "back">戻る</button>
    <br><br><br>
    </form>
</body>
</html>
<?php
include_once '../db.php';

if(isset($_GET['back'])){
    header('location:master.php');
    exit();
}
try{
    //データベースに接続
    $dbh = DBUtil::Connect();

    //user_infoから社員IDとパスワードを持ってくる
    $sql = 'SELECT * FROM user_info';

    //SQL文を実行する準備
    $stmt = $dbh->prepare($sql);

    //SQL文を実行
    $stmt->execute();

    echo "<table border = '1'>";
    echo "<tr><th>id</th><th>password</th><th>satisfaction</th><th>menu</th><th>message</th></tr>";

    foreach($stmt as $row){
        echo "<tr>";
        echo "<td>". htmlspecialchars($row['id']). "</td>";
        echo "<td>". htmlspecialchars($row['password']). "</td>";
        echo "<td>". htmlspecialchars($row['satisfaction']). "</td>";
        echo "<td>". htmlspecialchars($row['menu']). "</td>";
        echo "<td>". htmlspecialchars($row['message']). "</td>";
        echo "</tr>";
    }

    echo "</table>";

}catch(PDOException $e){
    echo('接続失敗:'. $e->getMessage(). '<br>');
    exit();
}
?>
