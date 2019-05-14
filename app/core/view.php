<?php
    class View
    {
        function render($title, $content_view, $data=NULL, $layout='Layout/index.php', $admin=NULL)
        {
            include "app/views${admin}/".$layout;
        }
    }
?>