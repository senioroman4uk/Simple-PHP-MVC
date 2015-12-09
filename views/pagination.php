<?php if ($count > 1): ?>
    <ul class="menu">
        <?php for ($i = $i + 1; $i < $n + 1; $i++) {
            if ($i != $page)
                echo "<li><a href=\"$link=$i\">$i</a></li>";
            else
                echo "<li>$i</li>";
        } ?>
    </ul>
<?php endif ?>