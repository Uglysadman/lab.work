<?php
    include "app/models/model_user.php";
    include "app/models/validators/RegistFormValidation.php";
    class Controller_Regist extends Controller
    {
        function __construct()
        {
            parent::__construct();
            Model_User::connect();
        }

        function action_index()
        {
            $this->view->render("Регистрация", "Regist/index.php");
        }

        function action_validate()
        {
            $validator = new RegistFormValidation();
            $validator->Validate($_POST);
            if (!empty($validator->errors))
            {
                $res = $validator->ShowErrors();
                $this->view->render('Ошибка ввода','Regist/validate.php', $res);
            }
            if ($validator->success)
            {
                $_SESSION['fio'] = $_POST['fio'];
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['password'] = $_POST['password'];

                $user = new Model_User($_SESSION['fio'], $_SESSION['email'], $_SESSION['login'], $_SESSION['password']);
                $user->insert();
                $_SESSION['authorize'] = true;
                header('Location:/main/index');
                exit;
            }
        }
    }
?>