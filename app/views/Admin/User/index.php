<link rel="stylesheet" type="text/css" href="/public/assets/css/forms.css"/>
<div id="form_panel">
   
    <?php
        foreach($data['notes'] as $id => $row) {  
            echo '
            <article style="max-width: 600px;
              max-height: max-content;
              margin:10px auto;
              padding: 10px;
              display: flex;
              text-align: left;
              border: 1px solid white;
              border-radius: 10px">
              <div class="note-message">
                <p>ФИО: ' . $row['fio'] . '</p>
                <p>Email: ' . $row['email'] . '</p>
                <p>Login: ' . $row['login'] . '</p>
                <p>Password: ' . $row['password'] . '</p>
              </div>
            </article>
            ';
        }; 

        echo '<div class="pagination">';
        if ($data['curPage'] >= 1){
            echo '<a href="/admin/user/loadPage/' . ((int)$data['curPage']-1) . '">Предыдущая</a>';
        }

        for ($page=$data['curPage']; $page<=(int)$data['curPage']+3; $page++){
            if ($page <= $data['numPages'] && $page >= 1){
                if ($page-1 == $data['curPage']){
                    echo $page." ";
                }
                else {
                    echo '<a href="/admin/user/loadPage/' . ((int)$page-1) . '">' . $page . '</a>';
                }
            }
        }

        if ($data['curPage'] < $data['numPages']-1){
            echo '<a href="/admin/user/loadPage/' . ((int)$data['curPage']+1) . '">Следующая</a>';
        }
        echo '</div>';
    ?>

</div>