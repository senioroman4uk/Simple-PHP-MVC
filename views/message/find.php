<div class="container" style="clear: both">
    <table border="1">
        <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>message</th>
            <th>email</th>
            <th>ip</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($messages as $message): ?>
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

    <!--    pagination -->
    <?php for ($i = 0; $i < $count; $i++): ?>
        <a href="<?php echo '/messages?page=' . ($i + 1) ?>"><?php echo($i + 1) ?></a>
    <?php endfor ?>
    <!--    end pagination-->
</div>
