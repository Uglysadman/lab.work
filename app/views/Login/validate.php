<?php
    if ($data['isAdmin']){
        echo '<div style="
        width: fit-content;
        max-width: 400px;
        max-height: max-content;
        margin: 15% auto 0;
        font-size: 20px;
        text-align: center;
        background: green;
        padding: 10px;
        border-radius: 5px;">
        Данные введены верно
    
        <a style="
        display: block;
        border-radius: 5px;
        background: mediumseagreen;
        width: fit-content;
        padding: 5px 15px;
        margin: 15% auto 0;" href="/admin/main/index">
        Войти
        </a>
        </div>';
    }
    else if ($data['authorize']){
        header('Location:/main/index');
        exit;
    }
    else {
        echo '<div style="
        width: fit-content;
        max-width: 400px;
        max-height: max-content;
        margin: 15% auto 0;
        font-size: 20px;
        text-align: center;
        background: red;
        padding: 10px;
        border-radius: 5px;">
        Данные введены неверно
    
        <a style="
        display: block;
        border-radius: 5px;
        background: mediumseagreen;
        width: fit-content;
        padding: 5px 15px;
        margin: 15% auto 0;" href="/login/index">
        Зполнить заново
        </a>
        </div>';
    }
?>