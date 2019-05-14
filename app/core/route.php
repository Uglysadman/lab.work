<?php
    class Route
    {
        private static $controller_prefix = 'Controller_';
        private static $action_prefix = 'action_';
        private static $model_prefix = 'Model_';

        static function start()
        {
            // Контроллер и действие по-умолчанию
            $controller_name = "Main";
            $action_name = "index";
            $parametr = "";

            $path_controller = 'app/controllers/';

            $routes = explode('/', $_SERVER['REQUEST_URI']);

            if (!empty($routes[1]) && $routes[1] == 'admin')
            {
                $path_controller = 'app/controllers/admin/';
                if (!empty($routes[2])){
                    $controller_name = $routes[2];
                }
                if (!empty($routes[3])){
                    $action_name = $routes[3];
                }
                if (!empty($routes[4])){
                    $parametr = $routes[4];
                }
            } 
            else if (!empty($routes[1]) && $routes[1] != 'admin')
            {
                $controller_name = $routes[1];
                if (!empty($routes[2])){
                    $action_name = $routes[2];
                }
                if (!empty($routes[3])){
                    $parametr = $routes[3];
                }
            }

            $model_name = self::$model_prefix.$controller_name;
            $controller_name = self::$controller_prefix.$controller_name;
            $action_name = self::$action_prefix.$action_name;

            // Подключаем файл модели
            $model_file = strtolower($model_name);
            $model_path = "app/models/${model_file}.php";

            if (file_exists($model_path)){
                include $model_path;
            }

            set_include_path($path_controller);
            spl_autoload($controller_name);
            spl_autoload_register();

            $controller = new $controller_name;
            $action = $action_name;

            if (method_exists($controller, $action))
            {
                $controller->$action($parametr);
            }
            else {
                die("Контроллер ${controller_name} не содержит действия ${action} !");
            }

        }

        function ErrorPage404()
        {
            $host = "http://".$_SERVER['HTTP_HOST'].'/';
            header('HTTP/1.1 404 Not Found');
            header("Status: 404 Not Found");
            header('Location: '.$host.'404');
        }
    }
?>