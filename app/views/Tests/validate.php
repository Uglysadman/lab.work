<?php
    if (!$data){
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
        Вы не зарегистрированы
    
        <a style="
        display: block;
        border-radius: 5px;
        background: mediumseagreen;
        width: fit-content;
        padding: 5px 15px;
        margin: 15% auto 0;" href="/regist/index">
        Зарегистрироваться
        </a>
        </div>';
    }
    else {
        echo $data;
    }
?>