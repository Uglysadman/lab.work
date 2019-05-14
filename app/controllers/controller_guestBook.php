<?php
    include "app/models/validators/GuestBookValidation.php";
    include "app/models/model_userStatistic.php";
    class Controller_GuestBook extends Controller
    {
        public static $page = 'Гостевая книга';

        function __construct()
        {
            parent::__construct();
            $this->view = new View();
        }
        
        function action_index()
        {  
            if (isset($_SESSION['authorize']))
            {
                if ($_SESSION['authorize']){
                    $record = new Model_UserStatistic(self::$page);
                    $record->insert();
                }
            }

            $json_file = file('public/messages.inc');
            $messages = array();
            foreach($json_file as $key => $value){
                $messages[] = json_decode($value);
            }
            $this->view->render(self::$page, 'GuestBook/index.php', $messages);
        }

        function action_validate()
        {
            $validator = new GuestBookValidation();
            $validator->Validate($_POST);
            if (!empty($validator->errors)){
                $data = $validator->ShowResult();
                $this->view->render('Результат валидации', 'GuestBook/validate.php', $data);
            }
            if ($validator->success) {
                $fio = $_POST['fio'];
                $email = $_POST['email'];
                $date = date('Y-m-d H:i:s');
                $message = $_POST['message'];
                $guest = new Model_GuestBook($date, $fio, $email, $message);
                $guest->save();
            }
        }
    }
?>