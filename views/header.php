<header>
    <nav class="container" id="header">
        <div id="logo">LOGO</div>
        <div>
            <?php /** @var array $pages */
            foreach ($pages as $menuPage):
                /** @var $menuPage models\Page */
                ?>
                <div>
                    <a href="<?php echo $menuPage->getLink() ?>" class="top"><?php echo $menuPage->getName() ?></a>
                </div>
            <?php endforeach ?>
        </div>
    </nav>
</header>