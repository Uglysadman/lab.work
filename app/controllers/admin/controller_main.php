<?php
    class Controller_Main extends Controller
    {
        function action_index()
        {
            $this->authenticate();
            $this->view->render('Администратор', '/Main/index.php',$data=NULL, '/Layout/index.php', '/admin');
        }
    }
?>