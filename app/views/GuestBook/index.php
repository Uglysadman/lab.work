<link rel="stylesheet" type="text/css" href="/public/assets/css/forms.css"/>
<script type="text/javascript" src="/public/assets/js/jquery.js"></script>

        <div id="form_panel">
            <form name="form_guest_book" method="post" action="/guestBook/validate">
                <input type="text" name="fio" id="fio" placeholder="Введите ФИО">
                <br>
                <input type="text" name="email" id="email" placeholder="E-mail">
                <br>
                <textarea name="message" id="message" placeholder="Текст сообщения" rows=10 cols=50 wrap="hard"></textarea>
                <input class="btn" type="submit">
                <input class="btn" type="reset">
            </form>

            <div id="messages">
                <?php
                  foreach(array_reverse($data) as $key => $value) {    
                    echo '
                    <article style="max-width: 600px;
                      max-height: max-content;
                      margin:10px auto;
                      padding: 10px;
                      text-align: left;
                      border: 1px solid white;
                      border-radius: 10px">
                      <p>' . $value->date . '</p>
                      <p>' . $value->fio . '</p>
                      <p>' . $value->email . '</p>
                      <p style="margin-top: 20px;word-break: break-word;line-height: 25px;">' . $value->message . '</p>
                    </article>
                    ';
                  };
                
                ?>
            </div>
        </div>
        