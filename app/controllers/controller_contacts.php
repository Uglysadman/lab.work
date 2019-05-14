<?php
    include "app/models/validators/ContactsFormValidation.php";
    include "app/models/model_userStatistic.php";
    class Controller_Contacts extends Controller
    {
        public static $page = 'Контакты';

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

            $this->view->render(self::$page, "Contacts/index.php");
        }

        function action_validate()
        {
            $validator = new ContactsFormValidation();
            $validator->Validate($_POST);
            if (!empty($validator->errors))
            {
                $res = $validator->ShowErrors();
                $this->view->render('Ошибка ввода','Contacts/validate.php', $res);
            }
        }
    }
?>