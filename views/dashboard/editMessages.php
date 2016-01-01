
<table class="table">
    <thead>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>email</th>
        <th>message</th>
        <th>ip</th>
        <th>answer</th>
    </tr>
    </thead>
    <tbody>
    <?php  foreach($messages as $message):?>
        <tr>
            <td><?php echo $message->getId()?></td>
            <td><?php echo $message->getName()?></td>
            <td><?php echo $message->getEmail()?></td>
            <td><?php echo $message->getMessage()?></td>
            <td><?php echo $message->getIp()?></td>
            <td><?php echo $message->getAnswer()?></td>
            <td>
                <a href="/dashboard/messages/<?php echo $message->getId()?>/edit" class="btn btn-sm btn-primary">
                    <em class="glyphicon glyphicon-pencil"></em>
                </a>
                <a href="/dashboard/messages/<?php echo $message->getId()?>/delete" class="btn btn-sm btn-danger">
                    <em class="glyphicon glyphicon-erase"></em>
                </a>
            </td>
        </tr>
    <?php endforeach?>
    </tbody>
</table>
<?php self::paginate($page, 10, $count, '/dashboard/messages?page'); ?>