<link rel="stylesheet" type="text/css" href="/public/assets/css/interests.css"/>
    
<div id="content">
    <div id="interests_panel">
        <!--<script type="text/javascript" src="/public/assets/js/Interests.js"></script>-->
        <?php
            $hrefs = $data[0];
            $name_c = $data[1];
            $file_path = $data[2];

            $n = 0;
            echo '<ul>';
            for ($i=0; $i<count($name_c); $i++)
            {
                echo '<li><div class="favourite"><a name="'.$hrefs[$i].'">'.$name_c[$i].'</a><br>';
                for ($j=0; $j<count($name_c); $j++)
                {
                    echo '<img src="'.$file_path[$n].'">';
                    $n++;
                }
                echo '</div>';
            }
            echo '</ul>'
        ?>
    </div>
</section>
    