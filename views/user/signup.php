<script type="text/javascript" src="/assets/js/userHandler.js"></script>
<form action="/signup" method="post" name="userForm">
        <label>Name</label>
        <input name="name" value="">
        <br>
        <label>Email</label>
        <input name="email" type="email" value="<?php echo isset($user) ? $user->getEmail() : '' ?>">
        <br>
        <label>Password</label>
        <input name="password" type="password">
        <br>
        <label>Repeat password</label>
        <input name="repeatPassword" type="password">
        <br>
        <input type="submit">
    </form>
    <?php if (!empty($errors))
        foreach ($errors as $key => $message) {
            echo $key . ':' . $message;
        }
    ?>