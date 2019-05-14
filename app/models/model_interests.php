<?php
    class Model_Interests extends Model
    {
        private $hrefs;
        private $name_c;
        private $file_path = array();

        public function __construct()
        {
            $this->hrefs = ["films","books", "music"];
            $this->name_c = ["Мои любимые фильмы", "Мои любимые книги", "Моя любимая музыка"];
            for ($i=0; $i<9; $i++){
                $this->file_path[$i] = "/public/assets/img/".($i+1).".jpg";
            }
        }

        public function get_data()
        {
            return array($this->hrefs, $this->name_c, $this->file_path);
        }
    }
?>