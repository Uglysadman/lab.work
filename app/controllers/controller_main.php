<?php
    include "app/models/model_userStatistic.php";
    class Controller_Main extends Controller
    {
        public static $page = 'Главная';

        function action_index()
        {
            if (isset($_SESSION['authorize']))
            {
                if ($_SESSION['authorize']){
                    $record = new Model_UserStatistic(self::$page);
                    $record->insert();
                }
            }
            $this->view->render(self::$page, 'Main/index.php');
        }
    }
?>