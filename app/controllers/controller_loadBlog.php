<?php
    include "app/models/model_blog.php";
    class Controller_LoadBlog extends Controller
    {
        function __construct()
        {
            Model_Blog::connect();
            $this->view = new View();
        }

        function action_index()
        {

            $this->view->render('Загрузка блога', 'LoadBlog/index.php');
        }

        function action_upload()
        {
            
        }
    }
?>