<?php
    class Model_User extends BaseActiveRecord
    {
        // Список полей таблицы
        public $fio;
        public $email;
        public $login;
        public $user_pass;

        // Имя связанной с AR Таблицы в MySQL
        protected static $table = 'user';

        public function __construct($fio, $email, $login, $user_pass)
        {
            parent::connect();
            $this->fio = $fio;
            $this->email = $email;
            $this->login = $login;
            $this->user_pass = $user_pass;
        }

        public function insert()
        {
            $sql = "INSERT INTO ".self::$table."(fio,email,login,password)
                VALUES (:fio, :email, :login, :password)";
            $query = self::$pdo->prepare($sql);
            $query->bindParam(':fio', $this->fio);
            $query->bindParam(':email', $this->email);
            $query->bindParam(':login', $this->login);
            $query->bindParam(':password', $this->user_pass);
            $query->execute();
        }

        public static function findAll($startNum=null, $count=null)
        {
            if ($startNum !== null && $count !== null){
                $sql = "SELECT fio, email, `login`, `password` FROM ".self::$table." ORDER BY fio DESC
                    LIMIT ".$startNum.",".$count;
            }
            else {
                $sql = "SELECT fio, email, `login`, `password` FROM ".self::$table." ORDER BY fio DESC";
            }

            return iterator_to_array(self::$pdo->query($sql));
        }

        public static function findByLoginAndPass($login, $password)
        {
            $sql = "SELECT `fio` FROM ".self::$table. " WHERE `login` = '${login}' AND `password` = '${password}'";
            return iterator_to_array(self::$pdo->query($sql));
        }
    }
?>