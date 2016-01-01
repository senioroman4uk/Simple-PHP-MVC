<?php echo self::getFlash('message') ?>
    <div class="clearfix"></div>
    <a class="btn btn-primary" href="/dashboard/pages/create">Додати</a>
<table class="table">
    <thead>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>date</th>
        <th>show</th>
        <th>access</th>
        <th>order</th>
    </tr>
    </thead>
    <tbody>
    <?php  foreach($items as $item):
         ?>
        <tr>
            <td><?php echo $item->getId()?></td>
            <td><?php echo $item->getName()?></td>
            <td><?php echo $item->getDate()?></td>
            <td><?php echo $item->getShow()?></td>
            <td><?php echo $item->getAccess()?></td>
            <td><?php echo $item->getOrder()?></td>
            <td>
                <a href="/dashboard/pages/<?php echo $item->getId()?>/edit" class="btn btn-sm btn-primary">
                    <em class="glyphicon glyphicon-pencil"></em>
                </a>
                <a href="/dashboard/pages/<?php echo $item->getId()?>/delete" class="btn btn-sm btn-danger">
                    <em class="glyphicon glyphicon-erase"></em>
                </a>
            </td>
        </tr>
    <?php endforeach?>
    </tbody>
</table>
<?php self::paginate($page, 10, $count, '/dashboard/pages?page'); ?>