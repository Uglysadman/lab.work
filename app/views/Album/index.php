<script type="text/javascript" src="/public/assets/js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="/public/assets/css/album.css"/>

    
<div id="content">
    <div id="album_panel">
        <?php
            $n = 0;
            $titles = $data[0];
            $file_path = $data[1];
            echo "<p>Фотоальбом</p>";
            echo "<table id=\"table\">";
            for ($i=0; $i<5; $i++)
            {
                echo "<tr>";
                for ($j=0; $j<3; $j++)
                {
                    echo '<th><figure class="sign">'.'<div class="photo_h" data-title="'.$titles[$n].'">'.'<img src="'.$file_path[$n].'" alt="photo'.($n+1).'" >'.'<figcaption>'.$titles[$n].'</figcaption></div></figure></th>';
                    $n++;
                }
                echo "</tr>";
            }
            echo "</table>";
        ?>  
    </div>
</div>

