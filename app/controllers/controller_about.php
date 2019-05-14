<?php
    include "app/models/model_userStatistic.php";
    class Controller_About extends Controller
    {
        public static $page = 'Обо мне';

        function action_index()
        {
            if (isset($_SESSION['authorize']))
            {
                if ($_SESSION['authorize']){
                    $record = new Model_UserStatistic(self::$page);
                    $record->insert();
                }
            }
            $this->view->render(self::$page, 'About/index.php');
        }
    }
?>