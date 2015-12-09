<!--<header>-->
<!--    <nav class="container" id="header">-->
<!--        <div id="logo">LOGO</div>-->
<!--        <div>-->
<!--            --><?php ///** @var array $pages */
//            foreach ($pages as $menuPage):
//                /** @var $menuPage models\Page */
//                ?>
<!--                <div>-->
<!--                    <a href="--><?php //echo $menuPage->getLink() ?><!--" class="top">--><?php //echo $menuPage->getName() ?><!--</a>-->
<!--                </div>-->
<!--            --><?php //endforeach ?>
<!--        </div>-->
<!--    </nav>-->
<!--</header>-->

<tr>
    <td colspan="2" width="987" height="53"
        background="img/menu1.jpg">
        <table border="0" cellpadding="5" cellspacing="0">
            <tr>
                <td>

                    <?php
                    foreach ($pages as $menuPage):
                        /** @var /models/Page $menuPage */ ?>
                        <a href="<?php echo $menuPage->getLink() ?>">
                            <font color="#CFCFCF" size="5">
                                <?php echo $menuPage->getName() ?>
                            </font></a> ||
                    <?php endforeach; ?>
                </td>
            </tr>
        </table>
    </td>
</tr>

<tr>
    <td colspan="2" width="780" height="33"
        bgcolor="#1C1C1C">
        <table border="0" cellpadding="5" cellspacing="0">
            <tr>
                <td>
                    <font color="#CFCFCF" size="5">
                        NEWS
                    </font>
                </td>
                <td>
                    <?php if (!$user) : ?>
                        <form action="/login" method="post">
                            <label>Name</label>
                            <input type="text" name="name">
                            <label>Password</label>
                            <input type="password" name="password">
                            <input type="submit">
                            <a style="color :#CFCFCF" href="/signup">Register</a>
                        </form>
                    <?php else:
                        echo 'Hello, ' . $user->getName() . '  <a href="/signout">Sign out</a>';
                    endif ?>
                </td>
            </tr>
        </table>
    </td>
</tr>