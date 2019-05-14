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
    <div id="authorization">
        <?php
            if (isset($_SESSION['authorize']))
            {
                if (!$_SESSION['authorize']){
                    echo '<a class="btn" href="/login/index">Войти</a>
                    <a class="btn" href="/regist/index">Зарегистрироваться</a>';
                }
                else {
                    echo '<p>Пользователь: ' . $_SESSION['fio'] . '</p>
                    <a class="btn" href="/main/logout">Выйти</a>';
                }
            }
            else {
                echo '<a class="btn" href="/login/index">Войти</a>
                    <a class="btn" href="/regist/index">Зарегистрироваться</a>';
            }
        ?>
    </div>
</header>

    <section id="main_block"></div>
        <nav>
            <div class="logo"><a href="/main/index">MAX</a></div>
               <ul class="menu">
                    <li class="menu_item">
                        <a href="/main/index" class="menu_link">Главная</a>
                    </li>
                    <li class="menu_item">
                        <a href="/about/index" class="menu_link">Обо мне</a>
                    </li>
                    <li id="interests" class="menu_item">
                        <a href="#" class="menu_link">Мои интересы</p>
                        <ul class="sub_menu">
                            <li class="menu_int_item">
                                <a href="/interests/index#films" class="menu_int_link">Любимые фильмы</a>
                            </li>
                            <li class="menu_int_item">
                                <a href="/interests/index#books" class="menu_int_link">Любимые книги</a>
                            </li>
                            <li class="menu_int_item">
                                <a href="/interests/index#music" class="menu_int_link">Любимая музыка</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu_item">
                        <a href="/study/index" class="menu_link">Учёба</a>
                    </li>
                    <li class="menu_item">
                        <a href="/photo/index" class="menu_link">Фотоальбом</a>
                    </li>
                    <li class="menu_item">
                        <a href="/contacts/index" class="menu_link">Контакты</a>
                    </li>
                    <li class="menu_item">
                        <a href="/tests/index" class="menu_link">Тесты</a>
                    </li>
                    <li class="menu_item">
                        <a href="/guestBook/index" class="menu_link">Гостевая книга</a>
                    </li>
                    <li class="menu_item">
                        <a href="/myBlog/index" class="menu_link">Мой блог</a>
                    </li>
                    <!--<li class="menu_item">
                        <a href="/admin/main/index" class="menu_link">Администратор</a>
                    </li>-->
               </ul>
        </nav>


    <?php
        include "app/views/".$content_view;
    ?>
    </section>


    <script type="text/javascript" src="/public/assets/js/Date.js"></script>
    <script type="text/javascript" src="/public/assets/js/dropMenu.js"></script>
</body>
</html>