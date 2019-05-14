<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?=$title?></title>
    <link rel="stylesheet" type="text/css" href="/public/assets/css/normalize.css">
	<link rel="stylesheet" type="text/css" href="/public/assets/css/style.css"/>
</head>

<body>

<header>
    <div id="date"></div>
    <a class="btn" href="/admin/main/logout">Выйти</a>
</header>

    <section id="main_block"></div>
        <nav>
            <div class="logo"><a href="/admin/main/index">MAX</a></div>
               <ul class="menu">
                    <li class="menu_item">
                        <a href="/admin/main/index" class="menu_link">Главная</a>
                    </li>
                    <li class="menu_item">
                        <a href="/admin/loadMessages/index" class="menu_link">Загрузка сообщений</a>
                    </li>
                    <li class="menu_item">
                        <a href="/admin/editorBlog/index" class="menu_link">Редактор блога</a>
                    </li>
                    <li class="menu_item">
                        <a href="/admin/userStatistic/index" class="menu_link">Статистика посещений</a>
                    </li>
                    <li class="menu_item">
                        <a href="/admin/user/index" class="menu_link">Пользователи</a>
                    </li>
               </ul>
        </nav>


    <?php
        include "app/views/admin".$content_view;
    ?>
    </section>


    <script type="text/javascript" src="/public/assets/js/Date.js"></script>
</body>
</html>