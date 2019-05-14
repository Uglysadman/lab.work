<?php
    class Model_Blog extends BaseActiveRecord
    {
        public $date;
        public $topic;
        public $img;
        public $message;

        protected static $table = 'blog';

        public function __construct($date, $topic, $message, $img=NULL)
        {
            parent::connect();
            $this->date = $date;
            $this->topic = $topic;
            $this->img = $img;
            $this->message = $message;
        }

        public function insert()
        {
            $sql = "INSERT INTO ".self::$table."(date,topic,img,message)
                VALUES (:date, :topic, :img, :message)";
            $query = self::$pdo->prepare($sql);
            $query->bindParam(':date', $this->date);
            $query->bindParam(':topic', $this->topic);
            $query->bindParam(':img', $this->img);
            $query->bindParam(':message', $this->message);
            $query->execute();
        }

        public static function findAll($startNum=null, $count=null)
        {
            if ($startNum !== null && $count !== null){
                $sql = "SELECT * FROM ".self::$table." ORDER BY `date` DESC
                    LIMIT ".$startNum.",".$count;
            }
            else {
                $sql = "SELECT * FROM ".self::$table." ORDER BY `date` DESC";
            }

            return iterator_to_array(self::$pdo->query($sql));
        }

        public function save()
        {
            
        }
    }
?>