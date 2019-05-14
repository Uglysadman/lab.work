<?php
    include "app/models/validators/EditorBlogValidation.php";
    include "app/models/model_blog.php";
    class Controller_EditorBlog extends Controller
    {
        function __construct()
        {
            parent::__construct();
            Model_Blog::connect();
            $this->view = new View();
        }

        function action_index()
        {
            $this->authenticate();

            

            $this->view->render('Редактор блога', '/EditorBlog/index.php',$data=NULL, '/Layout/index.php', '/admin');
        }

        function action_validate()
        {
            $img_name = $_FILES['image']['name'];
            $validator = new EditorBlogValidation();
            $validator->Validate($_POST);
            if (!empty($validator->errors)){
                $result_validation = $validator->ShowErrors();
                $this->view->render('Результат валидации', '/EditorBlog/validate.php', $result_validation,'/Layout/index.php', '/admin');
            }
            if ($validator->success){
                $date = date('Y-m-d H:i:s');
                $topic = $_POST['topic'];
                $message = $_POST['message'];
                $note = new Model_Blog($date, $topic, $message, $img_name);
                $note->insert();
            }
        }
    }
?>