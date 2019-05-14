<?php
    class ContactsFormValidation extends FormValidation
    {
        public function __construct()
        {
            $this->SetRule("fio", "checkFio");
            $this->SetRule("phone", "checkPhone");
            $this->SetRule("email", "isEmail");
            $this->SetRule("age", "isNotEmpty");
            $this->SetRule("message", "isNotEmpty");
        }

        public function checkFio($data)
        {
            if (empty($data) && !preg_match('/^[a-zA-Z]{3,100}$/', $data))
            {
                return 'Поле должно иметь длину от 3х до 100 символов';
            }
        }

        public function checkPhone($data)
        {
            if (empty($data) && !preg_match('/^\+3|7\d{9,11}$/', $data))
            {
                return 'Поле с номером телефона должно соответствовать шаблону:
                +7 999 999-99-99 или +3 999 999-99-99';
            }
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
                    max-width: 400px;
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
                        margin: 20px auto 0;" href="/contacts/index">
                        Заполнить форму заново
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
                Форма заполнена успешно
        
                <a style="
                display: block;
                border-radius: 5px;
                background: mediumseagreen;
                width: fit-content;
                padding: 5px 15px;
                margin: 15% auto 0;" href="/contacts/index">
                ок
                </a>
                </div>';
            }
        }
    }
?>