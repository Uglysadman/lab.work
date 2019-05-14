<?php
    include "app/models/model_userStatistic.php";
    class Controller_Interests extends Controller
    {
        public static $page = 'Интересы';

        function __construct()
        {
            parent::__construct();
            $this->view = new View();
            $this->model = new Model_Interests();
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

            $data = $this->model->get_data();
            $this->view->render(self::$page, 'Interests/index.php',  $data);
        }
    }
?>