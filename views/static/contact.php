<form action="/contact" method="post" name="activityForm">
    <?php if (isset($errors) && !empty($errors)) {
        if (array_key_exists('exception', $errors))
            echo "<div class=\"error\">{$errors['exception']}</div>";
        else
            foreach ($errors as $key => $value)
                echo "<div class=\"error\">$key: $value</div>";
    } else if (!empty($message))
        echo "<div>$message</div>";
    echo '<br>';
    ?>

    Имя:<br>
    <input type="text" id="name" name="name" value="<?php echo isset($user) ? $user->getName() :
        !empty($previousValues['name']) ? $previousValues['name'] : ''  ?>">
    <br>
    Электронный адрес:<br>
    <input type="text" id="email" name="email" value="<?php echo isset($user) ? $user->getEmail() :
        !empty($previousValues['email']) ? $previousValues['email'] : '' ?>">
    <br>
    Ваше сообщение: <br>
    <textarea id="message" name="message"><?php echo !empty($previousValues['message']) ? $previousValues['message'] : '' ?></textarea>
    <br>
    <input type="submit" value="Отправить">
</form>
<script type="text/javascript" src="/assets/js/formHandler.js"></script>