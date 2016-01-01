<header class="header">
    <nav>
        <div id="logo"><img src="/assets/img/fenka.jpg" ></div>
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
    <div class="clearfix"></div>
    <?php if(!isset($user)) {?>
        <a class="session" href="/enter.html">Вoйти</a>
    <?php } else {?>
        <a class="session logoutButton" href="/logout.html">Выйти</a>
    <?php }?>
</header>
