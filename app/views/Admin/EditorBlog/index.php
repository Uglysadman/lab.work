<link rel="stylesheet" type="text/css" href="/public/assets/css/forms.css"/>
<script type="text/javascript" src="/public/assets/js/jquery.js"></script>

        <div id="form_panel">
            <form enctype="multipart/form-data" method="post" action="/admin/editorBlog/validate">
                <input type="text" name="topic" id="topic" placeholder="Введите тему">
                
                <label for="image">Изображение</label>
                <input class="btn" type="file" name="image">

                <textarea name="message" id="message" placeholder="Текст сообщения" rows=10 cols=50 wrap="hard"></textarea>
                <input class="btn" type="submit">
                <input class="btn" type="reset">
            </form>


        </div>