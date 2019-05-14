<?php
    class Model_UserStatistic extends BaseActiveRecord
    {
        // Список полей таблицы
        public $date;
        public $page;
        public $ip_adress;
        public $host;
        public $browser;

        // Имя связанной с AR Таблицы в MySQL
        protected static $table = 'user_statistic';

        public function __construct($page)
        {
            parent::connect();
            $this->date = date('Y-m-d H:i:s');;
            $this->page = $page;
            $this->ip_adress = $_SERVER['REMOTE_ADDR'];
            $this->host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
            $this->browser = $_SERVER['HTTP_USER_AGENT'];
        }

        public function insert()
        {
            $sql = "INSERT INTO ".self::$table."(date,page,ip_adress,host,browser)
                VALUES (:date, :page, :ip_adress, :host, :browser)";
            $query = self::$pdo->prepare($sql);
            $query->bindParam(':date', $this->date);
            $query->bindParam(':page', $this->page);
            $query->bindParam(':ip_adress', $this->ip_adress);
            $query->bindParam(':host', $this->host);
            $query->bindParam(':browser', $this->browser);
            $query->execute();
        }

        public static function findAll($startNum=null, $count=null)
        {
            if ($startNum !== null && $count !== null){
                $sql = "SELECT `date`, `page`, ip_adress, host, browser FROM ".self::$table." ORDER BY date DESC
                    LIMIT ".$startNum.",".$count;
            }
            else {
                $sql = "SELECT `date`, `page`, ip_adress, host, browser FROM ".self::$table." ORDER BY date DESC";
            }

            return iterator_to_array(self::$pdo->query($sql));
        }
    }
?>