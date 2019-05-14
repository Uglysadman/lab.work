<?php
    class Model_Photo extends Model
    {
        private $titles = array();
        private $file_path = array();

        public function __construct()
        {
            for ($i=0; $i<16; $i++){
                $this->titles[$i] = "Фото ".($i+1);
                $this->file_path[$i] = "/public/assets/img/photo".($i+1).".jpg";
            }
        }

        public function get_data()
        {
            return array($this->titles, $this->file_path);
        }
    }
?>