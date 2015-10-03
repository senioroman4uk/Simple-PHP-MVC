<form action="/formHandler" method="post">
    <?php if (isset($errors) && !empty($errors)) {
        if (array_key_exists('exception', $errors))
            echo "<div class=\"error\">{$errors['exception']}</div>";
        else
            foreach ($errors as $key => $value)
                echo "<div class=\"error\">$key: $value</div>";
    } else if ($name)
        echo "<div>We will contact with you \"$name\"</div>";
    echo '<br>';
    ?>

    <div>
        <label for="name"><span>Name</span>
            <input type="text" id="name" name="name" value="<?php echo $previousValues['name'] ?>">
        </label>
    </div>
    <div>
        <label for="email"><span>Email Address</span>
            <input type="text" id="email" name="email" value="<?php echo $previousValues['email'] ?>">
        </label>
    </div>
    <div>
        <label for="message"><span>Message</span>
            <textarea id="message" name="message"><?php echo $previousValues['message'] ?></textarea>
        </label>
    </div>
    <input type="submit" value="Send">
</form>