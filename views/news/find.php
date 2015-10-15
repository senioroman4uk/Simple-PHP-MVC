<?php
/** @var array $news */
/** @var $item models\News */
foreach ($news as $item):?>
    <div>
        <img src="<?php echo $item->getCover() ?>">

        <h3><a href="/news/<?php echo $item->getId() ?>"><?php echo $item->getName() ?></a></h3>

        <p><?php echo $item->getDescription() ?></p>
        <span><?php echo $item->getDate() ?></span>
    </div>
<?php endforeach;
self::paginate($page, 10, $count, $_SERVER['REQUEST_URI'] . "&page");
?>

