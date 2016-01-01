<div class="container" style="clear: both">
    <table border="1">
        <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>message</th>
            <th>email</th>
            <th>ip</th>
            <th>date</th>
        </tr>
        </thead>
        <tbody>
        <?php /** @var array $messages
         * @var models\Message $message
         */
        foreach ($messages as $message): ?>
            <tr>
                <td><?php echo $message->getId() ?></td>
                <td><?php echo $message->getName() ?></td>
                <td><?php echo $message->getMessage() ?></td>
                <td><?php echo $message->getEmail() ?></td>
                <td><?php echo $message->getIp() ?></td>
                <td><?php echo $message->getDate() ?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>


    <?php self::paginate($page, 10, $count, '/messages?page'); ?>
</div>
