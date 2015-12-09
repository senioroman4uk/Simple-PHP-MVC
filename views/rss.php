<rss version="2.0">
    <channel>
        <title>News</title>
        <link>
        http://localhost</link>
        <description>News Channel</description>
        <?php foreach ($items as $item) : ?>
            <item>
                <title><?php echo $item->getName() ?></title>
                <link><?php echo $item->getLink() ?></link>
                <description>some text</description>
            </item>
        <?php endforeach ?>
    </channel>
</rss>