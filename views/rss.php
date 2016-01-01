<rss version="2.0">
    <channel>
        <title>Fenechki</title>
        <link>
        http://localhost</link>
        <description>Fenechki</description>
        <?php foreach ($items as $item) : ?>
            <item>
                <title><?php echo $item->getName() ?></title>
                <link><?php echo $item->getLink() ?></link>
                <description><![CDATA[<?php echo $item->getContent() ?>]]></description>
            </item>
        <?php endforeach ?>
    </channel>
</rss>