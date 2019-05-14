<?php
    include "app/models/model_userStatistic.php";
    class Controller_Photo extends Controller
    {
        public static $page = 'Фотоальбом';

        function __construct()
        {
            parent::__construct();
            $this->model = new Model_Photo();
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

            $data = $this->model->get_data();
            $this->view->render('Альбом', 'Album/index.php', $data);
        }
    }
?>