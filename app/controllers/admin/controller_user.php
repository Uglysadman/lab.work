<?php
    class Controller_User extends Controller
    {
        function __construct()
        {
            parent::__construct();
            Model_User::connect();
            $this->view = new View();
        }

        function action_index()
        {
            $this->authenticate();
            $this->data['curPage'] = (int)(isset($_GET['page']) ? ($_GET['page']) : 0);
            $this->data['numPerPage'] = 5;
            $this->data['numResults'] = count(Model_User::findAll());
            $this->data['numPages'] = ceil($this->data['numResults']/$this->data['numPerPage']);
            $startNumNote = abs($this->data['curPage'] * $this->data['numPerPage']);

            $this->data['notes'] = Model_User::findAll($startNumNote, $this->data['numPerPage']);

            $this->view->render('Пользователи', '/User/index.php',$this->data, '/Layout/index.php', '/admin');
        }

        function action_loadPage($page)
        {
            $this->data['curPage'] = $page;
            $this->data['numPerPage'] = 5;
            $this->data['numResults'] = count(Model_User::findAll());
            $this->data['numPages'] = ceil($this->data['numResults']/$this->data['numPerPage']);
            $startNumNote = @abs($this->data['curPage'] * $this->data['numPerPage']);

            $this->data['notes'] = Model_User::findAll($startNumNote, $this->data['numPerPage']);

            $this->view->render('Пользователи', '/User/index.php',$this->data, '/Layout/index.php', '/admin');
        }
    }
?>