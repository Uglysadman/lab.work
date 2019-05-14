<link rel="stylesheet" type="text/css" href="/public/assets/css/forms.css"/>
<div id="form_panel">
   
    <?php
        foreach($data['notes'] as $id => $note) {  
            echo '
            <article class="content-blog">
            <article class="content-note">
              <img src="/public/assets/img/' . $note['img'] . '">
              <div class="note-message">
                <p>' . $note['date'] . '</p>
                <p>' . $note['topic'] . '</p>
                <p style="margin-top: 30px;word-break: break-word;line-height: 25px;">' . $note['message'] . '</p>
              </div>
              </article>
            ';
            if (count($data['comments'])){
                echo'
                <article class="content-comments">
                <h2 class="comment-header">Комментарии:</h2>
                ';
            }
            if (isset($_SESSION['authorize'])){
                if ($_SESSION['authorize']){
                    echo '<div>
                    <button class="btn commenting">Добавить комментарий</button></div>
                    <form method="POST" style="display:none">
                    <textarea name="text_comment" required></textarea>
                    <input type="text" name="note_id" value="'. $note['id'] .'" style="display:none">
                    <input type="button" name="send-comment" value="Отправить" class="btn send-comment">
                    </form>';
                }
            }
            foreach($data['comments'] as $id => $comment){
                if ($comment['note_id'] == $note['id']){
                    echo '
                    <article class="content-comments">
                    <div class="comment-message">
                    <p>' . $comment['date'] . '</p>
                    <p>' . $comment['author'] . '</p>
                    <p style="margin-top: 30px;word-break: break-word;line-height: 25px;">' . $comment['text'] . '</p>
                    </div>
                    </article>
                    ';
                }
            }
            echo '</article>';
            echo '</article>';
        }; 

        echo '<div class="pagination">';
        if ($data['curPage'] >= 1){
            echo '<a href="/MyBlog/loadPage/' . ((int)$data['curPage']-1) . '">Предыдущая</a>';
        }

        for ($page=$data['curPage']; $page<=(int)$data['curPage']+3; $page++){
            if ($page <= $data['numPages'] && $page >= 1){
                if ($page-1 == $data['curPage']){
                    echo $page." ";
                }
                else {
                    echo '<a href="/MyBlog/loadPage/' . ((int)$page-1) . '">' . $page . '</a>';
                }
            }
        }

        if ($data['curPage'] < $data['numPages']-1){
            echo '<a href="/MyBlog/loadPage/' . ((int)$data['curPage']+1) . '">Следующая</a>';
        }
        echo '</div>';
    ?>

</div>

<script type="text/javascript" src="/public/assets/js/blog.js"></script>