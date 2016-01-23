<form action="/registrateHandler" method="post" id="sessionForm" name="sessionForm">
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

    Имя:<br>
    <input type="text" id="name" name="name" value="<?php echo $previousValues['name'] ?>">
    <br>
    Пароль:<br>
    <input type="password" id="password" name="password" value="<?php echo $previousValues['password'] ?>">
    <br>
    <br>
    Пароль:<br>
    <input type="password" id="repeatPassword" name="repeatPassword" value="">
    <br>
    Электронный адрес:<br>
    <input type="text" id="email" name="email" value="<?php echo $previousValues['email'] ?>">
    <br>
    <input type="submit" value="Зарегестрироваться">
</form>
<script type="text/javascript" src="/assets/js/sessionHandler.js"></script>