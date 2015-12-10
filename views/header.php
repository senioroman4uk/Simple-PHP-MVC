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

<?php include(PROJECT_DIR . '/views/loginpartial.php') ?>