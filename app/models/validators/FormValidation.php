<?php
    class FormValidation
    {
        public $rules = array();
        public $errors = array();

        public function isNotEmpty($data)
        {
            if (empty($data))
            {
                return 'Поле не заполнено';
            }
        }

        public function isInteger($data)
        {
            if (!is_int($data))
            {
                return 'Поле должно содержать только целые числа';
            }
        }

        public function isLess($data, $value)
        {
            if (is_int($data) && $data >= $value)
            {
                return 'Значение должно быть меньше, чем '.$value;
            }
        }

        public function isGreater($data, $value)
        {
            if (is_int($data) && $data <= $value)
            {
                return 'Значение должно быть больше, чем '.$value;
            }
        }

        public function isEmail($data)
        {
            if (is_string($data) && !preg_match('/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/', $data))
            {
                return 'Поле заполнено неверно ! Имя почтового ящика должно соответствовать шаблону: example@mail.com';
            }
        }

        public function SetRule($field_name, $validator_name, $external=NULL)
        {
            $this->rules[$field_name] = is_null($external) ? $validator_name : [$validator_name, $external];
        }

        public function Validate($post_array)
        {
            foreach ($this->rules as $key => $value)
            {
                if (isset($post_array[$key]))
                {
                    if (is_array($this->rules[$key]))
                    {
                        $func = $value[0];
                        $this->errors[$key] = $this->$func($post_array[$key],$this->rules[$key][1]);  
                    }
                    else {
                        $func = $value;
                        $this->errors[$key] = $this->$func($post_array[$key]); 
                    }  
                }
            }
        }

        public function ShowErrors()
        {
            
        }
    }
?>