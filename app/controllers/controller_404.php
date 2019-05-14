<?php
    class Controller_404 extends Controller
    {
        function action_index()
        {
            $this->view->render('Ошибка', '404/index.php');
        }
    }
?>