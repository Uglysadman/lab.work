<?php
    include "app/models/model_guestBook.php";
    class Controller_LoadMessages extends Controller
    {
        function __construct()
        {
            parent::__construct();
            Model_GuestBook::connect();
            $this->view = new View();
        }

        function action_index()
        {
            $this->authenticate();
            $this->data['curPage'] = (int)(isset($_GET['page']) ? ($_GET['page']) : 0);
            $this->data['numPerPage'] = 5;
            $this->data['numResults'] = count(Model_GuestBook::findAll());
            $this->data['numPages'] = ceil($this->data['numResults']/$this->data['numPerPage']);
            $startNumNote = abs($this->data['curPage'] * $this->data['numPerPage']);

            $this->data['notes'] = Model_GuestBook::findAll($startNumNote, $this->data['numPerPage']);

            $this->view->render('Загрузка сообщений', '/LoadMessages/index.php',$this->data, '/Layout/index.php', '/admin');
        }

        function action_loadPage($page)
        {
            $this->data['curPage'] = $page;
            $this->data['numPerPage'] = 5;
            $this->data['numResults'] = count(Model_GuestBook::findAll());
            $this->data['numPages'] = ceil($this->data['numResults']/$this->data['numPerPage']);
            $startNumNote = @abs($this->data['curPage'] * $this->data['numPerPage']);

            $this->data['notes'] = Model_GuestBook::findAll($startNumNote, $this->data['numPerPage']);

            $this->view->render('Загрузка сообщений', '/LoadMessages/index.php',$this->data, '/Layout/index.php', '/admin');
        }

        function action_upload()
        {
            $success = true;
            try{
                $json_file = @file('public/'.$_FILES['messages']['name']);
                if (!$json_file){
                    $success = false;
                    $this->view->render('Загрузка сообщений', '/LoadMessages/upload.php',$success, '/Layout/index.php', '/admin');
                    return;
                }
                $messages = array();
                $guests = array();
                foreach($json_file as $id => $row){
                    $messages[] = json_decode($row);
                }
                foreach($messages as $key => $value){
                    $date = $value->date;
                    $fio = $value->fio;
                    $email = $value->email;
                    $message = $value->message;
    
                    $guest = new Model_GuestBook($date, $fio, $email, $message);
                    $guest->insert();
                }
            }
            catch (Exception $e){
                "Ошибка: ". $e->getMessage();
            }

            if ($success){
                $this->view->render('Загрузка сообщений', '/LoadMessages/upload.php',$success, '/Layout/index.php', '/admin');
            }
        }

    }
?>