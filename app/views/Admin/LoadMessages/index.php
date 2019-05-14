<link rel="stylesheet" type="text/css" href="/public/assets/css/forms.css"/>
<div id="form_panel">
    <form enctype="multipart/form-data" method="post" action="/admin/loadMessages/upload">
        <input class="btn" type="file" name="messages"> <br>
        <input class="btn" type="submit" value="3arpyзить на сервер">
    </form>

    <?php
        foreach($data['notes'] as $id => $row) {  
            echo '
            <article style="max-width: 600px;
              max-height: max-content;
              margin:10px auto;
              padding: 10px;
              text-align: left;
              border: 1px solid white;
              border-radius: 10px">
              <p>' . $row['date'] . '</p>
              <p>' . $row['fio'] . '</p>
              <p>' . $row['email'] . '</p>
              <p style="margin-top: 20px;word-break: break-word;line-height: 25px;">' . $row['message'] . '</p>
            </article>
            ';
        };

        echo '<div class="pagination">';
        if ($data['curPage'] >= 1){
            echo '<a href="/admin/LoadMessages/loadPage/' . ((int)$data['curPage']-1) . '">Предыдущая</a>';
        }

        for ($page=$data['curPage']; $page<=(int)$data['curPage']+3; $page++){
            if ($page <= $data['numPages'] && $page >= 1){
                if ($page-1 == $data['curPage']){
                    echo $page." ";
                }
                else {
                    echo '<a href="/admin/LoadMessages/loadPage/' . ((int)$page-1) . '">' . $page . '</a>';
                }
            }
        }

        if ($data['curPage'] < $data['numPages']-1){
            echo '<a href="/admin/LoadMessages/loadPage/' . ((int)$data['curPage']+1) . '">Следующая</a>';
        }
        echo '</div>';
    ?>

</div>
