<?php
    class Model_TestAnswers extends BaseActiveRecord
    {
        // Список полей таблицы
        public $fio;
        public $group;
        public $date;
        public $questions;
        public $answers;

        // Имя связанной с AR Таблицы в MySQL
        protected static $table = 'test';

        public function __construct($fio, $group, $date, $questions, $answers){
            parent::connect();
            $this->fio = $fio;
            $this->group = $group;
            $this->date = $date;
            $this->questions = $questions;
            $this->answers = $answers;
        }

        public function insert() {
            $sql = "INSERT INTO ".self::$table." (fio,`group`,date,
                question_1,question_2,question_3,answer_1,answer_2,answer_3)
                VALUES (:fio, :group, :date, :question_1, :question_2, :question_3,
                :answer_1, :answer_2, :answer_3)";
            $query = self::$pdo->prepare($sql);
            $query->bindParam(':fio', $this->fio);
            $query->bindParam(':group', $this->group);
            $query->bindParam(':date', $this->date);
            $query->bindParam(':question_1', $this->questions['Вопрос 1']);
            $query->bindParam(':question_2', $this->questions['Вопрос 2']);
            $query->bindParam(':question_3', $this->questions['Вопрос 3']);
            $query->bindParam(':answer_1', $this->answers['answer1']);
            $query->bindParam(':answer_2', $this->answers['answer2']);
            $query->bindParam(':answer_3', $this->answers['answer3']);
            $query->execute();
        }

        public static function findAll($startNum=null, $count=null)
        {
            if ($startNum !== null && $count !== null){
                $sql = "SELECT fio,`group`,date,question_1,question_2,question_3,
                    answer_1,answer_2,answer_3 FROM ".self::$table." ORDER BY date DESC
                    LIMIT ".$startNum.",".$count;
            }
            else {
                $sql = "SELECT fio,`group`,date,question_1,question_2,question_3,
                    answer_1,answer_2,answer_3 FROM ".self::$table." ORDER BY date DESC";
            }
            return iterator_to_array(self::$pdo->query($sql));
        }
    }
?>