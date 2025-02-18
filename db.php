<?php
require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

class DbUtil{

    private static $_DSN;
    private static $_USER;
    private static $_PASS;

    private static $_dbh;

    public static function Init(){
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        self::$_DSN = $_ENV['DB_DSN'];
        self::$_USER = $_ENV['DB_USER'];
        self::$_PASS = $_ENV['DB_PASS'];

        // 環境変数の値をログに出力
        error_log("DSN: " . self::$_DSN);
        error_log("USER: " . self::$_USER);
        error_log("PASS: " . self::$_PASS);
    }

    public static function Connect(){
        if(!isset(self::$_dbh)){
            self::$_dbh = new PDO(self::$_DSN, self::$_USER, self::$_PASS);
            self::$_dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$_dbh;
    }
}

// 初期化を呼び出す
DbUtil::Init();
?>