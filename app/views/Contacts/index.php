<link rel="stylesheet" type="text/css" href="/public/assets/css/forms.css"/>
<script type="text/javascript" src="/public/assets/js/jquery.js"></script>

    <div id="form_panel">
            <form name="contact_form" method="post" action="/contacts/validate">
                <input type="text" name="fio" id="fio" placeholder="Введите ФИО">
                <br>
                <input type="text" name="phone" id="phone" placeholder="Номер телефона"> 
                <br>
                <input type="text" name="age" placeholder="Дата рождения" id="birth">
                <br>
                <input type="text" name="email" id="email" placeholder="E-mail">
                <br>
                <textarea name="message" id="message" placeholder="Текст сообщения" rows=10 cols=50 wrap="hard"></textarea>
                <input class="btn" type="submit">
                <input class="btn" type="reset">
            </form>
    </div>

<script type="text/javascript" src="/public/assets/js/calend.js"></script>






