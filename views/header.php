<header>
    <nav class="container" id="header">
        <div id="logo">LOGO</div>
        <div>
            <?php foreach ($pages as $page): ?>
                <div><a href="<?php echo $page->getLink() ?>" class="top"><?php echo $page->getName() ?></a></div>
            <?php endforeach ?>
        </div>
    </nav>
</header>