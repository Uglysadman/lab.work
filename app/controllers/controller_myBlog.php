<?php
    include "app/models/model_blog.php";
    include "app/models/model_userStatistic.php";
    include "app/models/model_comments.php";
    class Controller_MyBlog extends Controller
    {
        public static $page = 'Мой блог';

        public function __construct()
        {
            parent::__construct();
            Model_Blog::connect();
            Model_Comments::connect();
        }

        function action_index()
        {
            if (isset($_SESSION['authorize']))
            {
                if ($_SESSION['authorize']){
                    $record = new Model_UserStatistic(self::$page);
                    $record->insert();

                    if (isset($_POST['text_comment'])){
                        $comment = new Model_Comments(date('Y-m-d H:i:s'), $_SESSION['fio'], $_POST['text_comment'], $_POST['note_id']);
                        $comment->insert();
                    }

                }
            }


            $this->data['curPage'] = (int)(isset($_GET['page']) ? ($_GET['page']) : 0);
            $this->data['numPerPage'] = 5;
            $this->data['numResults'] = count(Model_Blog::findAll());
            $this->data['numPages'] = ceil($this->data['numResults']/$this->data['numPerPage']);
            $startNumNote = abs($this->data['curPage'] * $this->data['numPerPage']);

            $this->data['notes'] = Model_Blog::findAll($startNumNote, $this->data['numPerPage']);
            $this->data['comments'] = Model_Comments::findAll();

            $this->view->render(self::$page, "MyBlog/index.php", $this->data);
        }

        function action_loadPage($page)
        {
            $this->data['curPage'] = $page;
            $this->data['numPerPage'] = 5;
            $this->data['numResults'] = count(Model_Blog::findAll());
            $this->data['numPages'] = ceil($this->data['numResults']/$this->data['numPerPage']);
            $startNumNote = @abs($this->data['curPage'] * $this->data['numPerPage']);

            $this->data['notes'] = Model_Blog::findAll($startNumNote, $this->data['numPerPage']);
            $this->data['comments'] = Model_Comments::findAll();
            
            $this->view->render(self::$page, "MyBlog/index.php", $this->data);
        }

    }
?>