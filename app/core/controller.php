<?php
    class Controller
    {
        public $view;
        public $data = array();

        function __construct()
        {
            session_start();
            $this->view = new View();
        }

        function action_index() {}
        
        function action_validate() {}

        function authenticate()
        {
            if (!($_SESSION['isAdmin'])){
                header('Location:/login/index');
                exit;
            }
        } 

        function action_logout()
        {
            session_start();
            session_destroy();
            header('Location:/');
        }
    }
?>