<link rel="stylesheet" type="text/css" href="/public/assets/css/forms.css"/>

        <div id="form_panel">
            <form name="test_form" method="post" action="/tests/validate">
                <p>Группа:</p> 
                    <select name="group">
                        <optgroup label="1 курс">
                            <option value="ИС/б-11о">ИС/б-11о</option>
                            <option value="ИС/б-12о">ИС/б-12о</option>
                            <option value="ИС/б-13о">ИС/б-13о</option>
                        </optgroup>
                        <optgroup label="2 курс">
                            <option value="ИС/б-21о">ИС/б-21о</option>
                            <option value="ИС/б-22о">ИС/б-22о</option>
                            <option value="ИС/б-23о">ИС/б-23о</option>
                        </optgroup>
                        <optgroup label="3 курс">
                            <option value="ИС/б-31о">ИС/б-31о</option>
                            <option value="ИС/б-32о">ИС/б-32о</option>
                            <option value="ИС/б-33о">ИС/б-33о</option>
                        </optgroup>
                    </select>
                <p>Вопрос №1: Экология - это:</p>
                    <select name=answer1>
                        <option value="Диагноз">Диагноз</option>
                        <option value="Наука">Наука</option>
                        <option value="Приём">Приём</option>
                        <option value="Произведение">Произведение</option>
                    </select>
                <p>Вопрос №2: Экология изучает:</p>
                    <select name=answer2>
                        <option value="Болезни">Болезни</option>
                        <option value="Природу">Природу</option>
                        <option value="Поведение людей">Поведение людей</option>
                        <option value="Произведения">Произведения</option>
                    </select>
                <p>Вопрос №3: Слой атмосферы с повышенным содержанием озона:</p>
                    <select name=answer3>
                        <option value="Стратосферный">Стратосферный</option>
                        <option value="Озоновый">Озоновый</option>
                        <option value="Литосферный">Литосферный</option>
                        <option value="Гидросферный">Гидросферный</option>
                    </select>

                <input class="btn" type="submit" value="Проверить">
                <input class="btn" type="reset">
            </form>

            <?php
        foreach($data['resultsTest'] as $id => $row) {  
            echo '
            <article style="max-width: 600px;
              max-height: max-content;
              margin:10px auto;
              padding: 10px;
              text-align: left;
              border: 1px solid white;
              border-radius: 10px">
              <p>' . $row['fio'] . '</p>
              <p>' . $row['group'] . '</p>
              <p>' . $row['date'] . '</p>
              <p>' . 'Вопрос 1: ' . $row['question_1'] . '</p>
              <p>' . 'Вопрос 2: ' . $row['question_2'] . '</p>
              <p>' . 'Вопрос 3: ' . $row['question_3'] . '</p>
              <p>' . 'Ответ 1: ' . $row['answer_1'] . '</p>
              <p>' . 'Ответ 2: ' . $row['answer_2'] . '</p>
              <p>' . 'Ответ 3: ' . $row['answer_3'] . '</p>
            </article>
            ';
        };

        echo '<div class="pagination">';
        if ($data['curPage'] >= 1){
            echo '<a href="/tests/loadPage/' . ((int)$data['curPage']-1) . '">Предыдущая</a>';
        }

        for ($page=$data['curPage']; $page<=(int)$data['curPage']+3; $page++){
            if ($page <= $data['numPages'] && $page >= 1){
                if ($page-1 == $data['curPage']){
                    echo $page." ";
                }
                else {
                    echo '<a href="/tests/loadPage/' . ((int)$page-1) . '">' . $page . '</a>';
                }
            }
        }

        if ($data['curPage'] < $data['numPages']-1){
            echo '<a href="/tests/loadPage/' . ((int)$data['curPage']+1) . '">Следующая</a>';
        }
        echo '</div>';
    ?>
        </div>

