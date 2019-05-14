<?php
    include "app/models/validators/TestFormValidation.php";
    include "app/models/validators/ResultsVerification.php";
    include "app/models/model_testAnswers.php";
    include "app/models/model_userStatistic.php";
    class Controller_Tests extends Controller
    {
        public static $page = 'Тесты';

        function __construct()
        {
            parent::__construct();
            Model_TestAnswers::connect();
		    $this->view = new View();
        }

        function action_index()
        {
            if (isset($_SESSION['authorize']))
            {
                if ($_SESSION['authorize']){
                    $record = new Model_UserStatistic(self::$page);
                    $record->insert();
                }
            }

            $this->data['curPage'] = (int)(isset($_GET['page']) ? ($_GET['page']) : 0);
            $this->data['numPerPage'] = 5;
            $this->data['numResults'] = count(Model_TestAnswers::findAll());
            $this->data['numPages'] = ceil($this->data['numResults']/$this->data['numPerPage']);
            $startNumNote = abs($this->data['curPage'] * $this->data['numPerPage']);

            $this->data['resultsTest'] = Model_TestAnswers::findAll($startNumNote, $this->data['numPerPage']);

            $this->view->render(self::$page, 'Tests/index.php', $this->data);
        }

        function action_loadPage($page)
        {
            $this->data['curPage'] = $page;
            $this->data['numPerPage'] = 5;
            $this->data['numResults'] = count(Model_TestAnswers::findAll());
            $this->data['numPages'] = ceil($this->data['numResults']/$this->data['numPerPage']);
            $startNumNote = @abs($this->data['curPage'] * $this->data['numPerPage']);

            $this->data['resultsTest'] = Model_TestAnswers::findAll($startNumNote, $this->data['numPerPage']);

            $this->view->render(self::$page, 'Tests/index.php', $this->data);
        }

        
        function action_validate()
        {
            $authorize = false;
            if (isset($_SESSION['authorize']))
            {
                if ($_SESSION['authorize']){
                    $authorize = true;
                    $verificator = new ResultsVerification();
                    $verificator->Validate($_POST);
                    $verificator->checkAnswers();
                    if (!empty($verificator->errors)){
                        $res = $verificator->ShowErrors();
                        $this->view->render('Результат верификации', 'Tests/validate.php', $res);
                        $fio = $_SESSION['fio'];
                        $group = $_POST['group'];
                        $date = date('Y-m-d H:i:s');
                        $questions = $verificator->answer_array;
                        $answers = ['answer1'=>$_POST['answer1'], 'answer2'=>$_POST['answer2'], 'answer3'=>$_POST['answer3']];
                        $test = new Model_TestAnswers($fio, $group, $date, $questions, $answers);
                        $test->insert();
                    }
                }
                else {
                    $authorize = false;
                    $this->view->render('Результат верификации', 'Tests/validate.php', $authorize);
                }
            }
            else {
                $authorize = false;
                $this->view->render('Результат верификации', 'Tests/validate.php', $authorize);
            }

        }

    }
?>