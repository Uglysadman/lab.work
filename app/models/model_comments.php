<?php
    class Model_Comments extends BaseActiveRecord
    {
        // Список полей таблицы
        public $date;
        public $author;
        public $text;
        public $note_id;
        
        protected static $table = 'comments';

        public function __construct($date, $author, $text, $note_id)
        {
            parent::connect();
            $this->date = $date;
            $this->author = $author;
            $this->text = $text;
            $this->note_id = $note_id;
        }

        public function insert()
        {
            $sql = "INSERT INTO ".self::$table."(date,author,text,note_id)
                VALUES (:date, :author, :text, :note_id)";
            $query = self::$pdo->prepare($sql);
            $query->bindParam(':date', $this->date);
            $query->bindParam(':author', $this->author);
            $query->bindParam(':text', $this->text);
            $query->bindParam(':note_id', $this->note_id);
            $query->execute();
        }

        public static function findAll($startNum=null, $count=null)
        {
            if ($startNum !== null && $count !== null){
                $sql = "SELECT `date`, author, `text`, note_id FROM ".self::$table." ORDER BY date DESC
                    LIMIT ".$startNum.",".$count;
            }
            else {
                $sql = "SELECT `date`, author, `text`, note_id FROM ".self::$table." ORDER BY date DESC";
            }

            return iterator_to_array(self::$pdo->query($sql));
        }
    }
?>