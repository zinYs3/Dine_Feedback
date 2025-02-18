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
        </div>
    </form>
</body>
</html>