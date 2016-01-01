<form action="/login" method="post" id="sessionForm">
    <?php if (isset($errors) && !empty($errors)) {
        if (array_key_exists('exception', $errors))
            echo "<div class=\"error\">{$errors['exception']}</div>";
        else
            foreach ($errors as $key => $value)
                echo "<div class=\"error\">$key: $value</div>";
    } else if ($name)
        echo "<div>Спасибо за ваше сообщение,  \"$name\"</div>";
    echo '<br>';
    ?>

    Логин:<br>
    <input type="text" id="name" name="name" value="<?php echo $previousValues['name'] ?>">
    <br>
    Пароль:<br>
    <input type="text" id="password" name="password" value="<?php echo $previousValues['password'] ?>">
    <br>
    <input type="submit" value="Вход">
    <br>
    <br>
    <br>
    <a href="/register.html">Зарегестрироваться</a>
</form>
<script type="text/javascript" src="/assets/js/sessionHandler.js"></script>