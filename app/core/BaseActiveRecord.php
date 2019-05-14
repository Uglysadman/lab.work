<?php
    abstract class BaseActiveRecord
    {
        // Объект для доступа к PDO
        public static $pdo;

        // Параметры доступа к базе данных
        public static $dsn = 'mysql:dbname=lab_web_db;host=127.0.0.1:3308';
        public static $username = 'admin';
        public static $password = 'admin123';

        public static function connect()
        {
            try {
                self::$pdo = new PDO (
                    self::$dsn, self::$username, self::$password,
                    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
                );
            }
            catch (PDOException $e) {
                echo "Подключение на удалось: ".$e->getMessage();
            }
        }

        public static function disconnect()
        {
            $pdo = NULL;
        }

        // Интерфейс AR паттерна
        public function save() {}

        public function insert() {}

        public function delete() {}

        public static function find($id, $startNum=null, $count=null) {}

        public static function findAll($startNum=null, $count=null) {}
    }
?>