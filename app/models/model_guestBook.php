<?php
    class Model_GuestBook extends BaseActiveRecord
    {
        // Список полей таблицы
        public $fio;
        public $email;
        public $date;
        public $message;

        // Имя связанной с AR Таблицы в MySQL
        protected static $table = 'guest_book';

        public function __construct($date, $fio, $email, $message)
        {
            parent::connect();
            $this->date = $date;
            $this->fio = $fio;
            $this->email = $email;
            $this->message = $message;
        }

        public function save()
        {
            $file = fopen("public/messages.inc", "a");
            $message = json_encode($this).PHP_EOL;
            fwrite($file, $message);
            fclose($file);
        }

        public function insert()
        {
            $sql = "INSERT INTO ".self::$table."(date,fio,email,message)
                VALUES (:date, :fio, :email, :message)";
            $query = self::$pdo->prepare($sql);
            $query->bindParam(':date', $this->date);
            $query->bindParam(':fio', $this->fio);
            $query->bindParam(':email', $this->email);
            $query->bindParam(':message', $this->message);
            $query->execute();
        }

        public static function findAll($startNum=null, $count=null)
        {
            if ($startNum !== null && $count !== null){
                $sql = "SELECT `date`, fio, email, `message` FROM ".self::$table." ORDER BY date DESC
                    LIMIT ".$startNum.",".$count;
            }
            else {
                $sql = "SELECT `date`, fio, email, `message` FROM ".self::$table." ORDER BY date DESC";
            }

            return iterator_to_array(self::$pdo->query($sql));
        }
    }
?>