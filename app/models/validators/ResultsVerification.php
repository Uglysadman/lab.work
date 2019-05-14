<?php
    class ResultsVerification extends TestFormValidation
    {
        public $answer_array;
        public $success;

        public function __construct() {
            $this->SetRule("answer1", "isNotRight", "Наука");
            $this->SetRule("answer2", "isNotRight", "Природу");
            $this->SetRule("answer3", "isNotRight", "Озоновый");
          }
          
          public function isNotRight($data, $answer) {
            if($data != $answer) {
              return 'Ошибка : ответ '.$data.' не правильный. 
                Верно : '.$answer;
            }
          }

          public function checkAnswers() {
            $this->answer_array['Вопрос 1'] = !isset($this->errors["answer1"]) ? '+' : '-';
            $this->answer_array['Вопрос 2'] = !isset($this->errors["answer2"]) ? '+' : '-';
            $this->answer_array['Вопрос 3'] = !isset($this->errors["answer3"]) ? '+' : '-';
          }
          

          public function ShowErrors()
        {
            $errorsHtml = '';
            foreach ($this->errors as $key => $value)
            {
                if ($value)
                {
                    $errorsHtml .= '<li style="margin: 10px 0;
                        list-style: none;
                        background: red;
                        color: black;
                        padding: 5px;
                        border-radius: 5px;">'.$value.'</li>';
                }
            }
            if ($errorsHtml)
            {
                return '
                    <div style="width: fit-content;
                    max=width: 400px;
                    margin: 5% auto 0;
                    max-height: max-content;
                    font-size: 20px;
                    text-align: center;
                    background: darkred;
                    padding: 10px;
                    border-radius: 5px;">
                    
                    <ul>'.$errorsHtml.'</ul>
                    
                    <a style="
                        display: block;
                        border-radius: 5px;
                        background: grey;
                        width: fit-content;
                        padding: 5px 15px;
                        margin: 20px auto 0;" href="/tests/index">
                        Пройти тест заново
                    </a>
                    </div>';
            }
            else {
                return '
                <div style="
                width: fit-content;
                max-width: 400px;
                max-height: max-content;
                margin: 15% auto 0;
                font-size: 20px;
                text-align: center;
                background: green;
                padding: 10px;
                border-radius: 5px;">
                Тест пройден успешно
        
                <a style="
                display: block;
                border-radius: 5px;
                background: mediumseagreen;
                width: fit-content;
                padding: 5px 15px;
                margin: 20px auto 0;" href="/tests/index">
                Ок
                </a>
                </div>';
            }
        }

    }
?>