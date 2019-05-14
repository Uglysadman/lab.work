<?php
    include "app/models/model_user.php";
    class Controller_Login extends Controller
    {
        function __construct()
        {
            parent::__construct();
            Model_User::connect();
            $this->view = new View();
        }

        function action_index()
        {
            $this->view->render('Авторизация', 'Login/index.php');
        }

        function action_validate()
        {
            if(isset($_POST['login']) && isset($_POST['password']))
            {
                $login = $_POST['login'];
                $password = $_POST['password'];
        
                if(($login=="admin") && (md5($password) == '6b4ab9131026551fc58b0fa066c03d51'))
                {
                    $_SESSION["isAdmin"] = true;
                }
                else{
                    $_SESSION["isAdmin"] = false;
                }

                $res = Model_User::findByLoginAndPass($login, $password);

                if ($res){
                    $_SESSION['authorize'] = true;
                    $_SESSION['login'] = $login;
                    $_SESSION['password'] = $password;
                    $_SESSION['fio'] = $res[0]['fio'];
                }
                else {
                    $_SESSION['authorize'] = false;
                }
            }
            else{
                $_SESSION['authorize'] = false;
            }

            $this->data['isAdmin'] = $_SESSION['isAdmin'];
            $this->data['authorize'] = $_SESSION['authorize'];
            
            $this->view->render('Валидация', "Login/validate.php", $this->data);
        }
    }
?>